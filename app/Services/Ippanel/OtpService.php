<?php

namespace App\Services\Ippanel;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OtpService
{
    protected $apiKey;
    protected $originator;
    protected $patternCode;
    protected $baseUrl;
    
    public function __construct()
    {
        $this->apiKey = config('services.ippanel.api_key');
        $this->originator = config('services.ippanel.originator');
        $this->patternCode = config('services.ippanel.pattern_code');
        $this->baseUrl = 'https://rest.ippanel.com/v1/messages/patterns/send';
    }
    
    /**
     * Generate and send OTP code to the given mobile number
     *
     * @param string $mobile Mobile number
     * @return array
     */
    public function send(string $mobile): array
    {
        try {
            // Normalize mobile number format
            $mobile = $this->normalizeMobile($mobile);
            
            // Generate OTP code (6 digits)
            $code = $this->generateCode();
            
            // Store OTP code in cache with 2 minutes expiration
            $this->storeCode($mobile, $code);
            
            // Send OTP via ippanel API
            $response = $this->sendSms($mobile, $code);
            
            return [
                'success' => true,
                'message' => 'کد تایید با موفقیت ارسال شد',
                'data' => [
                    'reference_id' => $response['bulk_id'] ?? null,
                    'expires_in' => 120 // 2 minutes in seconds
                ]
            ];
        } catch (Exception $e) {
            Log::error('OTP send error: ' . $e->getMessage());
            
            return [
                'success' => false,
                'message' => 'خطا در ارسال کد تایید',
                'error' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Verify the OTP code
     *
     * @param string $mobile Mobile number
     * @param string $code OTP code
     * @return array
     */
    public function verify(string $mobile, string $code): array
    {
        $mobile = $this->normalizeMobile($mobile);
        $cachedCode = $this->getCode($mobile);
        
        if (!$cachedCode) {
            return [
                'success' => false,
                'message' => 'کد تایید منقضی شده است'
            ];
        }
        
        if ($cachedCode !== $code) {
            return [
                'success' => false,
                'message' => 'کد تایید اشتباه است'
            ];
        }
        
        // Clear the cache after successful verification
        $this->clearCode($mobile);
        
        return [
            'success' => true,
            'message' => 'کد تایید با موفقیت تایید شد'
        ];
    }
    
    /**
     * Generate random OTP code
     *
     * @return string
     */
    protected function generateCode(): string
    {
        return str_pad(rand(100000, 999999), 6, '0', STR_PAD_LEFT);
    }
    
    /**
     * Store OTP code in cache
     *
     * @param string $mobile
     * @param string $code
     * @return void
     */
    protected function storeCode(string $mobile, string $code): void
    {
        $key = 'otp_' . $mobile;
        Cache::put($key, $code, now()->addMinutes(2));
    }
    
    /**
     * Get stored OTP code from cache
     *
     * @param string $mobile
     * @return string|null
     */
    protected function getCode(string $mobile): ?string
    {
        $key = 'otp_' . $mobile;
        return Cache::get($key);
    }
    
    /**
     * Clear OTP code from cache
     *
     * @param string $mobile
     * @return void
     */
    protected function clearCode(string $mobile): void
    {
        $key = 'otp_' . $mobile;
        Cache::forget($key);
    }
    
    /**
     * Normalize mobile number to international format
     *
     * @param string $mobile
     * @return string
     */
    protected function normalizeMobile(string $mobile): string
    {
        // Remove any non-digit characters
        $mobile = preg_replace('/\D/', '', $mobile);
        
        // Add country code if needed (assuming Iranian number)
        if (strlen($mobile) === 10 && substr($mobile, 0, 1) === '9') {
            $mobile = '98' . $mobile;
        } elseif (strlen($mobile) === 11 && substr($mobile, 0, 2) === '09') {
            $mobile = '98' . substr($mobile, 1);
        }
        
        return $mobile;
    }
    
    /**
     * Send SMS using ippanel API
     *
     * @param string $mobile
     * @param string $code
     * @return array
     * @throws Exception
     */
    protected function sendSms(string $mobile, string $code): array
    {
        // Pattern values for OTP template
        $patternValues = [
            'verification-code' => $code,
        ];
        
        // Prepare the request
        $client = new \GuzzleHttp\Client();
        
        $response = $client->post($this->baseUrl, [
            'headers' => [
                'Authorization' => 'AccessKey ' . $this->apiKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'json' => [
                'pattern_code' => $this->patternCode,
                'originator' => $this->originator,
                'recipient' => $mobile,
                'values' => $patternValues,
            ],
        ]);
        
        $responseBody = json_decode($response->getBody()->getContents(), true);
        
        if (!isset($responseBody['status']) || $responseBody['status'] !== 'OK') {
            throw new Exception('IPPanel API Error: ' . ($responseBody['message'] ?? 'Unknown error'));
        }
        
        return $responseBody;
    }
}