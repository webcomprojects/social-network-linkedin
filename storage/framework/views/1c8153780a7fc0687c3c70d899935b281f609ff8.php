<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تکمیل ثبت‌نام</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Vazirmatn', sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            direction: rtl;
            padding: 20px 10px;
        }
        
        .register-container {
            display: flex;
            border-radius: 16px;
            overflow: hidden;
            width: 1000px;
            max-width: 100%;
            box-shadow: 0 10px 30px rgba(103, 58, 183, 0.1);
            background-color: white;
            min-height: 600px;
            max-height: 90vh;
        }
        
        .banner-section {
            flex: 1;
            background: linear-gradient(135deg, #673ab7 0%, #4285f4 100%);
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .banner-content {
            z-index: 2;
            text-align: center;
            max-width: 90%;
        }
        
        .banner-title {
            font-size: clamp(1.5rem, 4vw, 2.2rem);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        .banner-text {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            line-height: 1.6;
            opacity: 0.9;
            margin-bottom: 2rem;
        }
        
        .banner-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.1) 1%, transparent 2%),
                            radial-gradient(circle at 80% 60%, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.1) 1%, transparent 2%),
                            radial-gradient(circle at 40% 80%, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.1) 2%, transparent 3%);
            background-size: 80px 80px;
            opacity: 0.5;
        }
        
        .form-section {
            flex: 1;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
        }
        
        .form-header {
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .header-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #673ab7 0%, #4285f4 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-left: 12px;
            flex-shrink: 0;
        }
        
        .form-title {
            font-size: clamp(1.3rem, 3vw, 1.8rem);
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }
        
        .form-subtitle {
            color: #666;
            font-size: clamp(0.8rem, 2vw, 1rem);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
            font-size: clamp(0.8rem, 2vw, 0.9rem);
        }
        
        .input-container {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #673ab7;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="username"] {
            width: 100%;
            padding: 14px 20px;
            padding-right: 45px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: clamp(0.9rem, 2vw, 1rem);
            transition: all 0.3s;
        }
        
        input:focus {
            outline: none;
            border-color: #673ab7;
            box-shadow: 0 0 0 2px rgba(103, 58, 183, 0.2);
        }
        
        .error-message {
            background-color: #fef2f2;
            border: 1px solid #fee2e2;
            color: #ef4444;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: clamp(0.8rem, 2vw, 0.9rem);
        }
        
        .error-message ul {
            list-style-type: disc;
            padding-right: 20px;
            margin: 5px 0;
        }
        
        .checkbox-container {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        
        .custom-checkbox {
            width: 18px;
            height: 18px;
            margin-top: 2px;
            margin-left: 10px;
            accent-color: #673ab7;
        }
        
        .checkbox-label {
            font-size: clamp(0.8rem, 2vw, 0.9rem);
            color: #555;
        }
        
        .checkbox-label a {
            color: #673ab7;
            text-decoration: none;
            font-weight: 500;
        }
        
        .checkbox-label a:hover {
            text-decoration: underline;
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #673ab7 0%, #4285f4 100%);
            color: white;
            padding: 14px 24px;
            border: none;
            border-radius: 8px;
            font-size: clamp(0.9rem, 2vw, 1rem);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(103, 58, 183, 0.3);
        }
        
        .submit-btn i {
            margin-left: 8px;
        }
        
        .company-logo {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: white;
            display: flex;
            justify-content: center;
        }
        
        .company-logo img {
            max-width: 100%;
            height: auto;
            max-height: 50px;
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .form-content {
            animation: fadeIn 0.5s ease-out;
        }
        
        /* Responsive Breakpoints */
        @media (max-width: 992px) {
            .register-container {
                max-width: 95%;
            }
        }
        
        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
                height: auto;
                max-height: none;
            }
            
            .banner-section {
                padding: 30px 20px;
                min-height: 200px;
            }
            
            .form-section {
                padding: 25px 20px;
            }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 10px 5px;
            }
            
            .register-container {
                max-width: 100%;
                border-radius: 10px;
            }
            
            .form-header {
                margin-bottom: 20px;
            }
            
            .header-icon {
                width: 35px;
                height: 35px;
            }
            
            .banner-section {
                padding: 25px 15px;
                min-height: 180px;
            }
            
            .form-section {
                padding: 20px 15px;
            }
            
            input[type="text"],
            input[type="email"],
            input[type="username"] {
                padding: 12px 15px;
                padding-right: 40px;
            }
            
            .submit-btn {
                padding: 12px 20px;
            }
        }
        
        @media (max-height: 700px) and (min-width: 769px) {
            .register-container {
                max-height: 95vh;
            }
            
            .banner-section,
            .form-section {
                padding-top: 20px;
                padding-bottom: 20px;
            }
            
            .form-group {
                margin-bottom: a5px;
            }
        }
        
        /* Fix for very small devices */
        @media (max-width: 350px) {
            .form-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .header-icon {
                margin-bottom: 10px;
            }
            
            .checkbox-container {
                align-items: flex-start;
            }
            
            .custom-checkbox {
                margin-top: 3px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="banner-section">
            <div class="banner-pattern"></div>
            <div class="banner-content">
                <div class="company-logo">
                    <?php $system_light_logo = \App\Models\Setting::where('type', 'system_light_logo')->value('description'); ?>
                    <img src="<?php echo e(get_system_logo_favicon($system_light_logo, 'light')); ?>" alt="logo" />
                </div>
                <h1 class="banner-title">به خانواده ما خوش آمدید</h1>
                <p class="banner-text">اطلاعات خود را تکمیل کنید تا به جمع ما بپیوندید. با عضویت در سامانه، به خدمات ویژه ما دسترسی خواهید داشت.</p>
            </div>
        </div>
        
        <div class="form-section">
            <div class="form-content">
                <div class="form-header">
                    <div class="header-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div>
                        <h2 class="form-title">تکمیل ثبت‌ نام</h2>
                        <p class="form-subtitle">لطفا اطلاعات زیر را با دقت تکمیل کنید</p>
                    </div>
                </div>
                
                <?php if($errors->any()): ?>
                <div class="error-message">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                
                <form action="<?php echo e(route('otp.register.complete')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    
                    <div class="form-group">
                        <label for="name">نام و نام خانوادگی</label>
                        <div class="input-container">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" 
                                placeholder="نام و نام خانوادگی خود را وارد کنید" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="username">نام کاربری</label>
                        <div class="input-container">
                            <i class="fas fa-at input-icon"></i>
                            <input type="username" id="username" name="username" value="<?php echo e(old('username')); ?>" 
                                placeholder="نام کاربری خود را وارد کنید" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">ایمیل</label>
                        <div class="input-container">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" 
                                placeholder="آدرس ایمیل خود را وارد کنید" required>
                        </div>
                    </div>
                    
                    <div class="checkbox-container">
                        <input id="terms" name="check1" type="checkbox" class="custom-checkbox" required>
                        <label for="terms" class="checkbox-label">
                            با کلیک بر روی دکمه ثبت‌نام، <a href="#">قوانین و مقررات</a> را می‌پذیرم
                        </label>
                    </div>
                    
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-user-plus"></i>
                        تکمیل ثبت‌ نام
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\PicoNet\Desktop\linkedin\resources\views/auth/otp-register.blade.php ENDPATH**/ ?>