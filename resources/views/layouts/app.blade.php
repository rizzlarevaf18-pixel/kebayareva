<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Réa Gallery - Kebaya & Traditional Wear')</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/Avatar.png') }}">

    <!-- Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        h1, h2, h3, h4, h5, h6, .font-elegant {
            font-family: 'Playfair Display', serif;
        }

        :root {
            --soft-pink-50: #fff5f5;
            --soft-pink-100: #ffd9d9;
            --soft-pink-200: #ffb3b3;
            --soft-pink-300: #ff8c8c;
            --soft-pink-400: #ff6666;
            --soft-pink-500: #ff4040;
            --soft-pink-600: #d93636;
            --soft-pink-700: #b32b2b;
            
            --pure-white: #ffffff;
            --off-white: #faf7f2;
            --light-cream: #fef7e9;
            --light-gray: #e8e1d9;
            --medium-gray: #b6aaa1;
            --dark-gray: #5c4e3d;
            
            --shadow-sm: 0 4px 12px rgba(255, 128, 128, 0.08);
            --shadow-md: 0 8px 24px rgba(255, 128, 128, 0.12);
            --shadow-lg: 0 16px 32px rgba(255, 128, 128, 0.16);
            
            --gradient-soft: linear-gradient(145deg, #ffd9d9, #fff0f0);
            --gradient-card: linear-gradient(145deg, #fff5f5, #ffffff);
        }

        body {
            background-color: var(--soft-pink-50);
            color: var(--dark-gray);
            margin: 0;
            padding: 0;
        }

        /* Sidebar Styles */
        .sidebar {
            background: linear-gradient(180deg, #fff5f5 0%, #ffe9e9 100%);
            border-right: 2px solid #ffd9d9;
            box-shadow: 10px 0 30px rgba(255, 150, 150, 0.1);
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 40px;
            padding: 0 10px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 16px rgba(255, 150, 150, 0.3);
        }

        .logo-icon i {
            color: white;
            font-size: 24px;
        }

        .logo-text h3 {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 700;
            color: #d96b6b;
            line-height: 1.2;
        }

        .logo-text p {
            font-size: 12px;
            color: #b88b9c;
        }

        .menu-section {
            margin-bottom: 30px;
        }

        .menu-title {
            font-size: 12px;
            font-weight: 600;
            color: #d9b8c4;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
            padding: 0 10px;
        }

        .menu-items {
            list-style: none;
            padding: 0;
        }

        .menu-item {
            margin-bottom: 5px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 15px;
            border-radius: 12px;
            color: #b88298;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .menu-link i {
            width: 22px;
            color: #b88298;
            transition: all 0.3s ease;
        }

        .menu-link:hover {
            background: linear-gradient(135deg, #fec7d5, #f8b6c8);
            color: #9e6b7e;
        }

        .menu-link:hover i {
            color: #9e6b7e;
        }

        .menu-link.active {
            background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
            color: white;
            box-shadow: 0 8px 16px rgba(255, 140, 140, 0.3);
        }

        .menu-link.active i {
            color: white;
        }

        .user-profile {
            position: absolute;
            bottom: 30px;
            left: 20px;
            right: 20px;
            padding: 15px;
            background: white;
            border-radius: 16px;
            border: 2px solid #ffd9d9;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 18px;
        }

        .user-info {
            flex: 1;
        }

        .user-info h4 {
            font-size: 14px;
            font-weight: 600;
            color: #d96b6b;
            margin-bottom: 2px;
        }

        .user-info p {
            font-size: 12px;
            color: #b88b9c;
        }

        .logout-btn {
            background: none;
            border: none;
            color: #ff8c8c;
            cursor: pointer;
            font-size: 16px;
            padding: 8px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: #ffd9d9;
            color: #ff6666;
        }

        .mobile-menu-btn {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
            border: none;
            border-radius: 12px;
            width: 45px;
            height: 45px;
            color: white;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(255, 150, 150, 0.3);
        }

        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                position: fixed;
                z-index: 1000;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .sm\:ml-64 {
                margin-left: 0 !important;
            }
            .mobile-menu-btn {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <button class="mobile-menu-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <aside id="logo-sidebar" class="sidebar fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0">
        <div class="h-full flex flex-col px-4 py-8 overflow-y-auto">
            <div class="sidebar-logo">
                <div class="logo-icon">
                    <i class="fas fa-chess-queen"></i>
                </div>
                <div class="logo-text">
                    <h3>Réa Gallery</h3>
                    <p>Kebaya & Traditional Wear</p>
                </div>
            </div>

            <div class="menu-section">
                <div class="menu-title">MAIN MENU</div>
                <ul class="menu-items">
                    <li class="menu-item">
                        <a href="{{ route('dashboard') }}" class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('items') }}" class="menu-link {{ request()->routeIs('items*') ? 'active' : '' }}">
                            <i class="fas fa-tshirt"></i> Koleksi Kebaya
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pinjamBarang') }}" class="menu-link {{ request()->routeIs('pinjamBarang') ? 'active' : '' }}">
                            <i class="fas fa-hand-holding-heart"></i> Peminjaman
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('transactions') }}" class="menu-link {{ request()->routeIs('transactions*') ? 'active' : '' }}">
                            <i class="fas fa-history"></i> Transaksi
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-section">
                <div class="menu-title">MANAJEMEN</div>
                <ul class="menu-items">
                    <li class="menu-item">
                        <a href="{{ route('logs') }}" class="menu-link {{ request()->routeIs('logs*') ? 'active' : '' }}">
                            <i class="fas fa-history"></i> Log Aktivitas
                        </a>
                    </li>
                </ul>
            </div>

            @if (auth()->user() && auth()->user()->role === 'admin')
            <div class="menu-section">
                <div class="menu-title">ADMIN</div>
                <ul class="menu-items">
                    <li class="menu-item">
                        <a href="{{ route('users') }}" class="menu-link {{ request()->routeIs('users*') ? 'active' : '' }}">
                            <i class="fas fa-users"></i> List User
                        </a>
                    </li>
                </ul>
            </div>
            @endif

            <div class="user-profile">
                <div class="user-avatar">
                    {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                </div>
                <div class="user-info">
                    <h4>{{ auth()->user()->name ?? 'User' }}</h4>
                    <p>{{ auth()->user()->role ?? 'user' }}</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('logo-sidebar');
            sidebar.classList.toggle('active');
        }

        // Tutup sidebar saat klik di luar (mobile)
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('logo-sidebar');
            const menuBtn = document.querySelector('.mobile-menu-btn');
            
            if (window.innerWidth <= 1024) {
                if (sidebar && !sidebar.contains(event.target) && !menuBtn?.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>

    @stack('scripts')
</body>
</html>