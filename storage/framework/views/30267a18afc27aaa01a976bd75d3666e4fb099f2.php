<!-- resources/views/auth/login.blade.php -->
<?php echo $__env->make('auth.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container p-5" dir="rtl">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ورود با رمز یکبار مصرف</div>

                <div class="card-body">
                    <div id="login-step-1" class="login-step">
                        <form id="send-otp-form">
                            <div class="form-group mb-4">
                                <label for="mobile">شماره موبایل</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" 
                                    placeholder="09xxxxxxxxx" required dir="ltr">
                                <div class="invalid-feedback" id="mobile-error"></div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="send-otp-btn">
                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true" id="send-spinner"></span>
                                    دریافت کد تایید
                                </button>
                            </div>
                        </form>
                    </div>

                    <div id="login-step-2" class="login-step d-none">
                        <div class="alert alert-info">
                            کد تایید به شماره <span id="mobile-display"></span> ارسال شد.
                        </div>

                        <form id="verify-otp-form">
                            <input type="hidden" id="verify-mobile" name="mobile">

                            <div class="form-group mb-4">
                                <label for="code">کد تایید دریافتی</label>
                                <input type="text" class="form-control" id="code" name="code" 
                                    placeholder="کد 6 رقمی" required maxlength="6" dir="ltr">
                                <div class="invalid-feedback" id="code-error"></div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success" id="verify-otp-btn">
                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true" id="verify-spinner"></span>
                                    تایید و ورود
                                </button>
                                <button type="button" class="btn btn-outline-secondary" id="back-btn">
                                    بازگشت
                                </button>
                                <button type="button" class="btn btn-link" id="resend-btn" disabled>
                                    ارسال مجدد
                                    <span id="resend-timer">(120)</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.8.4/axios.min.js" integrity="sha512-2A1+/TAny5loNGk3RBbk11FwoKXYOMfAK6R7r4CpQH7Luz4pezqEGcfphoNzB7SM4dixUoJsKkBsB6kg+dNE2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sendOtpForm = document.getElementById('send-otp-form');
        const verifyOtpForm = document.getElementById('verify-otp-form');
        const sendOtpBtn = document.getElementById('send-otp-btn');
        const verifyOtpBtn = document.getElementById('verify-otp-btn');
        const backBtn = document.getElementById('back-btn');
        const resendBtn = document.getElementById('resend-btn');
        const resendTimer = document.getElementById('resend-timer');
        const loginStep1 = document.getElementById('login-step-1');
        const loginStep2 = document.getElementById('login-step-2');
        const mobileInput = document.getElementById('mobile');
        const verifyMobileInput = document.getElementById('verify-mobile');
        const mobileDisplay = document.getElementById('mobile-display');
        const sendSpinner = document.getElementById('send-spinner');
        const verifySpinner = document.getElementById('verify-spinner');
        
        let resendInterval;
        let countdown = 120;
        
        // ارسال فرم درخواست کد تایید
        sendOtpForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const mobile = mobileInput.value.trim();
            
            if (!validateMobile(mobile)) {
                showError('mobile-error', 'لطفا شماره موبایل معتبر وارد کنید');
                return;
            }
            
            sendSpinner.classList.remove('d-none');
            sendOtpBtn.disabled = true;
            
            axios.post('/api/otp/send', { mobile })
                .then(response => {
                    if (response.data.success) {
                        // نمایش فرم تایید کد
                        loginStep1.classList.add('d-none');
                        loginStep2.classList.remove('d-none');
                        
                        // تنظیم شماره موبایل
                        mobileDisplay.textContent = mobile;
                        verifyMobileInput.value = mobile;
                        
                        // شروع شمارنده معکوس برای ارسال مجدد
                        startResendCountdown();
                    } else {
                        showError('mobile-error', response.data.message || 'خطا در ارسال کد تایید');
                    }
                })
                .catch(error => {
                    const errorMsg = error.response?.data?.message || 'خطا در ارسال کد تایید';
                    showError('mobile-error', errorMsg);
                })
                .finally(() => {
                    sendSpinner.classList.add('d-none');
                    sendOtpBtn.disabled = false;
                });
        });
        
        // تایید کد OTP
        verifyOtpForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const mobile = verifyMobileInput.value.trim();
            const code = document.getElementById('code').value.trim();
            
            if (!validateMobile(mobile)) {
                showError('code-error', 'شماره موبایل نامعتبر است');
                return;
            }
            
            if (!validateCode(code)) {
                showError('code-error', 'کد تایید باید 6 رقم باشد');
                return;
            }
            
            verifySpinner.classList.remove('d-none');
            verifyOtpBtn.disabled = true;
            
            axios.post('/api/otp/verify', { mobile, code })
                .then(response => {
                    if (response.data.success) {
                        // در صورت موفقیت آمیز بودن، انتقال به صفحه داشبورد
                        if (response.data.redirect) {
                            window.location.href = response.data.redirect;
                        } else {
                            window.location.reload();
                        }
                    } else {
                        showError('code-error', response.data.message || 'کد تایید نامعتبر است');
                    }
                })
                .catch(error => {
                    const errorMsg = error.response?.data?.message || 'خطا در تایید کد';
                    showError('code-error', errorMsg);
                })
                .finally(() => {
                    verifySpinner.classList.add('d-none');
                    verifyOtpBtn.disabled = false;
                });
        });
        
        // بازگشت به مرحله قبل
        backBtn.addEventListener('click', function() {
            loginStep2.classList.add('d-none');
            loginStep1.classList.remove('d-none');
            clearResendCountdown();
        });
        
        // درخواست مجدد کد تایید
        resendBtn.addEventListener('click', function() {
            if (!resendBtn.disabled) {
                const mobile = verifyMobileInput.value.trim();
                
                resendBtn.disabled = true;
                
                axios.post('/api/otp/send', { mobile })
                    .then(response => {
                        if (response.data.success) {
                            // شروع مجدد شمارنده معکوس
                            startResendCountdown();
                        } else {
                            showError('code-error', response.data.message || 'خطا در ارسال مجدد کد تایید');
                        }
                    })
                    .catch(error => {
                        const errorMsg = error.response?.data?.message || 'خطا در ارسال مجدد کد تایید';
                        showError('code-error', errorMsg);
                        resendBtn.disabled = false;
                    });
            }
        });
        
        // اعتبارسنجی شماره موبایل
        function validateMobile(mobile) {
            const mobileRegex = /^09[0-9]{9}$/;
            return mobileRegex.test(mobile);
        }
        
        // اعتبارسنجی کد تایید
        function validateCode(code) {
            const codeRegex = /^[0-9]{6}$/;
            return codeRegex.test(code);
        }
        
        // نمایش پیام خطا
        function showError(elementId, message) {
            const errorElement = document.getElementById(elementId);
            errorElement.textContent = message;
            errorElement.parentElement.querySelector('input').classList.add('is-invalid');
        }
        
        // شروع شمارنده معکوس برای ارسال مجدد
        function startResendCountdown() {
            clearResendCountdown();
            
            countdown = 120;
            resendTimer.textContent = `(${countdown})`;
            resendBtn.disabled = true;
            
            resendInterval = setInterval(function() {
                countdown--;
                resendTimer.textContent = `(${countdown})`;
                
                if (countdown <= 0) {
                    clearResendCountdown();
                    resendBtn.disabled = false;
                    resendTimer.textContent = '';
                }
            }, 1000);
        }
        
        // پاکسازی شمارنده معکوس
        function clearResendCountdown() {
            if (resendInterval) {
                clearInterval(resendInterval);
            }
        }
    });
</script>
<?php /**PATH C:\Users\PicoNet\Desktop\linkedin\resources\views/auth/otp-login.blade.php ENDPATH**/ ?>