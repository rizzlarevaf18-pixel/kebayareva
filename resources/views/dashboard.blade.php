<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Réa Gallery</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/Avatar.png') }}">

    <!-- Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff5f5;
            color: #4a4a4a;
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }

        :root {
            --primary: #ff8c8c;
            --primary-dark: #d96b6b;
            --primary-light: #ffb3b3;
            --secondary: #b88b9c;
            --accent: #b88298;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #ffb3b3;
            --background: #fff5f5;
            --card-bg: #ffffff;
            --text-primary: #d96b6b;
            --text-secondary: #b88b9c;
            --text-muted: #d9b8c4;
            --border: #ffd9d9;
            --sidebar-bg: #ffffff;
            --hover-bg: #ffe9e9;
            --shadow-sm: 0 2px 8px rgba(255, 150, 150, 0.1);
            --shadow-md: 0 4px 16px rgba(255, 150, 150, 0.15);
            --shadow-lg: 0 8px 24px rgba(255, 150, 150, 0.2);
        }

        /* Sidebar Styles */
        .sidebar {
            background: white;
            border-right: 2px solid var(--border);
            box-shadow: 4px 0 20px rgba(255, 150, 150, 0.1);
            height: 100vh;
            position: fixed;
            width: 260px;
            overflow-y: auto;
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 24px 20px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 20px;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(255, 140, 140, 0.3);
        }

        .logo-icon i {
            color: white;
            font-size: 24px;
        }

        .logo-text h3 {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.2;
        }

        .logo-text p {
            font-size: 12px;
            color: var(--text-secondary);
        }

        .menu-section {
            margin-bottom: 24px;
            padding: 0 16px;
        }

        .menu-title {
            font-size: 11px;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
            padding-left: 12px;
        }

        .menu-items {
            list-style: none;
        }

        .menu-item {
            margin-bottom: 4px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 12px;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 14px;
        }

        .menu-link i {
            width: 20px;
            font-size: 18px;
            color: var(--text-secondary);
            transition: all 0.3s ease;
        }

        .menu-link:hover {
            background: var(--hover-bg);
            color: var(--text-primary);
        }

        .menu-link:hover i {
            color: var(--text-primary);
        }

        .menu-link.active {
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            color: white;
            box-shadow: 0 4px 12px rgba(255, 140, 140, 0.3);
        }

        .menu-link.active i {
            color: white;
        }

        .user-profile {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: white;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
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
            color: var(--text-primary);
            margin-bottom: 2px;
        }

        .user-info p {
            font-size: 12px;
            color: var(--text-secondary);
        }

        .logout-btn {
            background: none;
            border: none;
            color: var(--primary);
            cursor: pointer;
            font-size: 16px;
            padding: 8px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: var(--hover-bg);
            color: var(--primary-dark);
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 24px;
            min-height: 100vh;
            background-color: var(--background);
        }

        /* Video Hero Section */
        .video-hero {
            position: relative;
            width: 100%;
            height: 320px;
            border-radius: 28px;
            overflow: hidden;
            margin-bottom: 32px;
            box-shadow: var(--shadow-lg);
        }

        .video-hero video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 140, 140, 0.7), rgba(217, 107, 107, 0.7));
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 48px;
            color: white;
        }

        .video-content {
            max-width: 600px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
            font-size: 14px;
            color: rgba(255,255,255,0.9);
        }

        .breadcrumb a {
            color: white;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .video-content h1 {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 16px;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.2);
        }

        .video-content p {
            font-size: 18px;
            opacity: 0.95;
            line-height: 1.6;
        }

        /* Sound Control Button */
        .sound-control {
            position: absolute;
            bottom: 20px;
            right: 20px;
            z-index: 10;
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: white;
            font-size: 20px;
        }

        .sound-control:hover {
            background: rgba(255, 255, 255, 0.5);
            transform: scale(1.05);
        }

        /* Welcome Card */
        .welcome-card {
            background: white;
            border-radius: 24px;
            padding: 32px;
            margin-bottom: 32px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
        }

        .welcome-content h2 {
            font-size: 28px;
            color: var(--text-primary);
            margin-bottom: 16px;
        }

        .welcome-content p {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 40px;
            padding: 12px 32px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(255, 140, 140, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 140, 140, 0.4);
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-light);
        }

        .stat-info h3 {
            font-size: 14px;
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .stat-info p {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-icon i {
            font-size: 28px;
            color: white;
        }

        /* Action Cards */
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .action-card {
            background: white;
            border-radius: 24px;
            padding: 32px;
            text-align: center;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .action-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-light);
        }

        .action-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            border-radius: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            box-shadow: 0 8px 16px rgba(255, 140, 140, 0.3);
        }

        .action-icon i {
            font-size: 40px;
            color: white;
        }

        .action-card h3 {
            font-size: 20px;
            color: var(--text-primary);
            margin-bottom: 12px;
        }

        .action-card a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .action-card:hover a {
            color: var(--primary-dark);
        }

        /* Table Card */
        .table-card {
            background: white;
            border-radius: 24px;
            padding: 24px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            margin-bottom: 32px;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .table-header h3 {
            font-size: 20px;
            color: var(--text-primary);
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 16px;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-primary);
            background: var(--hover-bg);
            border-bottom: 2px solid var(--border);
        }

        td {
            padding: 16px;
            font-size: 14px;
            color: var(--text-secondary);
            border-bottom: 1px solid var(--border);
        }

        tr:hover td {
            background: var(--hover-bg);
        }

        .badge {
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .badge-success {
            background: rgba(16, 185, 129, 0.1);
            color: #065f46;
        }

        .badge-warning {
            background: rgba(245, 158, 11, 0.1);
            color: #92400e;
        }

        .badge-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #991b1b;
        }

        /* Charts Section */
        .charts-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            margin-bottom: 32px;
        }

        .chart-card {
            background: white;
            border-radius: 24px;
            padding: 24px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
        }

        .chart-header {
            margin-bottom: 20px;
        }

        .chart-header h3 {
            font-size: 18px;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .chart-header p {
            font-size: 13px;
            color: var(--text-secondary);
        }

        .chart-wrapper {
            height: 250px;
            position: relative;
        }

        .chart-total {
            text-align: center;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid var(--border);
            color: var(--text-secondary);
            font-size: 14px;
        }

        .chart-total span {
            font-weight: 600;
            color: var(--primary);
            background: rgba(255, 140, 140, 0.1);
            padding: 4px 12px;
            border-radius: 50px;
            margin-left: 8px;
        }

        /* Table Hidden State */
        .hidden {
            display: none;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 24px 0;
            color: var(--text-muted);
            font-size: 14px;
            border-top: 1px solid var(--border);
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            border: none;
            border-radius: 12px;
            width: 45px;
            height: 45px;
            color: white;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(255, 140, 140, 0.3);
            align-items: center;
            justify-content: center;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 1000;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu-btn {
                display: flex;
            }

            .video-hero {
                height: 280px;
            }

            .video-content h1 {
                font-size: 32px;
            }

            .video-content p {
                font-size: 14px;
            }

            .video-overlay {
                padding: 32px;
            }

            .charts-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .actions-grid {
                grid-template-columns: 1fr;
            }

            .welcome-card {
                padding: 24px;
            }

            .video-hero {
                height: 240px;
            }

            .video-overlay {
                padding: 24px;
            }

            .video-content h1 {
                font-size: 24px;
            }
        }

        /* Custom Alert Success with Animation */
        .custom-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            padding: 16px 24px;
            border-radius: 16px;
            background: white;
            box-shadow: var(--shadow-lg);
            border-left: 4px solid var(--primary);
            animation: slideIn 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%) scale(0.8);
                opacity: 0;
            }
            to {
                transform: translateX(0) scale(1);
                opacity: 1;
            }
        }

        .alert-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-content i {
            font-size: 20px;
        }

        .alert-content .success {
            color: #10b981;
        }

        .alert-content .error {
            color: #ef4444;
        }

        .close-alert {
            background: none;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            padding: 4px;
            margin-left: 12px;
        }

        .close-alert:hover {
            color: #4b5563;
        }
    </style>
