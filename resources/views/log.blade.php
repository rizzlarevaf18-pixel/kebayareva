<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Aktivitas - Réa Gallery</title>

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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
            --light-pink-bg: #fff0f0;
            --dark-gray: #4a4a4a;
            --light-gray: #f5f5f5;
            
            --shadow-sm: 0 4px 12px rgba(255, 150, 150, 0.08);
            --shadow-md: 0 8px 24px rgba(255, 150, 150, 0.12);
            --shadow-lg: 0 16px 32px rgba(255, 150, 150, 0.16);
            
            --gradient-soft: linear-gradient(145deg, #ffd9d9, #fff0f0);
        }

        body {
            background-color: var(--light-pink-bg);
            color: var(--dark-gray);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        /* Sidebar Styles - Updated to match other pages */
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

        .menu-link svg {
            width: 22px;
            fill: #b88298;
            transition: all 0.3s ease;
        }

        .menu-link:hover {
            background: linear-gradient(135deg, #fec7d5, #f8b6c8);
            color: #9e6b7e;
        }

        .menu-link:hover i,
        .menu-link:hover svg {
            color: #9e6b7e;
            fill: #9e6b7e;
        }

        .menu-link.active {
            background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
            color: white;
            box-shadow: 0 8px 16px rgba(255, 140, 140, 0.3);
        }

        .menu-link.active i,
        .menu-link.active svg {
            color: white;
            fill: white;
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

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #ffb3b3 0%, #ff8c8c 100%);
            position: relative;
            overflow: hidden;
            border-radius: 0 0 32px 32px;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
            border-radius: 50%;
        }

        .page-header::after {
            content: '';
            position: absolute;
            bottom: -50%;
            left: -10%;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
            border-radius: 50%;
        }

        /* Content Card */
        .content-card {
            background: white;
            border: 1px solid var(--soft-pink-200);
            border-radius: 32px;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .content-card:hover {
            box-shadow: var(--shadow-lg);
            border-color: var(--soft-pink-300);
        }

        .section-title {
            color: var(--soft-pink-600);
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--soft-pink-400);
            border-radius: 10px;
        }

        /* Table Styles */
        .table-container {
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid var(--soft-pink-200);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        table thead th {
            background-color: var(--soft-pink-100);
            color: var(--soft-pink-600);
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.5rem;
            border-bottom: 2px solid var(--soft-pink-300);
        }

        tbody tr {
            transition: all 0.2s ease;
        }

        tbody tr:hover {
            background-color: var(--soft-pink-50);
        }

        tbody td {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--soft-pink-100);
        }

        /* Search Input */
        .search-wrapper {
            position: relative;
            width: 320px;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--soft-pink-300);
            font-size: 14px;
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 2px solid var(--soft-pink-200);
            border-radius: 50px;
            font-size: 14px;
            transition: all 0.3s ease;
            background-color: white;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--soft-pink-400);
            box-shadow: 0 0 0 4px rgba(255, 140, 140, 0.1);
        }

        /* Button Delete */
        .btn-delete {
            background-color: var(--soft-pink-100);
            color: var(--soft-pink-600);
            border: none;
            border-radius: 50px;
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-delete:hover {
            background-color: var(--soft-pink-400);
            color: white;
            transform: translateY(-2px);
        }

        /* Modal Styles */
        .modal-content-custom {
            border-radius: 32px;
            overflow: hidden;
            border: 1px solid var(--soft-pink-300);
        }

        .modal-header-custom {
            background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
            color: white;
            padding: 1.5rem;
        }

        .modal-body-custom {
            padding: 2rem;
            background: white;
        }

        .modal-footer-custom {
            padding: 1.5rem;
            background: var(--soft-pink-50);
            border-top: 1px solid var(--soft-pink-200);
        }

        .btn-modal-delete {
            background-color: var(--soft-pink-100);
            color: var(--soft-pink-600);
            border: none;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-modal-delete:hover {
            background-color: var(--soft-pink-400);
            color: white;
        }

        .btn-modal-cancel {
            background-color: #e5e5e5;
            color: #666;
            border: none;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-modal-cancel:hover {
            background-color: #d5d5d5;
        }

        /* Alert */
        .custom-alert {
            position: fixed;
            top: 1.5rem;
            right: 1.5rem;
            z-index: 50;
            padding: 1rem 1.5rem;
            border-radius: 20px;
            background: white;
            box-shadow: var(--shadow-lg);
            border-left: 4px solid var(--soft-pink-400);
            animation: slideIn 0.3s ease;
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

        /* Status Badges */
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .status-badge i {
            font-size: 10px;
        }

        .status-badge.borrowed {
            background-color: var(--soft-pink-100);
            color: var(--soft-pink-600);
        }

        .status-badge.returned {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-badge.created {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .status-badge.updated {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-badge.deleted {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* Mobile Menu Button */
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
            align-items: center;
            justify-content: center;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                position: fixed;
                z-index: 1000;
                height: 100vh;
                overflow-y: auto;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .sm\:ml-64 {
                margin-left: 0 !important;
            }

            .mobile-menu-btn {
                display: flex;
            }
        }

        @media (max-width: 768px) {
            .sm\:ml-64 {
                margin-left: 0;
            }
            
            .search-wrapper {
                width: 100%;
            }
            
            .content-card {
                margin-left: 1rem;
                margin-right: 1rem;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--soft-pink-50);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--soft-pink-400);
            border-radius: 20px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--soft-pink-500);
        }
    </style>
</head>
<body class="bg-soft-pink-50">
    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" onclick="toggleSidebar()" id="mobileMenuBtn">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar - Updated to match other pages -->
    <aside id="logo-sidebar" class="sidebar fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full flex flex-col px-4 py-8 overflow-y-auto">
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

            <!-- MAIN MENU Section -->
            <div class="menu-section">
                <div class="menu-title">MAIN MENU</div>
                <ul class="menu-items">
                    <li class="menu-item">
                        <a href="{{ route('dashboard') }}" class="menu-link">
                            <i class="fas fa-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('items') }}" class="menu-link">
                            <i class="fas fa-tshirt"></i>
                            Koleksi Kebaya
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pinjamBarang') }}" class="menu-link">
                            <i class="fas fa-hand-holding-heart"></i>
                            Peminjaman
                        </a>
                    </li>
                </ul>
            </div>

            <!-- MANAJEMEN Section -->
            <div class="menu-section">
                <div class="menu-title">MANAJEMEN</div>
                <ul class="menu-items">
                    @if (auth()->user()->role === 'admin')
                    <li class="menu-item">
                        <a href="{{ route('users') }}" class="menu-link">
                            <i class="fas fa-users"></i>
                            List User
                        </a>
                    </li>
                    @endif
                    <li class="menu-item">
                        <a href="{{ route('logs') }}" class="menu-link active">
                            <i class="fas fa-history"></i>
                            Log Aktivitas
                        </a>
                    </li>
                </ul>
            </div>

            <!-- User Profile -->
            <div class="user-profile">
                <div class="user-avatar">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="user-info">
                    <h4>{{ auth()->user()->name }}</h4>
                    <p>{{ auth()->user()->role }}</p>
                </div>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="sm:ml-64 p-8">
        <!-- Page Header -->
        <div class="page-header p-8 mb-8">
            <div class="relative z-10">
                <div class="flex items-center gap-2 text-white mb-2 opacity-90">
                    <i class="fas fa-home text-sm"></i>
                    <span class="text-sm font-medium">Pages / Log Aktivitas</span>
                </div>
                <h1 class="text-3xl font-bold text-white">Log Aktivitas</h1>
                <p class="text-white mt-2 opacity-90">Catatan semua aktivitas peminjaman dan pengembalian kebaya</p>
            </div>
        </div>

        <!-- Content Card -->
        <div class="content-card p-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div>
                    <h2 class="section-title text-2xl font-bold mb-2">Riwayat Aktivitas</h2>
                    <p class="text-gray-500">Daftar semua aktivitas yang telah dilakukan</p>
                </div>
                
                <!-- Search -->
                <div class="search-wrapper mt-4 md:mt-0">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="table-search" class="search-input" placeholder="Cari aktivitas...">
                </div>
            </div>

            <!-- Table -->
            <div class="table-container">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Username</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                        <tr>
                            <td class="font-medium text-soft-pink-600">{{ $loop->iteration }}</td>
                            <td class="font-medium">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full bg-soft-pink-100 flex items-center justify-center">
                                        <i class="fas fa-user text-soft-pink-500 text-sm"></i>
                                    </div>
                                    {{ $log->user->name }}
                                </div>
                            </td>
                            <td>{{ $log->item->name }}</td>
                            <td>{{ $log->amount }}</td>
                            <td>
                                @php
                                    $statusClass = '';
                                    $statusIcon = '';
                                    
                                    if (str_contains(strtolower($log->action), 'pinjam') || str_contains(strtolower($log->action), 'borrow')) {
                                        $statusClass = 'borrowed';
                                        $statusIcon = 'fa-clock';
                                    } elseif (str_contains(strtolower($log->action), 'kembali') || str_contains(strtolower($log->action), 'return')) {
                                        $statusClass = 'returned';
                                        $statusIcon = 'fa-check-circle';
                                    } elseif (str_contains(strtolower($log->action), 'tambah') || str_contains(strtolower($log->action), 'create')) {
                                        $statusClass = 'created';
                                        $statusIcon = 'fa-plus-circle';
                                    } elseif (str_contains(strtolower($log->action), 'edit') || str_contains(strtolower($log->action), 'update')) {
                                        $statusClass = 'updated';
                                        $statusIcon = 'fa-edit';
                                    } elseif (str_contains(strtolower($log->action), 'hapus') || str_contains(strtolower($log->action), 'delete')) {
                                        $statusClass = 'deleted';
                                        $statusIcon = 'fa-trash';
                                    } else {
                                        $statusClass = 'borrowed';
                                        $statusIcon = 'fa-info-circle';
                                    }
                                @endphp
                                <span class="status-badge {{ $statusClass }}">
                                    <i class="fas {{ $statusIcon }}"></i>
                                    {{ $log->action }}
                                </span>
                            </td>
                            <td>
                                @if (auth()->user()->role === 'admin')
                                <button type="button" data-modal-target="popup-modal-{{ $log->id }}" data-modal-toggle="popup-modal-{{ $log->id }}" class="btn-delete">
                                    <i class="fas fa-trash"></i>
                                    Hapus Log
                                </button>

                                <!-- Modal -->
                                <div id="popup-modal-{{ $log->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="modal-content-custom">
                                            <div class="modal-header-custom">
                                                <h3 class="text-xl font-semibold flex items-center gap-2">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    Konfirmasi Hapus
                                                </h3>
                                            </div>
                                            <div class="modal-body-custom text-center">
                                                <div class="w-20 h-20 bg-soft-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                                    <i class="fas fa-trash text-3xl text-soft-pink-500"></i>
                                                </div>
                                                <h3 class="mb-2 text-lg font-semibold text-soft-pink-600">Hapus Log Aktivitas?</h3>
                                                <p class="text-gray-500 mb-4">Apakah Anda yakin ingin menghapus log ini? Tindakan ini tidak dapat dibatalkan.</p>
                                            </div>
                                            <div class="modal-footer-custom flex justify-center gap-3">
                                                <form action="{{ route('logs.delete', $log->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-modal-delete">
                                                        <i class="fas fa-trash"></i>
                                                        Ya, Hapus
                                                    </button>
                                                </form>
                                                <button data-modal-hide="popup-modal-{{ $log->id }}" type="button" class="btn-modal-cancel">
                                                    Batal
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <span class="text-soft-pink-400">-</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Footer -->
            <div class="mt-6 text-center text-soft-pink-300 text-sm">
                <i class="fas fa-history mr-1"></i> Réa Gallery - Log Aktivitas
            </div>
        </div>
    </div>

    <!-- Alert Notifications -->
    @if (session('success'))
        <div id="alert-success" class="custom-alert" style="border-left-color: #10b981;">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Berhasil!</p>
                    <p class="text-sm text-gray-500">{{ session('success') }}</p>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div id="alert-error" class="custom-alert" style="border-left-color: #ef4444;">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-exclamation-circle text-red-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Error!</p>
                    <p class="text-sm text-gray-500">{{ session('error') }}</p>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div id="alert-validation" class="custom-alert" style="border-left-color: #ef4444;">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Validasi Gagal</p>
                    <ul class="text-sm text-gray-500 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-gray-400 hover:text-gray-600 flex-shrink-0">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // Sidebar toggle for mobile
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

        // Auto-hide alerts after 3 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.custom-alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.3s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 300);
                }, 3000);
            });
        });

        // Search functionality
        const searchInput = document.getElementById('table-search');
        if (searchInput) {
            const tableRows = document.querySelectorAll('tbody tr');
            
            searchInput.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase();
                
                tableRows.forEach(row => {
                    const userName = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                    const itemName = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';
                    
                    if (userName.includes(searchTerm) || itemName.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }
    </script>
</body>
</html>