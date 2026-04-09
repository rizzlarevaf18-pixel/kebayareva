<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Peminjaman Kebaya</title>
    
    <link rel="icon" type="image/png" href="{{ asset('assets/img/Avatar.png') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f8e9e9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            /* Menambahkan background image pattern batik */
            background-image: url('https://www.transparenttextures.com/patterns/batik-pattern.png'), 
                              radial-gradient(circle at 10% 20%, rgba(255, 223, 223, 0.3) 0%, transparent 30%),
                              radial-gradient(circle at 90% 80%, rgba(255, 200, 200, 0.3) 0%, transparent 30%);
            background-blend-mode: overlay;
        }

        /* Main Container */
        .login-container {
            width: 100%;
            max-width: 1200px;
            background: white;
            border-radius: 32px;
            box-shadow: 0 25px 50px -12px rgba(139, 69, 19, 0.25);
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            overflow: hidden;
            animation: fadeIn 0.8s ease;
            position: relative;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, #e8b4b4, #d88c9a, #c97777);
            z-index: 10;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Left Side - Image Section dengan Nuansa Kebaya */
        .image-section {
            position: relative;
            height: 650px;
            overflow: hidden;
            background: linear-gradient(135deg, #2c1810, #4a2a1a);
        }

        .image-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.85;
            transition: transform 0.8s ease;
        }

        .image-section:hover img {
            transform: scale(1.05);
        }

        /* Overlay dengan Motif Batik */
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, 
                rgba(44, 24, 16, 0.8) 0%, 
                rgba(139, 69, 19, 0.4) 50%,
                rgba(44, 24, 16, 0.3) 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 50px 35px;
            color: white;
        }

        .image-overlay::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.1"><path d="M20,20 Q30,10 40,20 T60,20 T80,20" stroke="white" fill="none" stroke-width="0.5"/><path d="M20,40 Q35,30 50,40 T80,40" stroke="white" fill="none" stroke-width="0.5"/><path d="M20,60 Q40,50 60,60 T90,60" stroke="white" fill="none" stroke-width="0.5"/><circle cx="30" cy="75" r="2" fill="white"/><circle cx="50" cy="75" r="2" fill="white"/><circle cx="70" cy="75" r="2" fill="white"/></svg>');
            background-repeat: repeat;
            background-size: 150px 150px;
            opacity: 0.15;
            pointer-events: none;
        }

        .overlay-badge {
            position: absolute;
            top: 30px;
            left: 30px;
            background: rgba(232, 180, 180, 0.25);
            backdrop-filter: blur(10px);
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid rgba(255, 215, 215, 0.4);
            color: #ffd5d5;
            font-family: 'Playfair Display', serif;
        }

        .overlay-content {
            position: relative;
            z-index: 2;
        }

        .overlay-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 4px 15px rgba(0,0,0,0.4);
            letter-spacing: 1px;
        }

        .overlay-content p {
            font-size: 15px;
            opacity: 0.95;
            margin-bottom: 25px;
            line-height: 1.6;
            max-width: 80%;
            font-weight: 300;
            font-style: italic;
        }

        .feature-tags {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .feature-tags span {
            background: rgba(255, 235, 235, 0.2);
            backdrop-filter: blur(5px);
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 13px;
            border: 1px solid rgba(255, 200, 200, 0.4);
            display: flex;
            align-items: center;
            gap: 8px;
            color: #fff0f0;
        }

        .feature-tags span i {
            color: #ffb6b6;
            font-size: 12px;
        }

        /* Right Side - Form Section */
        .form-section {
            padding: 50px 45px;
            background: #fffaf5;
            position: relative;
        }

        .form-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle at top right, #f8d7d7, transparent 70%);
            opacity: 0.4;
            border-radius: 0 0 0 150px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 30px;
            position: relative;
        }

        .brand-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #c97777, #b15c5c);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 16px rgba(201, 119, 119, 0.2);
        }

        .brand-icon i {
            color: white;
            font-size: 24px;
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 700;
            background: linear-gradient(135deg, #c97777, #a14d4d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 0.5px;
        }

        .welcome-text {
            margin-bottom: 35px;
        }

        .welcome-text h3 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: #4a2a1a;
            margin-bottom: 8px;
        }

        .welcome-text p {
            color: #8b6b5c;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #4a2a1a;
            font-size: 13px;
            letter-spacing: 0.3px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #c97777;
            font-size: 16px;
            transition: all 0.2s ease;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px 14px 48px;
            border: 2px solid #f0d7d7;
            border-radius: 14px;
            font-size: 14px;
            transition: all 0.2s ease;
            background: white;
            font-family: 'Poppins', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: #c97777;
            background: white;
            box-shadow: 0 0 0 4px rgba(201, 119, 119, 0.1);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #4a2a1a;
        }

        .remember-me input {
            width: 16px;
            height: 16px;
            accent-color: #c97777;
            border-radius: 4px;
        }

        .forgot-link {
            color: #c97777;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .forgot-link:hover {
            color: #a14d4d;
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #c97777, #b15c5c);
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(201, 119, 119, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            letter-spacing: 0.5px;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(201, 119, 119, 0.35);
            background: linear-gradient(135deg, #b15c5c, #9e4b4b);
        }

        .btn-login i {
            font-size: 16px;
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            color: #8b6b5c;
            font-size: 13px;
        }

        .register-link a {
            color: #c97777;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .register-link a:hover {
            color: #a14d4d;
            text-decoration: underline;
        }

        /* Decorative Elements */
        .decor-line {
            position: absolute;
            bottom: 30px;
            right: 45px;
            display: flex;
            gap: 6px;
        }

        .decor-line span {
            width: 30px;
            height: 2px;
            background: linear-gradient(90deg, #f0d7d7, #c97777);
            border-radius: 2px;
        }

        .decor-line span:nth-child(2) {
            width: 20px;
            opacity: 0.7;
        }

        .decor-line span:nth-child(3) {
            width: 10px;
            opacity: 0.5;
        }

        /* Alert Styles */
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            padding: 16px 22px;
            border-radius: 12px;
            background: white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-left: 4px solid;
            animation: slideIn 0.3s ease;
            max-width: 380px;
        }

        .alert-success {
            border-left-color: #c97777;
        }

        .alert-error {
            border-left-color: #b15c5c;
        }

        .alert-content {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .alert-content i {
            font-size: 18px;
            margin-top: 2px;
        }

        .alert-success i {
            color: #c97777;
        }

        .alert-error i {
            color: #b15c5c;
        }

        .alert-message h4 {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 4px;
            color: #2d1f12;
        }

        .alert-message p, .alert-message li {
            font-size: 12px;
            color: #6b5a4a;
        }

        .alert-message ul {
            list-style: none;
            padding-left: 0;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Responsive */
        @media (max-width: 968px) {
            .login-container {
                grid-template-columns: 1fr;
                max-width: 500px;
            }
            
            .image-section {
                display: none;
            }
            
            .form-section {
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>
    <!-- Login Container -->
    <div class="login-container">
        <!-- Left Side - Image dengan Nuansa Kebaya -->
        <div class="image-section">
            <!-- Mengganti URL gambar yang lebih reliable dan sesuai tema kebaya -->
            <img src="https://images.pexels.com/photos/6360764/pexels-photo-6360764.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                 alt="Wanita Memakai Kebaya Modern">
            
            <!-- Overlay Content -->
            <div class="image-overlay">
                <div class="overlay-badge">
                    <i class="fas fa-chess-queen me-1"></i> Réa Gallery
                </div>
                
                <div class="overlay-content">
                    <h2>Setiap Wanita adalah Ratu</h2>
                    <p>Merawat Tradisi dalam Balutan Modern. Setiap jahitan adalah cerita, setiap kebaya adalah karya.</p>
                    
                    <div class="feature-tags">
                        <span><i class="fas fa-tshirt"></i> Modern & Tradisional</span>
                        <span><i class="fas fa-gem"></i> Premium Quality</span>
                        <span><i class="fas fa-tag"></i> Harga Bersahabat</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Form Section -->
        <div class="form-section">
            <!-- Brand -->
            <div class="brand">
                <div class="brand-icon">
                    <i class="fas fa-chess-queen"></i>
                </div>
                <span class="brand-name">Réa Gallery</span>
            </div>

            <!-- Welcome Text -->
            <div class="welcome-text">
                <h3>Selamat Datang Kembali! 👋</h3>
                <p>Silakan masuk ke akun Anda untuk memulai</p>
            </div>

            <!-- Login Form -->
            <form action="/login" method="POST">
                @csrf
                
                <!-- Email Input -->
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <div class="input-wrapper">
                        <i class="far fa-envelope input-icon"></i>
                        <input type="email" 
                               class="form-control" 
                               id="email" 
                               name="email" 
                               placeholder="Masukkan email Anda"
                               value="{{ old('email') }}"
                               required>
                    </div>
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" 
                               class="form-control" 
                               id="password" 
                               name="password" 
                               placeholder="Masukkan kata sandi"
                               required>
                    </div>
                </div>

                <!-- Options -->
                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Ingat saya</span>
                    </label>
                    <a href="#" class="forgot-link">
                        Lupa password?
                    </a>
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Masuk
                </button>

                <!-- Register Link -->
                <div class="register-link">
                    Belum punya akun? 
                    <a href="/register">
                        Daftar sekarang
                    </a>
                </div>
            </form>

            <!-- Decorative Line -->
            <div class="decor-line">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <!-- Alerts -->
    @if (session('success'))
    <div class="alert alert-success">
        <div class="alert-content">
            <i class="fas fa-check-circle"></i>
            <div class="alert-message">
                <h4>Berhasil</h4>
                <p>{{ session('success') }}</p>
            </div>
            <button style="background: none; border: none; color: #94a3b8; cursor: pointer; font-size: 14px; margin-left: auto;" onclick="this.parentElement.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-error">
        <div class="alert-content">
            <i class="fas fa-exclamation-circle"></i>
            <div class="alert-message">
                <h4>Gagal</h4>
                <p>{{ session('error') }}</p>
            </div>
            <button style="background: none; border: none; color: #94a3b8; cursor: pointer; font-size: 14px; margin-left: auto;" onclick="this.parentElement.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-error">
        <div class="alert-content">
            <i class="fas fa-exclamation-circle"></i>
            <div class="alert-message">
                <h4>Validasi Gagal</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button style="background: none; border: none; color: #94a3b8; cursor: pointer; font-size: 14px; margin-left: auto;" onclick="this.parentElement.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    @endif

    <script>
        // Auto-hide alerts after 4 seconds
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                if (alert) {
                    alert.style.animation = 'slideIn 0.3s ease reverse';
                    setTimeout(() => alert.remove(), 300);
                }
            });
        }, 4000);

        // Loading state for button
        document.querySelector('.btn-login')?.addEventListener('click', function(e) {
            const form = document.querySelector('form');
            if (form && form.checkValidity()) {
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            }
        });
    </script>
</body>
</html>