</head>
<body>
    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" onclick="toggleSidebar()" id="mobileMenuBtn">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <aside id="logo-sidebar" class="sidebar">
        <div class="h-full flex flex-col">
            <!-- Logo -->
            <div class="sidebar-logo">
                <div class="logo-icon">
                    <i class="fas fa-chess-queen"></i>
                </div>
                <div class="logo-text">
                    <h3>Réa Gallery</h3>
                    <p>Kebaya & Traditional Wear</p>
                </div>
            </div>

            <!-- Navigation - MENU UNTUK ADMIN, PETUGAS, DAN USER -->
            <div class="flex-1 overflow-y-auto">
                @if (auth()->user()->role === 'admin')
                    <!-- MAIN MENU - ADMIN -->
                    <div class="menu-section">
                        <div class="menu-title">MAIN MENU</div>
                        <ul class="menu-items">
                            <li class="menu-item">
                                <a href="{{ route('dashboard') }}" class="menu-link active">
                                    <i class="fas fa-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('items') }}" class="menu-link">
                                    <i class="fas fa-tshirt"></i>
                                    <span>Koleksi Kebaya</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('pinjamBarang') }}" class="menu-link">
                                    <i class="fas fa-hand-holding-heart"></i>
                                    <span>Peminjaman</span>
                                </a>
                            </li>
                            <li class="menu-item">
    <a href="{{ route('transactions') }}" class="menu-link">
        <i class="fas fa-receipt"></i>
        <span>Transaksi</span>
    </a>
