<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris - Réa Gallery</title>
    
    <link rel="icon" type="image/png" href="{{ asset('assets/img/Avatar.png') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- CSRF Token untuk AJAX -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #fff0f0;
            min-height: 100vh;
            padding: 0;
            background-image: url('https://www.transparenttextures.com/patterns/batik-pattern.png'), 
                              radial-gradient(circle at 10% 20%, rgba(255, 200, 200, 0.2) 0%, transparent 30%),
                              radial-gradient(circle at 90% 80%, rgba(255, 180, 180, 0.2) 0%, transparent 30%);
            background-blend-mode: overlay;
            display: flex;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #fff5f5 0%, #ffe9e9 100%);
            border-right: 2px solid #ffd9d9;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            padding: 30px 20px;
            box-shadow: 10px 0 30px rgba(255, 150, 150, 0.1);
            z-index: 100;
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
            font-size: 28px;
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
            padding: 20px 15px;
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

        /* Main Content Adjustment */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 20px;
            min-height: 100vh;
        }

        /* Main Container */
        .inventaris-container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            background: white;
            border-radius: 32px;
            box-shadow: 0 25px 50px -12px rgba(255, 150, 150, 0.25);
            overflow: hidden;
            animation: fadeIn 0.8s ease;
            position: relative;
        }

        .inventaris-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, #ffb3b3, #ff8c8c, #ff6666);
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

        /* Header Section */
        .header-section {
            position: relative;
            height: 280px;
            overflow: hidden;
            background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
        }

        .header-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.3;
        }

        .header-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to right, 
                rgba(255, 150, 150, 0.9) 0%, 
                rgba(255, 120, 120, 0.8) 100%);
            display: flex;
            align-items: center;
            padding: 0 50px;
            color: white;
        }

        .header-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
        }

        .breadcrumb i {
            font-size: 12px;
        }

        .breadcrumb a {
            color: white;
            text-decoration: none;
            opacity: 0.9;
        }

        .header-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .header-content p {
            font-size: 16px;
            opacity: 0.95;
            line-height: 1.6;
            font-weight: 300;
            font-style: italic;
        }

        .header-badge {
            position: absolute;
            top: 30px;
            right: 50px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 12px 24px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 500;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            font-family: 'Playfair Display', serif;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Content Section */
        .content-section {
            padding: 40px 50px;
            background: #fffafa;
            position: relative;
        }

        /* Brand */
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 30px;
        }

        .brand-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 16px rgba(255, 150, 150, 0.2);
        }

        .brand-icon i {
            color: white;
            font-size: 24px;
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(135deg, #ff8c8c, #ff6666);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 0.5px;
        }

        /* Action Bar */
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .action-left {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .action-left h2 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: #d96b6b;
        }

        .btn-tambah {
            background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px 30px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(255, 150, 150, 0.25);
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Poppins', sans-serif;
        }

        .btn-tambah:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(255, 150, 150, 0.35);
            background: linear-gradient(135deg, #ff8c8c, #ff6666);
        }

        /* Search Box */
        .search-wrapper {
            position: relative;
            width: 320px;
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #ff8c8c;
            font-size: 16px;
        }

        .search-input {
            width: 100%;
            padding: 14px 16px 14px 48px;
            border: 2px solid #ffd9d9;
            border-radius: 14px;
            font-size: 14px;
            transition: all 0.2s ease;
            background: white;
            font-family: 'Poppins', sans-serif;
        }

        .search-input:focus {
            outline: none;
            border-color: #ff8c8c;
            box-shadow: 0 0 0 4px rgba(255, 140, 140, 0.1);
        }

        /* Table */
        .table-container {
            background: white;
            border-radius: 24px;
            overflow-x: auto;
            box-shadow: 0 10px 30px rgba(255, 150, 150, 0.1);
            border: 2px solid #ffd9d9;
            position: relative;
            z-index: 2;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        thead {
            background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
            color: white;
        }

        th {
            padding: 20px 24px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        td {
            padding: 20px 24px;
            border-bottom: 1px solid #ffd9d9;
            color: #a15a5a;
            font-size: 14px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tbody tr {
            transition: all 0.2s ease;
        }

        tbody tr:hover {
            background: #fff0f0;
        }

        .no-col {
            font-weight: 700;
            color: #ff8c8c;
            width: 60px;
        }

        .harga-col {
            font-weight: 600;
            color: #d96b6b;
            white-space: nowrap;
        }

        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid #ffd9d9;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .product-image:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(255, 140, 140, 0.3);
        }

        .image-preview {
            margin-top: 15px;
            text-align: center;
        }

        .image-preview img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 12px;
            border: 2px solid #ffd9d9;
            object-fit: cover;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-edit {
            background: #ffd9d9;
            color: #ff8c8c;
            border: none;
            border-radius: 10px;
            padding: 8px 16px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-edit:hover {
            background: #ff8c8c;
            color: white;
        }

        .btn-delete {
            background: #ffe5e5;
            color: #ff6666;
            border: none;
            border-radius: 10px;
            padding: 8px 16px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-delete:hover {
            background: #ff6666;
            color: white;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 32px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            animation: modalSlideIn 0.3s ease;
            position: relative;
        }

        .modal-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, #ffb3b3, #ff8c8c, #ff6666);
            border-radius: 32px 32px 0 0;
        }

        @keyframes modalSlideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            padding: 30px 30px 20px;
            border-bottom: 1px solid #ffd9d9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            color: #d96b6b;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 20px;
            color: #ff8c8c;
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .modal-close:hover {
            background: #fff0f0;
        }

        .modal-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
            color: #d96b6b;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #ffd9d9;
            border-radius: 14px;
            font-size: 14px;
            transition: all 0.2s ease;
            font-family: 'Poppins', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: #ff8c8c;
            box-shadow: 0 0 0 4px rgba(255, 140, 140, 0.1);
        }

        .file-input-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 18px;
            background: #fff0f0;
            border: 2px dashed #ffd9d9;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            color: #d96b6b;
        }

        .file-input-label:hover {
            background: #ffe5e5;
            border-color: #ff8c8c;
        }

        .modal-footer {
            padding: 20px 30px 30px;
            border-top: 1px solid #ffd9d9;
            display: flex;
            gap: 15px;
            justify-content: flex-end;
        }

        .btn-simpan {
            background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 30px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-simpan:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(255, 150, 150, 0.25);
        }

        .btn-batal {
            background: #ffd9d9;
            color: #ff8c8c;
            border: none;
            border-radius: 12px;
            padding: 12px 30px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-batal:hover {
            background: #ffcccc;
        }

        /* Action Modal */
        .action-modal-content {
            text-align: center;
            padding: 40px;
        }

        .action-icon {
            width: 80px;
            height: 80px;
            background: #fff0f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 32px;
            color: #ff8c8c;
        }

        .action-buttons-modal {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        /* Alert */
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 2000;
            padding: 16px 22px;
            border-radius: 16px;
            background: white;
            box-shadow: 0 10px 25px rgba(255, 150, 150, 0.15);
            border-left: 4px solid;
            animation: slideIn 0.3s ease;
            max-width: 380px;
        }

        .alert-success {
            border-left-color: #ff8c8c;
        }

        .alert-error {
            border-left-color: #ff6666;
        }

        .alert-content {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .alert-content i {
            font-size: 18px;
        }

        .alert-success i {
            color: #ff8c8c;
        }

        .alert-error i {
            color: #ff6666;
        }

        .alert-message h4 {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 4px;
            color: #d96b6b;
        }

        .alert-message p {
            font-size: 12px;
            color: #a15a5a;
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

        .decor-line {
            position: absolute;
            bottom: 30px;
            right: 50px;
            display: flex;
            gap: 6px;
        }

        .decor-line span {
            width: 30px;
            height: 2px;
            background: linear-gradient(90deg, #ffd9d9, #ff8c8c);
            border-radius: 2px;
        }

        /* Loading Spinner */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
        }
        .loading-overlay.active {
            display: flex;
        }
        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #ffd9d9;
            border-top-color: #ff8c8c;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
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
        }

        /* Image Modal */
        .image-modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.9);
            z-index: 2001;
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .image-modal.active {
            display: flex;
        }

        .image-modal img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            border-radius: 16px;
        }

        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .mobile-menu-btn {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .content-section {
                padding: 30px 20px;
            }
            .action-bar {
                flex-direction: column;
                align-items: stretch;
            }
            .search-wrapper {
                width: 100%;
            }
            .header-overlay {
                padding: 0 30px;
            }
            .header-content h1 {
                font-size: 32px;
            }
            .header-badge {
                position: static;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner"></div>
    </div>

    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
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
                    <a href="{{ route('dashboard') }}" class="menu-link">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('items') }}" class="menu-link active">
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
                <li class="menu-item">
                    <a href="{{ route('transactions') }}" class="menu-link">
                        <i class="fas fa-history"></i>
                        Transaksi
                    </a>
                </li>
            </ul>
        </div>

        @if(auth()->user()->role === 'admin')
        <div class="menu-section">
            <div class="menu-title">MANAJEMEN</div>
            <ul class="menu-items">
                <li class="menu-item">
                    <a href="{{ route('users') }}" class="menu-link">
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
        @elseif(auth()->user()->role === 'petugas')
        <div class="menu-section">
            <div class="menu-title">MANAJEMEN</div>
            <ul class="menu-items">
                <li class="menu-item">
                    <a href="{{ route('logs') }}" class="menu-link">
                        <i class="fas fa-history"></i>
                        Log Aktivitas
                    </a>
                </li>
            </ul>
        </div>
        @endif

        <div class="user-profile">
            <div class="user-avatar">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
            <div class="user-info">
                <h4>{{ auth()->user()->name }}</h4>
                <p>{{ auth()->user()->role }}</p>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="margin-left: auto;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #ff8c8c; cursor: pointer; font-size: 16px;">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <div class="inventaris-container">
            <div class="header-section">
                <img src="https://images.pexels.com/photos/6360764/pexels-photo-6360764.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                     alt="Kebaya Collection">
                <div class="header-overlay">
                    <div class="header-content">
                        <div class="breadcrumb">
                            <a href="#">Home</a>
                            <i class="fas fa-chevron-right"></i>
                            <span>Inventaris</span>
                        </div>
                        <h1>Koleksi Kebaya</h1>
                        <p>Mengelola koleksi kebaya dengan cinta dan dedikasi. Setiap kebaya adalah karya seni yang siap menemani momen istimewa.</p>
                    </div>
                    <div class="header-badge">
                        <i class="fas fa-chess-queen"></i>
                        Réa Gallery
                    </div>
                </div>
            </div>

            <div class="content-section">
                <div class="brand">
                    <div class="brand-icon">
                        <i class="fas fa-chess-queen"></i>
                    </div>
                    <span class="brand-name">Réa Gallery - Manajemen Inventaris</span>
                </div>

                <div class="action-bar">
                    <div class="action-left">
                        <h2>Daftar Koleksi Kebaya</h2>
                        <button class="btn-tambah" id="btnTambah">
                            <i class="fas fa-plus-circle"></i> Tambah Kebaya
                        </button>
                    </div>
                    <div class="search-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" id="searchInput" placeholder="Cari kebaya...">
                    </div>
                </div>

                <div class="table-container">
                    <table id="kebayaTable">
                        <thead>
                            <tr><th>No</th><th>Nama Kebaya</th><th>Ukuran</th><th>Warna</th><th>Harga</th><th>Stok</th><th>Gambar</th><th>Aksi</th></tr>
                        </thead>
                        <tbody id="tableBody">
                            <tr><td colspan="8" style="text-align:center;">Memuat data...</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="decor-line"><span></span><span></span><span></span></div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah/Edit -->
    <div id="itemModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Tambah Kebaya</h3>
                <button class="modal-close" onclick="closeModal()"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="itemId">
                <div class="form-group"><label>Nama Kebaya</label><input type="text" id="namaKebaya" class="form-control" placeholder="Contoh: Kebaya Encim Brokat"></div>
                <div class="form-group"><label>Ukuran</label><input type="text" id="ukuran" class="form-control" placeholder="Contoh: S, M, L, XL"></div>
                <div class="form-group"><label>Warna</label><input type="text" id="warna" class="form-control" placeholder="Contoh: Merah, Biru, Hijau"></div>
                <div class="form-group"><label>Harga (Rp)</label><input type="number" id="harga" class="form-control" placeholder="Contoh: 500000" min="0"></div>
                <div class="form-group"><label>Stok</label><input type="number" id="stok" class="form-control" placeholder="Contoh: 10" min="0"></div>
                <div class="form-group">
                    <label>Upload Gambar</label>
                    <div class="file-input-wrapper">
                        <div class="file-input-label" onclick="document.getElementById('gambarFile').click()">
                            <i class="fas fa-cloud-upload-alt"></i> <span>Pilih file gambar</span>
                        </div>
                        <input type="file" id="gambarFile" accept="image/*" style="display: none;" onchange="previewImage(this)">
                    </div>
                    <div class="image-preview" id="imagePreviewContainer" style="display: none;">
                        <img id="imagePreview" src="" alt="Preview Gambar">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-batal" onclick="closeModal()">Batal</button>
                <button class="btn-simpan" onclick="simpanItem()">Simpan</button>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="modal">
        <div class="modal-content action-modal-content">
            <div class="action-icon"><i class="fas fa-trash-alt"></i></div>
            <h3 style="color: #d96b6b;">Hapus Kebaya</h3>
            <p>Apakah Anda yakin ingin menghapus kebaya ini?</p>
            <div class="action-buttons-modal">
                <button class="btn-batal" onclick="closeDeleteModal()">Batal</button>
                <button class="btn-simpan" id="confirmDeleteBtn" style="background: #ff6666;">Hapus</button>
            </div>
        </div>
    </div>

    <!-- Modal Preview Gambar -->
    <div id="imageModal" class="image-modal" onclick="closeImageModal()">
        <img id="previewImage" src="" alt="Preview">
    </div>

    <!-- Alert Container -->
    <div id="alertContainer"></div>

    <script>
        // CSRF Token untuk semua AJAX request
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        let items = [];
        let currentId = null;
        let deleteId = null;
        let searchTerm = '';
        let selectedFile = null;

        // Helper functions
        function formatRupiah(angka) {
            return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function showLoading(show) {
            const overlay = document.getElementById('loadingOverlay');
            if (show) overlay.classList.add('active');
            else overlay.classList.remove('active');
        }

        function showAlert(title, message, type) {
            const container = document.getElementById('alertContainer');
            const alert = document.createElement('div');
            alert.className = `alert alert-${type}`;
            alert.innerHTML = `<div class="alert-content"><i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i><div class="alert-message"><h4>${title}</h4><p>${message}</p></div></div>`;
            container.appendChild(alert);
            setTimeout(() => alert.remove(), 3000);
        }

        // Preview gambar
        function previewImage(input) {
            const previewContainer = document.getElementById('imagePreviewContainer');
            const previewImg = document.getElementById('imagePreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewContainer.style.display = 'block';
                    selectedFile = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                previewContainer.style.display = 'none';
                selectedFile = null;
            }
        }

        // LOAD DATA dari Database via API
        async function loadItems() {
            showLoading(true);
            try {
                const response = await fetch('/api/items', {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                if (!response.ok) throw new Error('Gagal memuat data');
                items = await response.json();
                renderTable();
            } catch (error) {
                showAlert('Error!', error.message, 'error');
                document.getElementById('tableBody').innerHTML = '<tr><td colspan="8" style="text-align:center;">Gagal memuat data</td></tr>';
            } finally {
                showLoading(false);
            }
        }

        // Render tabel
        function renderTable() {
            const tbody = document.getElementById('tableBody');
            const filteredItems = items.filter(item => 
                item.nama.toLowerCase().includes(searchTerm.toLowerCase()) ||
                item.warna.toLowerCase().includes(searchTerm.toLowerCase()) ||
                item.ukuran.toLowerCase().includes(searchTerm.toLowerCase())
            );
            
            if (filteredItems.length === 0) {
                tbody.innerHTML = '<tr><td colspan="8" style="text-align:center;">Tidak ada data kebaya</td></tr>';
                return;
            }
            
            tbody.innerHTML = filteredItems.map((item, index) => `
                <tr>
                    <td class="no-col">${index + 1}</td>
                    <td><strong>${escapeHtml(item.nama)}</strong></td>
                    <td>${escapeHtml(item.ukuran)}</td>
                    <td>${escapeHtml(item.warna)}</td>
                    <td class="harga-col">${formatRupiah(item.harga)}</td>
                    <td>${item.stok}</td>
                    <td><img src="${item.gambar}" class="product-image" alt="${escapeHtml(item.nama)}" onclick="event.stopPropagation(); openImageModal('${item.gambar}')"></td>
                    <td class="action-buttons">
                        <button class="btn-edit" onclick="editItem(${item.id})"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn-delete" onclick="confirmDelete(${item.id})"><i class="fas fa-trash"></i> Hapus</button>
                    </td>
                </tr>
            `).join('');
        }

        function escapeHtml(str) {
            if (!str) return '';
            return str.replace(/[&<>]/g, function(m) {
                if (m === '&') return '&amp;';
                if (m === '<') return '&lt;';
                if (m === '>') return '&gt;';
                return m;
            });
        }

        // Reset form modal
        function resetModalForm() {
            document.getElementById('itemId').value = '';
            document.getElementById('namaKebaya').value = '';
            document.getElementById('ukuran').value = '';
            document.getElementById('warna').value = '';
            document.getElementById('harga').value = '';
            document.getElementById('stok').value = '';
            document.getElementById('gambarFile').value = '';
            document.getElementById('imagePreviewContainer').style.display = 'none';
            document.getElementById('imagePreview').src = '';
            selectedFile = null;
        }

        // Open modal tambah
        document.getElementById('btnTambah').addEventListener('click', () => {
            resetModalForm();
            document.getElementById('modalTitle').innerText = 'Tambah Kebaya';
            document.getElementById('itemModal').classList.add('active');
        });

        // Edit item
        async function editItem(id) {
            const item = items.find(i => i.id === id);
            if (!item) return;
            
            resetModalForm();
            document.getElementById('modalTitle').innerText = 'Edit Kebaya';
            document.getElementById('itemId').value = item.id;
            document.getElementById('namaKebaya').value = item.nama;
            document.getElementById('ukuran').value = item.ukuran;
            document.getElementById('warna').value = item.warna;
            document.getElementById('harga').value = item.harga;
            document.getElementById('stok').value = item.stok;
            
            if (item.gambar && !item.gambar.includes('data:image/svg')) {
                document.getElementById('imagePreviewContainer').style.display = 'block';
                document.getElementById('imagePreview').src = item.gambar;
                selectedFile = item.gambar;
            }
            
            document.getElementById('itemModal').classList.add('active');
        }

        // Simpan item (Tambah/Edit) ke DATABASE via API
        async function simpanItem() {
            const id = document.getElementById('itemId').value;
            const nama = document.getElementById('namaKebaya').value.trim();
            const ukuran = document.getElementById('ukuran').value.trim();
            const warna = document.getElementById('warna').value.trim();
            const harga = parseInt(document.getElementById('harga').value) || 0;
            const stok = parseInt(document.getElementById('stok').value) || 0;
            
            if (!nama) {
                showAlert('Gagal!', 'Nama kebaya harus diisi!', 'error');
                return;
            }
            
            const data = { nama, ukuran, warna, harga, stok, gambar: selectedFile || '' };
            
            showLoading(true);
            try {
                let url = '/api/items';
                let method = 'POST';
                if (id) {
                    url = `/api/items/${id}`;
                    method = 'PUT';
                }
                
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify(data)
                });
                
                const result = await response.json();
                if (result.success) {
                    showAlert('Berhasil!', result.message, 'success');
                    closeModal();
                    await loadItems(); // Reload dari database
                } else {
                    showAlert('Gagal!', result.message, 'error');
                }
            } catch (error) {
                showAlert('Error!', 'Terjadi kesalahan: ' + error.message, 'error');
            } finally {
                showLoading(false);
            }
        }

        // Konfirmasi hapus
        function confirmDelete(id) {
            deleteId = id;
            document.getElementById('deleteModal').classList.add('active');
        }

        // Hapus item dari DATABASE
        async function deleteItem() {
            if (!deleteId) return;
            
            showLoading(true);
            try {
                const response = await fetch(`/api/items/${deleteId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                const result = await response.json();
                if (result.success) {
                    showAlert('Berhasil!', result.message, 'success');
                    closeDeleteModal();
                    await loadItems(); // Reload dari database
                } else {
                    showAlert('Gagal!', result.message, 'error');
                }
            } catch (error) {
                showAlert('Error!', 'Gagal menghapus: ' + error.message, 'error');
            } finally {
                showLoading(false);
                deleteId = null;
            }
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', deleteItem);
        
        // Search
        document.getElementById('searchInput').addEventListener('input', function(e) {
            searchTerm = e.target.value;
            renderTable();
        });

        // Close modals
        function closeModal() {
            document.getElementById('itemModal').classList.remove('active');
            resetModalForm();
        }
        
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('active');
        }
        
        function openImageModal(src) {
            const modal = document.getElementById('imageModal');
            document.getElementById('previewImage').src = src;
            modal.classList.add('active');
        }
        
        function closeImageModal() {
            document.getElementById('imageModal').classList.remove('active');
        }
        
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }
        
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const mobileBtn = document.querySelector('.mobile-menu-btn');
            if (window.innerWidth <= 1024 && sidebar.classList.contains('active')) {
                if (!sidebar.contains(event.target) && !mobileBtn.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
        
        // Load data saat halaman siap
        document.addEventListener('DOMContentLoaded', loadItems);
    </script>
</body>
</html>