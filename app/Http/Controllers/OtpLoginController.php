<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Ippanel\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class OtpLoginController extends Controller
{
    protected $otpService;
    
    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }
    
    /**
     * نمایش فرم ورود
     */
    public function showLoginForm()
    {
        return view('auth.otp-login');
    }
    
    /**
     * ارسال کد تایید
     */
    public function requestOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|regex:/^(09[0-9]{9})$/',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'شماره موبایل نامعتبر است',
            ], 422);
        }
        
        $mobile = $request->input('mobile');
        
        // ارسال کد تایید
        $result = $this->otpService->send($mobile);
        
        return response()->json($result);
    }
    
    /**
     * تایید کد و ورود کاربر
     */
    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|regex:/^(09[0-9]{9})$/',
            'code' => 'required|digits:6',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'اطلاعات ارسالی نامعتبر است',
            ], 422);
        }
        
        $mobile = $request->input('mobile');
        $code = $request->input('code');
        
        // تایید کد
        $result = $this->otpService->verify($mobile, $code);
        
        if (!$result['success']) {
            return response()->json($result, 400);
        }
        
        // بررسی وجود کاربر
        $user = User::where('mobile', $mobile)->first();
        
        // ایجاد کاربر جدید اگر وجود نداشت
        if (!$user) {
            $user = User::create([
                'mobile' => $mobile,
                'name' => 'کاربر ' . substr($mobile, -4),
                'email' => null,
                'password' => bcrypt(rand(100000, 999999)),
            ]);
        }
        
        // ورود کاربر
        Auth::login($user);
        
        return response()->json([
            'success' => true,
            'message' => 'ورود با موفقیت انجام شد',
            'redirect' => route('dashboard')
        ]);
    }
}