</li>
                        </ul>
                    </div>

                    <!-- MANAJEMEN - ADMIN -->
                    <div class="menu-section">
                        <div class="menu-title">MANAJEMEN</div>
                        <ul class="menu-items">
                            <li class="menu-item">
                                <a href="{{ route('users') }}" class="menu-link">
                                    <i class="fas fa-users"></i>
                                    <span>List User</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('logs') }}" class="menu-link">
                                    <i class="fas fa-history"></i>
                                    <span>Log Aktivitas</span>
                                </a>
                            </li>
                            <li class="menu-item">
    <a href="{{ route('transactions') }}" class="menu-link">
        <i class="fas fa-receipt"></i>
        <span>Transaksi</span>
    </a>
</li>
                        </ul>
                    </div>
                    
                @elseif (auth()->user()->role === 'petugas')
                    <!-- MAIN MENU - PETUGAS (SAMA SEPERTI ADMIN TANPA MANAJEMEN USER) -->
                    <div class="menu-section">
                        <div class="menu-title">MAIN MENU</div>
                        <ul class="menu-items">
                            <li class="menu-item">
                                <a href="{{ route('dashboard') }}" class="menu-link active">
                                    <i class="fas fa-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('items') }}" class="menu-link">
                                    <i class="fas fa-tshirt"></i>
                                    <span>Koleksi Kebaya</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('pinjamBarang') }}" class="menu-link">
                                    <i class="fas fa-hand-holding-heart"></i>
                                    <span>Peminjaman</span>
                                </a>
                            </li>
                            <li class="menu-item">
    <a href="{{ route('transactions') }}" class="menu-link">
        <i class="fas fa-receipt"></i>
        <span>Transaksi</span>
    </a>
</li>
                        </ul>
                    </div>

                    <!-- MANAJEMEN - PETUGAS (TANPA USER MANAGEMENT) -->
                    <div class="menu-section">
                        <div class="menu-title">MANAJEMEN</div>
                        <ul class="menu-items">
                            <li class="menu-item">
                                <a href="{{ route('logs') }}" class="menu-link">
                                    <i class="fas fa-history"></i>
                                    <span>Log Aktivitas</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                @else
                    <!-- USER MENU -->
                    <div class="menu-section">
                        <div class="menu-title">MAIN MENU</div>
                        <ul class="menu-items">
                            <li class="menu-item">
                                <a href="{{ route('dashboard') }}" class="menu-link active">
                                    <i class="fas fa-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('pinjamBarang') }}" class="menu-link">
                                    <i class="fas fa-hand-holding-heart"></i>
                                    <span>Peminjaman</span>
                                </a>
                            </li>
                            <li class="menu-item">
    <a href="{{ route('transactions') }}" class="menu-link">
        <i class="fas fa-receipt"></i>
        <span>Transaksi</span>
    </a>
