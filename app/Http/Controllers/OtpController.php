<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Ippanel\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OtpController extends Controller
{
    protected $otpService;
    
    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }
    
    /**
     * Send OTP code to the given mobile number
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|regex:/^[0][9][0-9]{9,9}$/',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'شماره موبایل نامعتبر است',
                'errors' => $validator->errors(),
            ], 422);
        }
        
        // Send OTP
        $result = $this->otpService->send($request->input('mobile'));
        
        if (!$result['success']) {
            return response()->json($result, 500);
        }
        
        return response()->json($result);
    }
    
    /**
     * Verify OTP code
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|regex:/^(09[0-9]{9})$/',
            'code' => 'required|digits:6',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'اطلاعات ارسالی نامعتبر است',
                'errors' => $validator->errors(),
            ], 422);
        }
        
        // Verify OTP
        $result = $this->otpService->verify(
            $request->input('mobile'),
            $request->input('code')
        );
        
        if (!$result['success']) {
            return response()->json($result, 400);
        }
        
        // Here you can handle user login or registration after successful verification
        // For example:
        // Auth::login($user);
        
        return response()->json($result);
    }
}