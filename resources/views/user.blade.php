<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User - Réa Gallery</title>

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
            
            --gradient-soft: linear-gradient(145deg, #ffe6e6, #fff0f0);
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
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            height: 100vh;
            overflow-y: auto;
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 40px;
            padding: 30px 20px 0 20px;
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
            padding: 0 20px;
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

        /* Main Content */
        .main-content {
            margin-left: 280px;
            padding: 24px;
            min-height: 100vh;
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #ffb3b3 0%, #ff8c8c 100%);
            border-radius: 24px;
            padding: 32px;
            margin-bottom: 32px;
            position: relative;
            overflow: hidden;
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

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            color: rgba(255,255,255,0.9);
            font-size: 14px;
        }

        .breadcrumb a {
            color: white;
            text-decoration: none;
        }

        .page-header h1 {
            font-size: 32px;
            font-weight: 700;
            color: white;
            margin-bottom: 8px;
        }

        .page-header p {
            color: rgba(255,255,255,0.9);
            font-size: 15px;
        }

        /* Content Cards */
        .content-card {
            background: var(--pure-white);
            border: 1px solid var(--soft-pink-200);
            border-radius: 32px;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            padding: 32px;
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

        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-edit {
            background-color: var(--soft-pink-100);
            color: var(--soft-pink-600);
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            margin-right: 0.5rem;
        }

        .btn-edit:hover {
            background-color: var(--soft-pink-300);
            color: white;
            transform: translateY(-2px);
        }

        .btn-delete {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .btn-delete:hover {
            background-color: #ef4444;
            color: white;
            transform: translateY(-2px);
        }

        /* Table Styles */
        .table-container {
            border-radius: 24px;
            overflow-x: auto;
            border: 1px solid var(--soft-pink-200);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
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
            text-align: left;
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

        /* Role Badges */
        .role-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .role-admin {
            background-color: var(--soft-pink-200);
            color: var(--soft-pink-700);
        }

        .role-petugas {
            background-color: #fef3c7;
            color: #92400e;
        }

        .role-user {
            background-color: var(--soft-pink-100);
            color: var(--soft-pink-600);
        }

        /* Search Input */
        .search-wrapper {
            position: relative;
        }

        .search-input {
            border: 1px solid var(--soft-pink-200);
            border-radius: 50px;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            transition: all 0.3s ease;
            background-color: var(--pure-white);
            width: 100%;
            min-width: 250px;
        }

        .search-input:focus {
            border-color: var(--soft-pink-400);
            box-shadow: 0 0 0 3px rgba(255, 128, 128, 0.1);
            outline: none;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--soft-pink-300);
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 32px;
            overflow: hidden;
            border: 1px solid var(--soft-pink-300);
            background: white;
        }

        .modal-header {
            background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
            color: white;
            padding: 1.5rem;
        }

        .modal-body {
            padding: 2rem;
            background: var(--pure-white);
        }

        .modal-footer {
            padding: 1.5rem;
            background: var(--soft-pink-50);
            border-top: 1px solid var(--soft-pink-200);
        }

        /* Form Styles */
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--soft-pink-600);
        }

        .form-input, .form-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--soft-pink-200);
            border-radius: 16px;
            transition: all 0.3s ease;
            background-color: var(--pure-white);
        }

        .form-input:focus, .form-select:focus {
            border-color: var(--soft-pink-400);
            box-shadow: 0 0 0 3px rgba(255, 128, 128, 0.1);
            outline: none;
        }

        /* Alert */
        .custom-alert {
            position: fixed;
            top: 1.5rem;
            right: 1.5rem;
            z-index: 9999;
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
        }

        @media (max-width: 768px) {
            .content-card {
                padding: 20px;
            }
            
            .page-header {
                padding: 24px;
            }
            
            .page-header h1 {
                font-size: 24px;
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

            <!-- Navigation -->
            <div class="flex-1 overflow-y-auto">
                @if (auth()->user()->role === 'admin')
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

                    <div class="menu-section">
                        <div class="menu-title">MANAJEMEN</div>
                        <ul class="menu-items">
                            <li class="menu-item">
                                <a href="#" class="menu-link active">
                                    <i class="fas fa-users"></i>
                                    List User
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('logs') }}" class="menu-link">
                                    <i class="fas fa-history"></i>
                                    Log Aktivitas
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
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
    <main class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="breadcrumb">
                <a href="#">Pages</a>
                <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                <span>List User</span>
            </div>
            <h1>Manajemen Pengguna</h1>
            <p>Mengelola data pengguna dengan cinta dan dedikasi. Setiap pengguna adalah bagian dari keluarga Réa Gallery.</p>
        </div>

        <!-- List Users Card -->
        <div class="content-card">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div>
                    <h2 class="section-title text-2xl font-bold mb-2">Daftar Pengguna</h2>
                    <p class="text-gray-500">Total {{ $users->count() }} pengguna terdaftar</p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 mt-4 md:mt-0">
                    <!-- Search -->
                    <div class="search-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" id="table-search" class="search-input" placeholder="Cari pengguna...">
                    </div>
                    
                    <!-- Tambah User Button -->
                    <button data-modal-target="adduser-modal" data-modal-toggle="adduser-modal" class="btn-primary" type="button">
                        <i class="fas fa-user-plus"></i>
                        + Tambah User
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="user-table-body">
                        @forelse ($users as $user)
                        <tr>
                            <td class="font-medium text-soft-pink-600">{{ $loop->iteration }}</td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full bg-soft-pink-100 flex items-center justify-center">
                                        <i class="fas fa-user text-soft-pink-500 text-sm"></i>
                                    </div>
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role == 'admin')
                                    <span class="role-badge role-admin">
                                        <i class="fas fa-crown"></i> Admin
                                    </span>
                                @elseif($user->role == 'petugas')
                                    <span class="role-badge role-petugas">
                                        <i class="fas fa-user-tie"></i> Petugas
                                    </span>
                                @else
                                    <span class="role-badge role-user">
                                        <i class="fas fa-user"></i> User
                                    </span>
                                @endif
                            </td>
                            <td>
                                <button data-modal-target="edit-modal-{{ $user->id }}" data-modal-toggle="edit-modal-{{ $user->id }}" class="btn-edit">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </button>
                                
                                @if($user->id != auth()->user()->id)
                                <button data-modal-target="delete-modal-{{ $user->id }}" data-modal-toggle="delete-modal-{{ $user->id }}" class="btn-delete">
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                </button>
                                @endif

                                <!-- Edit Modal -->
                                <div id="edit-modal-{{ $user->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="text-xl font-semibold flex items-center gap-2">
                                                    <i class="fas fa-user-edit"></i>
                                                    Edit Pengguna
                                                </h3>
                                            </div>
                                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="space-y-4">
                                                        <div>
                                                            <label for="name-{{ $user->id }}" class="form-label">Nama Lengkap</label>
                                                            <input type="text" id="name-{{ $user->id }}" name="name" class="form-input" value="{{ $user->name }}" required>
                                                        </div>
                                                        
                                                        <div>
                                                            <label for="email-{{ $user->id }}" class="form-label">Email</label>
                                                            <input type="email" id="email-{{ $user->id }}" name="email" class="form-input" value="{{ $user->email }}" required>
                                                        </div>
                                                        
                                                        <div>
                                                            <label for="password-{{ $user->id }}" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                                                            <input type="password" id="password-{{ $user->id }}" name="password" class="form-input" placeholder="********">
                                                        </div>
                                                        
                                                        <div>
                                                            <label for="role-{{ $user->id }}" class="form-label">Role</label>
                                                            <select id="role-{{ $user->id }}" name="role" class="form-select" required>
                                                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                                <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer flex justify-end gap-3">
                                                    <button type="button" data-modal-hide="edit-modal-{{ $user->id }}" class="px-6 py-2 bg-gray-100 text-gray-600 rounded-full hover:bg-gray-200 transition-colors">
                                                        Batal
                                                    </button>
                                                    <button type="submit" class="btn-primary">
                                                        <i class="fas fa-save"></i>
                                                        Simpan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Confirmation Modal -->
                                <div id="delete-modal-{{ $user->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background: #ef4444;">
                                                <h3 class="text-xl font-semibold flex items-center gap-2 text-white">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    Konfirmasi Hapus
                                                </h3>
                                            </div>
                                            <div class="modal-body text-center">
                                                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                                    <i class="fas fa-trash text-3xl text-red-600"></i>
                                                </div>
                                                <h3 class="mb-2 text-lg font-semibold text-gray-900">Yakin ingin menghapus?</h3>
                                                <p class="text-gray-500 mb-4">User "{{ $user->name }}" akan dihapus permanen.</p>
                                                <p class="text-sm text-red-500">⚠️ Tindakan ini tidak dapat dibatalkan!</p>
                                            </div>
                                            <div class="modal-footer flex justify-center gap-3">
                                                <form action="{{ route('users.delete', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-delete px-6 py-2" style="background-color: #ef4444; color: white;">
                                                        <i class="fas fa-trash"></i>
                                                        Ya, Hapus
                                                    </button>
                                                </form>
                                                <button data-modal-hide="delete-modal-{{ $user->id }}" type="button" class="px-6 py-2 bg-gray-100 text-gray-600 rounded-full hover:bg-gray-200 transition-colors">
                                                    Batal
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-8 text-gray-500">
                                <i class="fas fa-users text-4xl mb-3 text-soft-pink-300"></i>
                                <p>Belum ada data pengguna</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Footer -->
            <div class="mt-6 text-center text-soft-pink-300 text-sm">
                <i class="fas fa-heart text-soft-pink-400 mr-1"></i> Réa Gallery
            </div>
        </div>
    </main>

    <!-- Tambah User Modal -->
    <div id="adduser-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-xl font-semibold flex items-center gap-2">
                        <i class="fas fa-user-plus"></i>
                        Tambah Pengguna Baru
                    </h3>
                </div>
                <form action="{{ route('users') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-input" placeholder="John Smith" required>
                            </div>
                            
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-input" placeholder="name@example.com" required>
                            </div>
                            
                            <div>
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-input" placeholder="Minimal 8 karakter" required>
                            </div>
                            
                            <div>
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" placeholder="Ketik ulang password" required>
                            </div>
                            
                            <div>
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select">
                                    <option value="petugas">Petugas</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer flex justify-end gap-3">
                        <button type="button" data-modal-hide="adduser-modal" class="px-6 py-2 bg-gray-100 text-gray-600 rounded-full hover:bg-gray-200 transition-colors">
                            Batal
                        </button>
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-save"></i>
                            Simpan
                        </button>
                    </div>
                </form>
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
            const tableRows = document.querySelectorAll('#user-table-body tr');
            
            searchInput.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase();
                
                tableRows.forEach(row => {
                    const userName = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                    const userEmail = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';
                    
                    if (userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
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