</li>
                        </ul>
                    </div>

                    <!-- MANAJEMEN - USER -->
                    <div class="menu-section">
                        <div class="menu-title">MANAJEMEN</div>
                        <ul class="menu-items">
                            <li class="menu-item">
                                <a href="{{ route('logs') }}" class="menu-link">
                                    <i class="fas fa-history"></i>
                                    <span>Log Aktivitas</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>

            <!-- User Profile dengan LOGOUT -->
            <div class="user-profile">
                <div class="user-avatar">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="user-info">
                    <h4>{{ auth()->user()->name }}</h4>
                    <p>{{ auth()->user()->role }}</p>
                </div>
                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <button type="submit" class="logout-btn" title="Logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Video Hero Section -->
        <div class="video-hero">
            <video id="heroVideo" autoplay muted loop playsinline>
                <source src="http://localhost/peminjamankebaya_rea/public/video/kebaya2.mp4" type="video/mp4">
                <source src="/peminjamankebaya_rea/public/video/kebaya2.mp4" type="video/mp4">
                <source src="{{ asset('video/kebaya2.mp4') }}" type="video/mp4">
            </video>
            <div class="video-overlay">
                <div class="video-content">
                    <div class="breadcrumb">
                        <a href="#">Pages</a>
                        <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                        <span>Dashboard</span>
                    </div>
                    <h1>Dashboard</h1>
                    <p>Kelola koleksi kebaya dengan cinta dan dedikasi. Setiap kebaya adalah karya seni yang siap menemani momen istimewa.</p>
                </div>
                <button class="sound-control" id="soundControl" onclick="toggleSound()">
                    <i class="fas fa-volume-mute"></i>
                </button>
            </div>
        </div>

        <!-- Welcome Card -->
        <div class="welcome-card">
            <div class="welcome-content">
                <h2>Selamat Datang, {{ auth()->user()->name }}! 👋</h2>
                <p>Kelola koleksi kebaya dengan cinta dan dedikasi. Setiap kebaya adalah karya seni yang siap menemani momen istimewa.</p>
                <button onclick="toggleItemsTable()" class="btn-primary">
                    <i class="fas fa-eye"></i>
                    Lihat Semua Kebaya
                </button>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            @if (auth()->user()->role === 'admin' || auth()->user()->role === 'petugas')
                <div class="stat-card">
                    <div class="stat-info">
                        <h3>Total Koleksi</h3>
                        <p>{{ $items->count() }}</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                </div>
            @endif
            
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Sedang Dipinjam</h3>
                    <p>{{ $borrowItems ?? 0 }}</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Telah Dikembalikan</h3>
                    <p>{{ $returnItems ?? 0 }}</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>

        <!-- Table Card (Hidden by default) -->
        <div id="itemsTable" class="hidden">
            <div class="table-card">
                <div class="table-header">
                    <h3>📋 Daftar Koleksi Kebaya</h3>
                    <button onclick="toggleItemsTable()" style="background: none; border: none; color: var(--primary); cursor: pointer; font-size: 18px;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Kebaya</th>
                                <th>Deskripsi</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                            <tr>
                                <td class="no-col">{{ $loop->iteration }}</td>
                                <td>
                                    @if($item->image && file_exists(public_path('images/' . $item->image)))
                                        <img src="{{ asset('images/' . $item->image) }}" 
                                             alt="{{ $item->name }}" 
                                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 10px;">
                                    @else
                                        <div style="width: 60px; height: 60px; background: #ffd9d9; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-tshirt" style="font-size: 24px; color: #ff8c8c;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $item->name }}</strong></td>
                                <td>{{ $item->description ?? 'Kebaya dengan hiasan bunga' }}</td>
                                <td>
                                    <span class="badge 
                                        @if($item->stock > 5) badge-success
                                        @elseif($item->stock > 0) badge-warning
                                        @else badge-danger @endif">
                                        <i class="fas 
                                            @if($item->stock > 5) fa-check-circle
                                            @elseif($item->stock > 0) fa-exclamation-circle
                                            @else fa-times-circle @endif">
                                        </i>
                                        {{ $item->stock }} pcs
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 48px;">
                                    <i class="fas fa-tshirt" style="font-size: 48px; color: var(--text-muted); margin-bottom: 16px;"></i>
                                    <p style="color: var(--text-secondary);">Belum ada koleksi kebaya</p>
                                    <p style="color: var(--text-muted); font-size: 13px;">Admin perlu menambahkan kebaya terlebih dahulu.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($items->count() > 0)
                <div style="margin-top: 24px; padding-top: 24px; border-top: 1px solid var(--border); display: flex; gap: 16px; justify-content: center;">
                    <div style="text-align: center; padding: 16px; background: #f0fdf4; border-radius: 12px; flex: 1;">
                        <p style="font-size: 13px; color: #166534; margin-bottom: 4px;">Total Koleksi</p>
                        <p style="font-size: 24px; font-weight: 700; color: #166534;">{{ $items->count() }}</p>
                    </div>
                    <div style="text-align: center; padding: 16px; background: #fce7f3; border-radius: 12px; flex: 1;">
                        <p style="font-size: 13px; color: #9d174d; margin-bottom: 4px;">Total Stok</p>
                        <p style="font-size: 24px; font-weight: 700; color: #9d174d;">{{ $items->sum('stock') }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Action Cards -->
        <div class="actions-grid">
            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                <h3>Sewa Kebaya</h3>
                <a href="{{ route('pinjamBarang') }}">Klik Disini <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-undo-alt"></i>
                </div>
                <h3>Kembalikan</h3>
                <a href="{{ route('pinjamBarang') }}">Klik Disini <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="charts-grid">
            <div class="chart-card">
                <div class="chart-header">
                    <h3>Peminjaman Bulanan</h3>
                    <p>Total kebaya yang dipinjam per bulan</p>
                </div>
                <div class="chart-wrapper">
                    <canvas id="borrowChart"></canvas>
                </div>
                <div class="chart-total">
                    Total peminjaman: <span id="totalBorrow">0</span> kebaya
                </div>
            </div>
            <div class="chart-card">
                <div class="chart-header">
                    <h3>Pengembalian Bulanan</h3>
                    <p>Total kebaya yang dikembalikan per bulan</p>
                </div>
                <div class="chart-wrapper">
                    <canvas id="returnChart"></canvas>
                </div>
                <div class="chart-total">
                    Total pengembalian: <span id="totalReturn">0</span> kebaya
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <p>© {{ date('Y') }} Réa Gallery. All rights reserved.</p>
            <p style="margin-top: 4px;">Mengelola koleksi kebaya dengan cinta dan dedikasi.</p>
        </footer>
    </main>

    <!-- Dynamic Login Success Notification with Sound -->
    <div id="loginSuccessAlert" style="display: none;"></div>

    <!-- Audio Element for Notification Sound -->
    <audio id="loginSound" preload="auto">
        <source src="{{ asset('public/sound/sound1.wav') }}" type="audio/wav">
        <source src="/public/sound/sound1.wav" type="audio/wav">
        <source src="http://localhost/peminjamankebaya_rea/public/sound/sound1.wav" type="audio/wav">
    </audio>

    <!-- Scripts -->
    <script>
        // Function to show login success notification with sound
        function showLoginSuccessNotification() {
            const userName = "{{ auth()->user()->name }}";
            const alertContainer = document.getElementById('loginSuccessAlert');
            
            // Create notification element
            const alertDiv = document.createElement('div');
            alertDiv.className = 'custom-alert';
            alertDiv.style.borderLeftColor = '#10b981';
            alertDiv.innerHTML = `
                <div class="alert-content">
                    <div style="width: 40px; height: 40px; background: #ecfdf5; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-check-circle success"></i>
                    </div>
                    <div>
                        <p style="font-weight: 600; color: #111827;">Login Berhasil!</p>
                        <p style="font-size: 13px; color: #6b7280;">Selamat datang kembali, ${userName}!</p>
                    </div>
                    <button class="close-alert" onclick="this.parentElement.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            
            alertContainer.appendChild(alertDiv);
            alertContainer.style.display = 'block';
            
            // Play sound notification
            const sound = document.getElementById('loginSound');
            if (sound) {
                sound.play().catch(e => {
                    console.log('Audio play failed:', e);
                    // Fallback: create a temporary audio context for browsers that require user interaction
                    const AudioContext = window.AudioContext || window.webkitAudioContext;
                    if (AudioContext) {
                        const audioCtx = new AudioContext();
                        // We don't actually need to play here, just resume if suspended
                        if (audioCtx.state === 'suspended') {
                            audioCtx.resume().then(() => {
                                sound.play().catch(err => console.log('Still failed:', err));
                            });
                        }
                    }
                });
            }
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                if (alertDiv && alertDiv.parentNode) {
                    alertDiv.style.transition = 'opacity 0.3s ease';
                    alertDiv.style.opacity = '0';
                    setTimeout(() => {
                        if (alertDiv.parentNode) alertDiv.remove();
                        if (alertContainer.children.length === 0) alertContainer.style.display = 'none';
                    }, 300);
                }
            }, 5000);
        }
        
        // Sound Control Function
        const video = document.getElementById('heroVideo');
        const soundBtn = document.getElementById('soundControl');
        let isMuted = true;
        
        function toggleSound() {
            if (video) {
                video.muted = !video.muted;
                isMuted = video.muted;
                
                if (isMuted) {
                    soundBtn.innerHTML = '<i class="fas fa-volume-mute"></i>';
                } else {
                    soundBtn.innerHTML = '<i class="fas fa-volume-up"></i>';
                }
            }
        }
        
        // Chart Data
        var borrowData = [8, 12, 15, 20, 25, 18, 22, 28, 30, 24, 18, 15];
        var returnData = [6, 10, 14, 18, 22, 16, 20, 24, 26, 22, 16, 12];
        var totalBorrow = borrowData.reduce((a, b) => a + b, 0);
        var totalReturn = returnData.reduce((a, b) => a + b, 0);

        // Initialize Charts
        window.onload = function() {
            document.getElementById('totalBorrow').innerHTML = totalBorrow;
            document.getElementById('totalReturn').innerHTML = totalReturn;
            
            // Borrow Chart
            new Chart(document.getElementById('borrowChart'), {
                type: 'line',
                data: {
                    labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
                    datasets: [{
                        label: 'Peminjaman',
                        data: borrowData,
                        borderColor: '#ff8c8c',
                        backgroundColor: 'rgba(255, 140, 140, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        pointBackgroundColor: '#ff8c8c',
                        pointBorderColor: '#fff',
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: { 
                        y: { 
                            beginAtZero: true,
                            grid: { color: 'rgba(255,140,140,0.05)' },
                            ticks: { color: '#d96b6b' }
                        },
                        x: { 
                            grid: { display: false },
                            ticks: { color: '#d96b6b' }
                        }
                    }
                }
            });
            
            // Return Chart
            new Chart(document.getElementById('returnChart'), {
                type: 'bar',
                data: {
                    labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
                    datasets: [{
                        label: 'Pengembalian',
                        data: returnData,
                        backgroundColor: 'rgba(255, 140, 140, 0.2)',
                        borderColor: '#b88b9c',
                        borderWidth: 2,
                        borderRadius: 8,
                        barPercentage: 0.6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: { 
                        y: { 
                            beginAtZero: true,
                            grid: { color: 'rgba(255,140,140,0.05)' },
                            ticks: { color: '#d96b6b' }
                        },
                        x: { 
                            grid: { display: false },
                            ticks: { color: '#d96b6b' }
                        }
                    }
                }
            });
            
            // Show login success notification with sound when dashboard loads
            // This simulates the user just logged in successfully
            showLoginSuccessNotification();
        };

        // Toggle Items Table
        function toggleItemsTable() {
            const table = document.getElementById('itemsTable');
            const button = document.querySelector('.welcome-card .btn-primary');
            if (table.classList.contains('hidden')) {
                table.classList.remove('hidden');
                button.innerHTML = '<i class="fas fa-eye-slash"></i> Sembunyikan Koleksi';
            } else {
                table.classList.add('hidden');
                button.innerHTML = '<i class="fas fa-eye"></i> Lihat Semua Kebaya';
            }
        }
        
        // Toggle Sidebar for Mobile
        function toggleSidebar() {
            document.getElementById('logo-sidebar').classList.toggle('active');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('logo-sidebar');
            const mobileBtn = document.getElementById('mobileMenuBtn');
            
            if (window.innerWidth <= 1024) {
                if (sidebar && mobileBtn) {
                    if (!sidebar.contains(event.target) && !mobileBtn.contains(event.target)) {
                        sidebar.classList.remove('active');
                    }
                }
            }
        });

        // Auto-hide other alerts after 3 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.custom-alert:not(#loginSuccessAlert .custom-alert)');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.3s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 300);
                }, 3000);
            });
        });
        
        // Confirm logout
        document.getElementById('logout-form')?.addEventListener('submit', function(e) {
            if (!confirm('Apakah Anda yakin ingin logout?')) {
                e.preventDefault();
            }
        });
    </script>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>