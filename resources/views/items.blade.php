@if($errors->any())
    <div class="alert alert-error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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
    
    <style>
        /* ... (semua style sama seperti sebelumnya) ... */
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

        /* Sidebar Styles - Sama seperti sebelumnya */
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

        .header-overlay::before {
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

        .header-badge i {
            color: white;
        }

        /* Content Section */
        .content-section {
            padding: 40px 50px;
            background: #fffafa;
            position: relative;
        }

        .content-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle at top right, #ffd9d9, transparent 70%);
            opacity: 0.4;
            border-radius: 0 0 0 200px;
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
            min-width: 800px;
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

        /* Price styling */
        .price-col {
            font-weight: 600;
            color: #d96b6b;
        }

        /* Image styling */
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
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
            margin-top: 10px;
            border: 2px solid #ffd9d9;
        }

        .image-upload-area {
            border: 2px dashed #ffd9d9;
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #fffafa;
        }

        .image-upload-area:hover {
            border-color: #ff8c8c;
            background: #fff5f5;
        }

        .image-upload-area i {
            font-size: 40px;
            color: #ff8c8c;
            margin-bottom: 10px;
        }

        .image-upload-area p {
            color: #b88b9c;
            font-size: 12px;
        }

        .current-image {
            margin-top: 15px;
            text-align: center;
        }

        .current-image img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid #ffd9d9;
        }

        .current-image p {
            font-size: 12px;
            color: #b88b9c;
            margin-top: 5px;
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

        /* Price input styling */
        .price-input {
            position: relative;
        }

        .price-input::before {
            content: 'Rp';
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #b88b9c;
            font-size: 14px;
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

        /* Decorative Line */
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

        .decor-line span:nth-child(2) {
            width: 20px;
            opacity: 0.7;
        }

        .decor-line span:nth-child(3) {
            width: 10px;
            opacity: 0.5;
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

        /* Responsive */
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

            th, td {
                padding: 15px 12px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
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
            </ul>
        </div>

        <!-- MANAJEMEN Section - Hanya untuk Admin -->
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
        <!-- MANAJEMEN Section - Petugas (tanpa List User) -->
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

        <!-- User Profile -->
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
            <!-- Header Section -->
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

            <!-- Content Section -->
            <div class="content-section">
                <!-- Brand -->
                <div class="brand">
                    <div class="brand-icon">
                        <i class="fas fa-chess-queen"></i>
                    </div>
                    <span class="brand-name">Réa Gallery - Manajemen Inventaris</span>
                </div>

                <!-- Action Bar - Hanya Admin dan Petugas yang bisa tambah -->
                <div class="action-bar">
                    <div class="action-left">
                        <h2>Daftar Kebaya</h2>
                        @if(in_array(auth()->user()->role, ['admin', 'petugas']))
                        <button class="btn-tambah" onclick="openModal('addModal')">
                            <i class="fas fa-plus"></i>
                            Tambah Kebaya
                        </button>
                        @endif
                    </div>
                    <div class="search-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" id="searchInput" class="search-input" placeholder="Cari kebaya...">
                    </div>
                </div>

                <!-- Table -->
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Foto</th>
                                <th>Nama Kebaya</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                @if(in_array(auth()->user()->role, ['admin', 'petugas']))
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($items as $item)
                            <tr>
                                <td class="no-col">{{ $loop->iteration }}</td>
                                <td>
                                    @if($item->image && file_exists(public_path('images/' . $item->image)))
                                        <img src="{{ asset('images/' . $item->image) }}" 
                                             alt="{{ $item->name }}" 
                                             class="product-image"
                                             onclick="showImageModal(this.src)">
                                    @else
                                        <div style="width: 80px; height: 80px; background: #ffd9d9; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-tshirt" style="font-size: 32px; color: #ff8c8c;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $item->name }}</strong></td>
                                <td>{{ $item->description }}</td>
                                <td class="price-col">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>{{ $item->stock }} pcs</td>
                                @if(in_array(auth()->user()->role, ['admin', 'petugas']))
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-edit" onclick="openEditModal({{ $item->id }})">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </button>
                                        <button class="btn-delete" onclick="openDeleteModal({{ $item->id }})">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Decorative Line -->
                <div class="decor-line">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-plus-circle" style="color: #ff8c8c; margin-right: 10px;"></i>Tambah Kebaya Baru</h3>
                <button class="modal-close" onclick="closeModal('addModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kebaya</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Kebaya Modern" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="description" class="form-control" placeholder="Warna, bahan, ukuran" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <div class="price-input">
                            <input type="number" name="price" class="form-control"  required min="0">
                        </div>
                        <small style="color: #b88b9c; font-size: 11px;">Contoh: 250000 untuk Rp 250.000</small>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stock" class="form-control" placeholder="Jumlah tersedia" required min="0">
                    </div>
                    <div class="form-group">
                        <label>Foto Kebaya</label>
                        <div class="image-upload-area" onclick="document.getElementById('addImageInput').click()">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Klik untuk upload foto kebaya</p>
                            <p style="font-size: 10px;">Format: JPG, PNG, JPEG (Max: 2MB)</p>
                        </div>
                        <input type="file" name="image" id="addImageInput" class="form-control" style="display: none;" accept="image/*" onchange="previewImage(this, 'addImagePreview')">
                        <div id="addImagePreview" class="current-image" style="display: none;">
                            <img id="addPreviewImg" src="" alt="Preview">
                            <p>Preview Foto</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-batal" onclick="closeModal('addModal')">Batal</button>
                    <button type="submit" class="btn-simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    @foreach ($items as $item)
    <div id="editModal-{{ $item->id }}" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-edit" style="color: #ff8c8c; margin-right: 10px;"></i>Edit Kebaya</h3>
                <button class="modal-close" onclick="closeModal('editModal-{{ $item->id }}')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kebaya</label>
                        <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="description" class="form-control" value="{{ $item->description }}" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <div class="price-input">
                            <input type="number" name="price" class="form-control" value="{{ $item->price }}" required min="0">
                        </div>
                        <small style="color: #b88b9c; font-size: 11px;">Harga saat ini: Rp {{ number_format($item->price, 0, ',', '.') }}</small>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stock" class="form-control" value="{{ $item->stock }}" required min="0">
                    </div>
                    <div class="form-group">
                        <label>Foto Kebaya Saat Ini</label>
                        @if($item->image && file_exists(public_path('images/' . $item->image)))
                            <div class="current-image">
                                <img src="{{ asset('images/' . $item->image) }}" alt="Current Image">
                                <p>Foto saat ini</p>
                            </div>
                        @else
                            <div class="current-image">
                                <div style="width: 100px; height: 100px; background: #ffd9d9; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="fas fa-tshirt" style="font-size: 48px; color: #ff8c8c;"></i>
                                </div>
                                <p>Belum ada foto</p>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Ganti Foto (Opsional)</label>
                        <div class="image-upload-area" onclick="document.getElementById('editImageInput-{{ $item->id }}').click()">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Klik untuk upload foto baru</p>
                            <p style="font-size: 10px;">Format: JPG, PNG, JPEG (Max: 2MB)</p>
                        </div>
                        <input type="file" name="image" id="editImageInput-{{ $item->id }}" class="form-control" style="display: none;" accept="image/*" onchange="previewImage(this, 'editImagePreview-{{ $item->id }}')">
                        <div id="editImagePreview-{{ $item->id }}" class="current-image" style="display: none;">
                            <img id="editPreviewImg-{{ $item->id }}" src="" alt="Preview">
                            <p>Preview Foto Baru</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-batal" onclick="closeModal('editModal-{{ $item->id }}')">Batal</button>
                    <button type="submit" class="btn-simpan">Update</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    <!-- Modal Delete -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="action-modal-content">
                <div class="action-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h3 style="font-family: 'Playfair Display'; margin-bottom: 10px; color: #d96b6b;">Hapus Kebaya</h3>
                <p style="color: #a15a5a; margin-bottom: 20px;">Apakah Anda yakin ingin menghapus kebaya ini? Tindakan ini tidak dapat dibatalkan.</p>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="action-buttons-modal">
                        <button type="button" class="btn-batal" onclick="closeModal('deleteModal')">Batal</button>
                        <button type="submit" class="btn-simpan" style="background: #ff6666;">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Image Modal for Fullscreen View -->
    <div id="imageModal" class="image-modal" onclick="closeImageModal()">
        <img id="modalImage" src="" alt="Full Size Image">
    </div>

    <!-- Alert -->
    @if (session('success'))
    <div class="alert alert-success" id="successAlert">
        <div class="alert-content">
            <i class="fas fa-check-circle"></i>
            <div class="alert-message">
                <h4>Berhasil</h4>
                <p>{{ session('success') }}</p>
            </div>
            <button style="background: none; border: none; color: #ff8c8c; cursor: pointer; font-size: 14px; margin-left: auto;" onclick="this.parentElement.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-error" id="errorAlert">
        <div class="alert-content">
            <i class="fas fa-exclamation-circle"></i>
            <div class="alert-message">
                <h4>Gagal</h4>
                <p>{{ session('error') }}</p>
            </div>
            <button style="background: none; border: none; color: #ff6666; cursor: pointer; font-size: 14px; margin-left: auto;" onclick="this.parentElement.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    @endif

    <!-- JavaScript -->
    <script>
        // Sidebar toggle for mobile
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const mobileBtn = document.querySelector('.mobile-menu-btn');
            
            if (window.innerWidth <= 1024) {
                if (!sidebar.contains(event.target) && !mobileBtn.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });

        // Modal functions
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        function openEditModal(itemId) {
            openModal('editModal-' + itemId);
        }

        function openDeleteModal(itemId) {
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = "{{ url('items') }}/" + itemId;
            openModal('deleteModal');
        }

        // Image preview function
        function previewImage(input, previewId) {
            const previewDiv = document.getElementById(previewId);
            const previewImg = previewDiv.querySelector('img');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewDiv.style.display = 'block';
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Show full image modal
        function showImageModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            modalImg.src = imageSrc;
            modal.classList.add('active');
        }

        // Close image modal
        function closeImageModal() {
            document.getElementById('imageModal').classList.remove('active');
        }

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('tableBody');
        const rows = tableBody.getElementsByTagName('tr');

        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                const searchTerm = searchInput.value.toLowerCase();
                
                Array.from(rows).forEach(row => {
                    const productName = row.cells[2]?.textContent.toLowerCase() || '';
                    if (productName.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }

        // Auto-hide alerts
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.animation = 'slideIn 0.3s ease reverse';
                setTimeout(() => alert.remove(), 300);
            });
        }, 4000);

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.classList.remove('active');
            }
        }
    </script>
</body>
</html>