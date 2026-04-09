<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Peminjaman Kebaya</title>
    
    <link rel="icon" type="image/png" href="{{ asset('assets/img/Avatar.png') }}">

    <!-- Font Awesome 6 (Free) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700;900&family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    {{-- Link Laravel --}}
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(145deg, #2c1810 0%, #4a2a1a 50%, #2c1810 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Animated Batik Pattern Background */
        .batik-pattern {
            position: absolute;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 0;
            border: 1px solid rgba(255, 255, 255, 0.05);
            animation: float 20s linear infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        
        .pattern-1 {
            width: 500px;
            height: 500px;
            top: -200px;
            right: -200px;
            background: repeating-linear-gradient(45deg, rgba(255,255,255,0.02) 0px, rgba(255,255,255,0.02) 2px, transparent 2px, transparent 8px);
        }
        
        .pattern-2 {
            width: 400px;
            height: 400px;
            bottom: -150px;
            left: -150px;
            background: repeating-linear-gradient(135deg, rgba(255,255,255,0.02) 0px, rgba(255,255,255,0.02) 2px, transparent 2px, transparent 8px);
            animation-direction: reverse;
            animation-duration: 15s;
        }
        
        .pattern-3 {
            width: 200px;
            height: 200px;
            top: 30%;
            left: 10%;
            background: repeating-linear-gradient(90deg, rgba(255,255,255,0.02) 0px, rgba(255,255,255,0.02) 2px, transparent 2px, transparent 8px);
            animation-duration: 12s;
        }
        
        /* Floating Kebaya icons */
        .float-icon {
            position: absolute;
            color: rgba(255, 255, 255, 0.03);
            font-size: 3rem;
            animation: floatIcon 6s ease-in-out infinite;
        }
        
        @keyframes floatIcon {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        
        .float-1 {
            top: 15%;
            right: 10%;
            animation-delay: 0s;
        }
        
        .float-2 {
            bottom: 20%;
            left: 5%;
            animation-delay: 2s;
            font-size: 4rem;
        }
        
        .float-3 {
            top: 40%;
            left: 15%;
            animation-delay: 4s;
            font-size: 2.5rem;
        }
        
        /* Premium Glass Card */
        .premium-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(255, 255, 255, 0.1) inset;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border-radius: 32px;
        }
        
        .premium-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 
                0 35px 60px -12px rgba(0, 0, 0, 0.6),
                0 0 0 2px rgba(255, 255, 255, 0.2) inset;
        }
        
        /* Kebaya Logo Container */
        .kebaya-logo-container {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 1.5rem;
            perspective: 1000px;
        }
        
        .kebaya-logo {
            width: 100%;
            height: 100%;
            background: linear-gradient(145deg, #c97777, #8b4513);
            border-radius: 30px 30px 30px 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 
                0 20px 30px -10px rgba(201, 119, 119, 0.5),
                0 0 0 3px rgba(255, 255, 255, 0.3) inset;
            animation: kebayaGlow 3s ease-in-out infinite;
            transform-style: preserve-3d;
            transition: transform 0.5s ease;
        }
        
        .kebaya-logo:hover {
            transform: rotateY(10deg) rotateX(5deg);
        }
        
        @keyframes kebayaGlow {
            0%, 100% { filter: brightness(1); }
            50% { filter: brightness(1.2); box-shadow: 0 25px 40px -10px #c97777; }
        }
        
        .kebaya-logo i {
            font-size: 55px;
            color: white;
            filter: drop-shadow(2px 4px 6px rgba(0, 0, 0, 0.3));
            animation: kebayaShine 3s ease-in-out infinite;
        }
        
        @keyframes kebayaShine {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        /* Kebaya detail on logo */
        .kebaya-detail {
            position: absolute;
            width: 35px;
            height: 35px;
            background: linear-gradient(145deg, #ffffff, #f0d7d7);
            border-radius: 50%;
            top: 20px;
            right: 20px;
            border: 3px solid #8b4513;
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.5);
            animation: detailRotate 10s linear infinite;
        }
        
        @keyframes detailRotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .kebaya-detail::after {
            content: '';
            position: absolute;
            width: 10px;
            height: 10px;
            background: #c97777;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 2px solid #f0d7d7;
        }
        
        /* Brand Title */
        .brand-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 900;
            background: linear-gradient(145deg, #c97777, #8b4513, #a14d4d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.25rem;
            letter-spacing: -0.5px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            animation: titleGlow 3s ease-in-out infinite;
        }
        
        @keyframes titleGlow {
            0%, 100% { filter: brightness(1); }
            50% { filter: brightness(1.1); }
        }
        
        .brand-subtitle {
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            background: linear-gradient(145deg, #8b6b5c, #a18273);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 2rem;
        }
        
        /* Input Fields Premium */
        .input-premium {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .input-premium i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #c97777;
            font-size: 1.2rem;
            z-index: 10;
            transition: all 0.3s ease;
            text-shadow: 0 2px 5px rgba(201, 119, 119, 0.3);
        }
        
        .input-premium input {
            width: 100%;
            padding: 18px 20px 18px 55px;
            border: 2px solid #f0d7d7;
            border-radius: 20px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02);
            font-weight: 500;
        }
        
        .input-premium input:focus {
            border-color: #c97777;
            box-shadow: 0 10px 25px -5px rgba(201, 119, 119, 0.3);
            outline: none;
            transform: scale(1.02);
        }
        
        .input-premium input:focus + i {
            color: #8b4513;
            transform: translateY(-50%) scale(1.1);
        }
        
        .input-premium .focus-border {
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #c97777, #8b4513, #a14d4d);
            transition: all 0.3s ease;
            border-radius: 10px;
            transform: translateX(-50%);
        }
        
        .input-premium input:focus ~ .focus-border {
            width: 80%;
        }
        
        /* Password toggle button */
        .password-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            z-index: 20;
            transition: all 0.3s ease;
        }
        
        .password-toggle:hover {
            color: #c97777;
        }
        
        /* Premium Button */
        .btn-premium {
            background: linear-gradient(145deg, #c97777, #8b4513, #a14d4d);
            background-size: 200% 200%;
            color: white;
            font-weight: 600;
            padding: 16px 20px;
            border-radius: 20px;
            border: none;
            width: 100%;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 
                0 15px 25px -5px rgba(201, 119, 119, 0.5),
                0 0 0 1px rgba(255, 255, 255, 0.3) inset;
            letter-spacing: 1px;
            text-transform: uppercase;
            animation: gradientShift 3s ease infinite;
            margin-top: 0.5rem;
        }
        
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .btn-premium:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 
                0 20px 35px -5px rgba(201, 119, 119, 0.6),
                0 0 0 2px rgba(255, 255, 255, 0.4) inset;
        }
        
        .btn-premium:active {
            transform: translateY(2px) scale(0.98);
        }
        
        .btn-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s ease;
        }
        
        .btn-premium:hover::before {
            left: 100%;
        }
        
        /* Shutter Effect */
        .shutter-effect {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.1s ease;
            z-index: 9999;
        }
        
        .shutter-effect.active {
            opacity: 1;
            animation: shutter 0.2s ease;
        }
        
        @keyframes shutter {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }
        
        /* Alert Premium */
        .alert-premium {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 350px;
            padding: 1.2rem 1.5rem;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.4);
            border-left: 6px solid;
            animation: slideInPremium 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        @keyframes slideInPremium {
            0% {
                transform: translateX(100%) scale(0.8);
                opacity: 0;
            }
            100% {
                transform: translateX(0) scale(1);
                opacity: 1;
            }
        }
        
        .alert-premium.success {
            border-left-color: #10b981;
            background: linear-gradient(145deg, #ffffff, #ecfdf5);
        }
        
        .alert-premium.error {
            border-left-color: #ef4444;
            background: linear-gradient(145deg, #ffffff, #fef2f2);
        }
        
        /* Terms checkbox */
        .terms-checkbox {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }
        
        .terms-checkbox input[type="checkbox"] {
            display: none;
        }
        
        .terms-checkbox .checkbox-custom {
            width: 22px;
            height: 22px;
            border: 2px solid #f0d7d7;
            border-radius: 8px;
            margin-right: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }
        
        .terms-checkbox input[type="checkbox"]:checked + .checkbox-custom {
            background: linear-gradient(145deg, #c97777, #8b4513);
            border-color: transparent;
        }
        
        .terms-checkbox input[type="checkbox"]:checked + .checkbox-custom i {
            color: white;
        }
        
        .terms-checkbox .checkbox-custom i {
            font-size: 12px;
            color: transparent;
            transition: color 0.3s ease;
        }
        
        .terms-checkbox label {
            color: #4b5563;
            font-size: 0.95rem;
            cursor: pointer;
        }
        
        .terms-checkbox a {
            color: #c97777;
            font-weight: 600;
            text-decoration: none;
        }
        
        .terms-checkbox a:hover {
            text-decoration: underline;
        }
        
        /* Error message */
        .error-message {
            color: #ef4444;
            font-size: 0.8rem;
            margin-top: 0.5rem;
            margin-left: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }
        
        .error-message i {
            font-size: 0.8rem;
        }
        
        /* Premium Link */
        .link-premium {
            color: #c97777;
            font-weight: 600;
            text-decoration: none;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .link-premium::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #c97777, #8b4513, #a14d4d);
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }
        
        .link-premium:hover {
            color: #8b4513;
        }
        
        .link-premium:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }
        
        /* Divider Premium */
        .divider-premium {
            display: flex;
            align-items: center;
            text-align: center;
            color: #94a3b8;
            margin: 1.8rem 0;
            font-weight: 500;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }
        
        .divider-premium::before,
        .divider-premium::after {
            content: '';
            flex: 1;
            height: 2px;
            background: linear-gradient(90deg, transparent, #94a3b8, transparent);
        }
        
        /* Social Buttons */
        .social-btn {
            border: 2px solid #f0d7d7;
            border-radius: 20px;
            padding: 14px;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02);
            font-weight: 600;
            color: #1e293b;
            width: 100%;
        }
        
        .social-btn:hover {
            border-color: #c97777;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px -5px rgba(201, 119, 119, 0.3);
            background: linear-gradient(145deg, #ffffff, #fff5f5);
        }
        
        .social-btn i {
            font-size: 1.3rem;
            margin-right: 0.5rem;
        }
        
        /* Footer Text */
        .footer-text {
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.9rem;
            letter-spacing: 1px;
            transition: color 0.3s ease;
        }
        
        .footer-text:hover {
            color: rgba(255, 255, 255, 0.8);
        }
        
        /* Validation error border */
        .input-premium input.error-border {
            border-color: #ef4444;
        }
        
        /* Responsive */
        @media (max-width: 640px) {
            .premium-card {
                margin: 1rem;
                padding: 1.5rem !important;
            }
            
            .brand-title {
                font-size: 2rem;
            }
            
            .kebaya-logo-container {
                width: 100px;
                height: 100px;
            }
            
            .alert-premium {
                min-width: 300px;
                right: 10px;
                left: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Batik Pattern Background -->
    <div class="batik-pattern pattern-1"></div>
    <div class="batik-pattern pattern-2"></div>
    <div class="batik-pattern pattern-3"></div>
    
    <!-- Floating Kebaya Icons -->
    <i class="fas fa-chess-queen float-icon float-1"></i>
    <i class="fas fa-tshirt float-icon float-2"></i>
    <i class="fas fa-gem float-icon float-3"></i>
    
    <!-- Shutter Effect -->
    <div class="shutter-effect" id="shutterEffect"></div>
    
    <!-- Main Content -->
    <div class="min-h-screen flex items-center justify-center p-4 relative z-10">
        <div class="w-full max-w-md">
            <!-- Kebaya Logo & Brand Section -->
            <div class="text-center">
                <div class="kebaya-logo-container">
                    <div class="kebaya-logo">
                        <i class="fas fa-chess-queen"></i>
                        <div class="kebaya-detail"></div>
                    </div>
                </div>
                
                <h1 class="brand-title">
                    Bergabung dengan Réa
                </h1>
                
                <p class="brand-subtitle">
                    Mulai Perjalanan Anda
                </p>
            </div>
            
            <!-- Premium Register Card -->
            <div class="premium-card p-8">
                <form class="space-y-4" method="POST" action="{{ route('register') }}" onsubmit="triggerShutter()">
                    @csrf
                    
                    <!-- Name Input -->
                    <div class="input-premium">
                        <i class="fas fa-user"></i>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               value="{{ old('name') }}"
                               placeholder="Nama Lengkap"
                               class="@error('name') error-border @enderror"
                               required>
                        <div class="focus-border"></div>
                        @error('name')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <!-- Email Input -->
                    <div class="input-premium">
                        <i class="fas fa-envelope"></i>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               value="{{ old('email') }}"
                               placeholder="Email address"
                               class="@error('email') error-border @enderror"
                               required>
                        <div class="focus-border"></div>
                        @error('email')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <!-- Password Input -->
                    <div class="input-premium">
                        <i class="fas fa-lock"></i>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               placeholder="Password"
                               class="@error('password') error-border @enderror"
                               required>
                        <button type="button" 
                                class="password-toggle" 
                                onclick="togglePassword('password', this)">
                            <i class="far fa-eye"></i>
                        </button>
                        <div class="focus-border"></div>
                        @error('password')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <!-- Confirm Password Input -->
                    <div class="input-premium">
                        <i class="fas fa-lock"></i>
                        <input type="password" 
                               name="password_confirmation" 
                               id="password_confirmation" 
                               placeholder="Konfirmasi Password"
                               required>
                        <button type="button" 
                                class="password-toggle" 
                                onclick="togglePassword('password_confirmation', this)">
                            <i class="far fa-eye"></i>
                        </button>
                        <div class="focus-border"></div>
                    </div>
                    
                    <!-- Terms and Conditions -->
                    <div class="terms-checkbox">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms" class="checkbox-custom">
                            <i class="fas fa-check"></i>
                        </label>
                        <label for="terms">
                            Saya setuju dengan 
                            <a href="#">Syarat & Ketentuan</a> 
                            dan 
                            <a href="#">Kebijakan Privasi</a>
                        </label>
                    </div>
                    
                    <!-- Register Button -->
                    <button type="submit" class="btn-premium">
                        <i class="fas fa-chess-queen mr-2"></i>
                        Daftar Sekarang
                    </button>
                    
                    <!-- Divider -->
                    <div class="divider-premium">
                        <span>atau daftar dengan</span>
                    </div>
                    
                    <!-- Social Register -->
                    <div class="grid grid-cols-2 gap-4">
                        <button type="button" class="social-btn flex items-center justify-center">
                            <i class="fab fa-google text-red-500"></i>
                            <span>Google</span>
                        </button>
                        <button type="button" class="social-btn flex items-center justify-center">
                            <i class="fab fa-facebook text-blue-600"></i>
                            <span>Facebook</span>
                        </button>
                    </div>
                    
                    <!-- Login Link -->
                    <p class="text-center text-sm text-gray-500 mt-6">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="link-premium ml-1">
                            Login di sini
                        </a>
                    </p>
                </form>
            </div>
            
            <!-- Footer -->
            <p class="footer-text text-center mt-8">
                <i class="fas fa-copyright mr-1 text-xs"></i>
                2024 Peminjaman Kebaya. All rights reserved.
            </p>
        </div>
    </div>
    
    <!-- Modern Alerts -->
    @if (session('success'))
        <div class="alert-premium success" id="alert-success">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                        <i class="fas fa-check text-green-600 text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-semibold text-green-800">Berhasil!</p>
                    <p class="text-sm text-green-600 mt-1">{{ session('success') }}</p>
                </div>
                <button type="button" class="text-green-400 hover:text-green-600" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif
    
    @if (session('error'))
        <div class="alert-premium error" id="alert-error">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                        <i class="fas fa-exclamation text-red-600 text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-semibold text-red-800">Error!</p>
                    <p class="text-sm text-red-600 mt-1">{{ session('error') }}</p>
                </div>
                <button type="button" class="text-red-400 hover:text-red-600" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif
    
    @if ($errors->any())
        <div class="alert-premium error" id="alert-validation">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-semibold text-red-800">Validasi Gagal!</p>
                    <ul class="text-sm text-red-600 mt-1 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="text-red-400 hover:text-red-600" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif

    <script>
        // Trigger shutter effect
        function triggerShutter() {
            const shutter = document.getElementById('shutterEffect');
            shutter.classList.add('active');
            setTimeout(() => {
                shutter.classList.remove('active');
            }, 200);
        }
        
        // Toggle password visibility
        function togglePassword(inputId, button) {
            const passwordInput = document.getElementById(inputId);
            const icon = button.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
        
        // Auto dismiss alerts
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert-premium');
            alerts.forEach(alert => {
                setTimeout(() => {
                    if (alert && alert.parentNode) {
                        alert.style.animation = 'slideOut 0.3s ease forwards';
                        setTimeout(() => {
                            if (alert.parentNode) {
                                alert.remove();
                            }
                        }, 300);
                    }
                }, 5000);
            });
        });
        
        // Add slide out animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideOut {
                from {
                    transform: translateX(0) scale(1);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%) scale(0.8);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
        
        // Terms checkbox custom styling
        document.querySelectorAll('.terms-checkbox input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const icon = this.nextElementSibling.querySelector('i');
                if (this.checked) {
                    icon.style.color = 'white';
                } else {
                    icon.style.color = 'transparent';
                }
            });
        });
    </script>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>