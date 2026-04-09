<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Barang - Réa Gallery</title>

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

        /* Content Cards */
        .content-card {
            background: var(--pure-white);
            border: 1px solid var(--soft-pink-200);
            border-radius: 32px;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
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

        table thead th {
            background-color: var(--soft-pink-100);
            color: var(--soft-pink-600);
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.5rem;
        }

        tbody tr:hover {
            background-color: var(--soft-pink-50);
        }

        tbody td {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--soft-pink-100);
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

        .status-dipinjam {
            background-color: var(--soft-pink-100);
            color: var(--soft-pink-600);
        }

        .status-dikembalikan {
            background-color: #d1fae5;
            color: #065f46;
        }

        /* Buttons */
        .btn-return {
            background-color: var(--soft-pink-100);
            color: var(--soft-pink-600);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            border: none;
            cursor: pointer;
        }

        .btn-return:hover {
            background-color: var(--soft-pink-400);
            color: white;
        }

        .btn-submit {
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

        .btn-submit:hover {
            background: var(--soft-pink-500);
            transform: translateY(-2px);
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 32px;
            overflow: hidden;
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

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--soft-pink-200);
            border-radius: 16px;
            transition: all 0.3s ease;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: var(--soft-pink-400);
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 128, 128, 0.1);
        }

        /* Alert */
        .custom-alert {
            position: fixed;
            top: 1.5rem;
            right: 1.5rem;
            z-index: 1000;
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

        /* Modal Receipt Styles */
        #receiptModal .modal-content {
            max-height: 90vh;
            overflow-y: auto;
        }

        .receipt-print {
            font-family: 'Courier New', monospace;
        }

        .signature {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px dashed #ccc;
        }

        /* Print styles */
        @media print {
            .no-print {
                display: none;
            }
            #receiptModal {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: white;
                z-index: 9999;
            }
            .modal-header, .modal-footer {
                display: none;
            }
            .receipt-print {
                padding: 20px;
            }
            body * {
                visibility: hidden;
            }
            .receipt-print, .receipt-print * {
                visibility: visible;
            }
            .receipt-print {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }
        }

        .banner-pink {
            background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
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
                        <a href="{{ route('dashboard') }}" class="menu-link">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('items') }}" class="menu-link">
                            <i class="fas fa-tshirt"></i> Koleksi Kebaya
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="menu-link active">
                            <i class="fas fa-hand-holding-heart"></i> Peminjaman
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-section">
                <div class="menu-title">MANAJEMEN</div>
                <ul class="menu-items">
                    <li class="menu-item">
                        <a href="{{ route('logs') }}" class="menu-link">
                            <i class="fas fa-history"></i> Log Aktivitas
                        </a>
                    </li>
                </ul>
            </div>

            @if (auth()->user()->role === 'admin')
            <div class="menu-section">
                <div class="menu-title">ADMIN</div>
                <ul class="menu-items">
                    <li class="menu-item">
                        <a href="{{ route('users') }}" class="menu-link">
                            <i class="fas fa-users"></i> List User
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
    <div class="sm:ml-64 p-8">
        <div class="page-header p-8 mb-8">
            <div class="relative z-10">
                <div class="flex items-center gap-2 text-white mb-2 opacity-90">
                    <i class="fas fa-home text-sm"></i>
                    <span class="text-sm">Pages / Peminjaman</span>
                </div>
                <h1 class="text-3xl font-bold text-white">Peminjaman Kebaya</h1>
                <p class="text-white mt-2 opacity-90">Kelola proses peminjaman kebaya dengan mudah dan cepat</p>
            </div>
        </div>

        <!-- Banner -->
        <div class="content-card p-6 mb-8 banner-pink text-white">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
                    <i class="fas fa-crown text-3xl text-soft-pink-500"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold font-elegant">Setiap Wanita adalah Ratu</h2>
                    <p class="opacity-90">Merawat Tradisi dalam Balutan Modern. Setiap jahitan adalah cerita, setiap kebaya adalah karya.</p>
                </div>
            </div>
        </div>

        <!-- List Peminjaman Card -->
        <div class="content-card p-8 mb-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div>
                    <h2 class="section-title text-2xl font-bold mb-2">List Peminjaman</h2>
                    <p class="text-gray-500">Daftar peminjaman kebaya yang sedang berlangsung</p>
                </div>
                <div class="relative mt-4 md:mt-0">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" id="table-search" class="pl-10 pr-4 py-2 border border-soft-pink-200 rounded-full w-64 focus:outline-none focus:border-soft-pink-400" placeholder="Cari kebaya...">
                </div>
            </div>

            <div class="table-container overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($loans as $loan)
                        <tr>
                            <td class="font-medium text-soft-pink-600">{{ $loop->iteration }}</td>
                            <td class="font-medium">{{ $loan->item->name ?? 'Barang dihapus' }}</td>
                            <td>{{ $loan->amount }}</td>
                            <td>
                                @php
                                    $statusClass = '';
                                    $statusText = '';
                                    if($loan->status == 'borrowed' || $loan->status == 'dipinjam') {
                                        $statusClass = 'status-dipinjam';
                                        $statusText = 'Dipinjam';
                                    } elseif($loan->status == 'returned' || $loan->status == 'dikembalikan') {
                                        $statusClass = 'status-dikembalikan';
                                        $statusText = 'Dikembalikan';
                                    } else {
                                        $statusClass = 'status-dipinjam';
                                        $statusText = ucfirst($loan->status);
                                    }
                                @endphp
                                <span class="status-badge {{ $statusClass }}">
                                    <i class="fas {{ $loan->status == 'returned' ? 'fa-check-circle' : 'fa-clock' }}"></i>
                                    {{ $statusText }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($loan->borrow_date)->format('d M Y') }}</td>
                            <td>
                                @if($loan->return_date)
                                    {{ \Carbon\Carbon::parse($loan->return_date)->format('d M Y') }}
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td>
                                @if($loan->status == 'returned' || $loan->status == 'dikembalikan')
                                    <button onclick="viewReceipt({{ $loan->id }})" class="text-blue-600 hover:text-blue-800 text-sm">
                                        <i class="fas fa-receipt"></i> Lihat Struk
                                    </button>
                                @elseif($loan->status == 'borrowed' || $loan->status == 'dipinjam')
                                    <button onclick="openReturnModal({{ $loan->id }}, '{{ addslashes($loan->item->name ?? 'Barang') }}', {{ $loan->amount }}, {{ $loan->item->price ?? 0 }}, '{{ $loan->borrow_date }}', '{{ $loan->return_date }}')" class="btn-return">
                                        <i class="fas fa-rotate-left"></i> Kembalikan
                                    </button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-8 text-gray-500">
                                <i class="fas fa-box-open text-4xl mb-3 text-soft-pink-300"></i>
                                <p>Belum ada data peminjaman</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tambah Peminjaman Card -->
        <div class="content-card p-8">
            <h2 class="section-title text-2xl font-bold mb-2">Tambah Peminjaman</h2>
            <p class="text-gray-500 mb-6">Isi formulir berikut untuk meminjam kebaya</p>

            <form id="borrowForm" action="{{ route('items.borrow') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="item_id" class="form-label"><i class="fas fa-tshirt mr-2"></i>Nama Kebaya</label>
                        <select id="item_id" name="item_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Kebaya</option>
                            @foreach ($items as $availableItem)
                                <option value="{{ $availableItem->id }}" data-stock="{{ $availableItem->stock }}" data-price="{{ $availableItem->price ?? 0 }}">
                                    {{ $availableItem->name }} (Stok: {{ $availableItem->stock }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="amount" class="form-label"><i class="fas fa-calculator mr-2"></i>Jumlah</label>
                        <input type="number" id="amount" name="amount" class="form-input" placeholder="Jumlah yang ingin dipinjam" required min="1" />
                    </div>
                    <div>
                        <label for="user" class="form-label"><i class="fas fa-user mr-2"></i>Peminjam</label>
                        <input type="text" id="user" name="user" class="form-input" value="{{ Auth::user()->name }}" readonly />
                    </div>
                    <div>
                        <label for="borrow_date" class="form-label"><i class="fas fa-calendar mr-2"></i>Tanggal Pinjam</label>
                        <input type="date" id="borrow_date" name="borrow_date" class="form-input" value="{{ now()->format('Y-m-d') }}" required />
                    </div>
                    <div>
                        <label for="return_date" class="form-label"><i class="fas fa-calendar-return mr-2"></i>Tanggal Kembali</label>
                        <input type="date" id="return_date" name="return_date" class="form-input" value="{{ now()->addDays(7)->format('Y-m-d') }}" min="{{ now()->format('Y-m-d') }}" required />
                    </div>
                    <div class="md:col-span-2">
                        <label for="description" class="form-label"><i class="fas fa-pen mr-2"></i>Keterangan</label>
                        <textarea id="description" name="description" rows="3" class="form-textarea" placeholder="Untuk acara apa?" required></textarea>
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Submit Peminjaman
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL RETURN dengan Denda -->
    <div id="returnModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/80">
        <div class="relative p-4 w-full max-w-lg">
            <div class="bg-white rounded-2xl overflow-hidden">
                <div class="modal-header">
                    <h3 class="text-xl font-semibold flex items-center gap-2">
                        <i class="fas fa-rotate-left"></i> Pengembalian Barang & Transaksi
                    </h3>
                    <button onclick="closeReturnModal()" class="absolute top-4 right-4 text-white hover:text-gray-200 text-2xl">&times;</button>
                </div>
                <form id="returnForm" method="POST" action="">
                    @csrf
                    <div class="modal-body space-y-4">
                        <p class="text-gray-700 font-medium" id="returnMessage"></p>
                        
                        <!-- Kondisi Barang -->
                        <div>
                            <label class="form-label">Kondisi Barang</label>
                            <select name="return_condition" id="returnCondition" class="form-select" required>
                                <option value="good">✓ Baik - Tidak ada kerusakan</option>
                                <option value="light_damage">⚠ Kerusakan Ringan (Denda 25% harga)</option>
                                <option value="heavy_damage">⚠ Kerusakan Berat (Denda 75% harga)</option>
                                <option value="lost">✗ Hilang (Denda 100% harga)</option>
                            </select>
                        </div>
                        
                        <!-- Field Kerusakan -->
                        <div id="damageFields" style="display: none;">
                            <label class="form-label">Keterangan Kerusakan/Kehilangan</label>
                            <textarea name="damage_description" id="damageDescription" rows="3" class="form-textarea" placeholder="Jelaskan secara detail kondisi kerusakan atau kehilangan barang..."></textarea>
                        </div>
                        
                        <!-- Info Denda -->
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <div class="flex items-start gap-2">
                                <i class="fas fa-info-circle text-yellow-600 mt-0.5"></i>
                                <div class="text-sm text-yellow-700 w-full">
                                    <p class="font-semibold mb-2">💰 Ringkasan Denda:</p>
                                    <div id="fineDetails">
                                        <p>Keterlambatan: Rp 0</p>
                                        <p>Kerusakan/Kehilangan: Rp 0</p>
                                        <p class="font-bold mt-2 text-red-600">Total Denda: Rp 0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Metode Pembayaran -->
                        <div id="paymentMethodDiv" style="display: none;">
                            <label class="form-label">Metode Pembayaran</label>
                            <select name="payment_method" id="paymentMethod" class="form-select">
                                <option value="">Pilih Metode Pembayaran</option>
                                <option value="cash">💰 Tunai (Cash)</option>
                                <option value="transfer">🏦 Transfer Bank</option>
                            </select>
                        </div>
                        
                        <!-- Nomor Referensi Transfer -->
                        <div id="transferRefDiv" style="display: none;">
                            <label class="form-label">Nomor Referensi Transfer</label>
                            <input type="text" name="transfer_reference" id="transferReference" class="form-input" placeholder="Masukkan nomor referensi transfer">
                        </div>
                    </div>
                    <div class="modal-footer flex justify-end gap-3">
                        <button type="button" onclick="closeReturnModal()" class="px-4 py-2 border border-gray-300 rounded-full text-gray-700 hover:bg-gray-100">Batal</button>
                        <button type="submit" class="btn-submit">Proses Pengembalian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL Cetak Struk -->
    <div id="receiptModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/80">
        <div class="relative p-4 w-full max-w-md">
            <div class="bg-white rounded-2xl overflow-hidden">
                <div class="modal-header">
                    <h3 class="text-xl font-semibold flex items-center gap-2">
                        <i class="fas fa-receipt"></i> Struk Pengembalian
                    </h3>
                    <button onclick="closeReceiptModal()" class="absolute top-4 right-4 text-white hover:text-gray-200 text-2xl">&times;</button>
                </div>
                <div class="p-6 receipt-print" id="receiptContent"></div>
                <div class="modal-footer flex justify-end gap-3 no-print">
                    <button onclick="printReceipt()" class="px-5 py-2 bg-green-600 text-white rounded-full hover:bg-green-700">
                        <i class="fas fa-print"></i> Cetak Struk
                    </button>
                    <button onclick="closeReceiptModal()" class="px-4 py-2 border border-gray-300 rounded-full text-gray-700 hover:bg-gray-100">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Notifications -->
    @if (session('success'))
    <div class="custom-alert">
        <div class="flex items-center gap-3">
            <i class="fas fa-check-circle text-green-500 text-xl"></i>
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
    <div class="custom-alert" style="border-left-color: #dc2626;">
        <div class="flex items-center gap-3">
            <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
            <div>
                <p class="font-medium text-gray-900">Gagal!</p>
                <p class="text-sm text-gray-500">{{ session('error') }}</p>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    @endif

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    <script>
        let currentLoanId = null;
        let currentItemPrice = 0;
        let currentAmount = 0;
        let currentBorrowDate = null;
        let currentReturnDate = null;

        function toggleSidebar() {
            document.getElementById('logo-sidebar').classList.toggle('active');
        }

        // Format number ke Rupiah
        function formatNumber(number) {
            return new Intl.NumberFormat('id-ID').format(number);
        }

        // Hitung denda keterlambatan
        function calculateLateFee(borrowDate, returnDate) {
            const returnPlan = new Date(returnDate);
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            if (today > returnPlan) {
                const daysLate = Math.ceil((today - returnPlan) / (1000 * 60 * 60 * 24));
                return daysLate * 5000;
            }
            return 0;
        }

        // Hitung denda kerusakan
        function calculateDamageFine(condition, itemPrice, amount) {
            const totalPrice = itemPrice * amount;
            switch(condition) {
                case 'light_damage': return totalPrice * 0.25;
                case 'heavy_damage': return totalPrice * 0.75;
                case 'lost': return totalPrice;
                default: return 0;
            }
        }

        // Update tampilan denda
        function updateFineDisplay() {
            const condition = document.getElementById('returnCondition').value;
            const lateFee = calculateLateFee(currentBorrowDate, currentReturnDate);
            const damageFine = calculateDamageFine(condition, currentItemPrice, currentAmount);
            const totalFine = lateFee + damageFine;
            
            document.getElementById('fineDetails').innerHTML = `
                <p>Keterlambatan: Rp ${formatNumber(lateFee)}</p>
                <p>Kerusakan/Kehilangan: Rp ${formatNumber(damageFine)}</p>
                <p class="font-bold mt-2 text-red-600">Total Denda: Rp ${formatNumber(totalFine)}</p>
            `;
            
            const paymentMethodDiv = document.getElementById('paymentMethodDiv');
            if (totalFine > 0) {
                paymentMethodDiv.style.display = 'block';
                document.getElementById('paymentMethod').required = true;
            } else {
                paymentMethodDiv.style.display = 'none';
                document.getElementById('paymentMethod').required = false;
            }
        }

        // Buka modal return
        function openReturnModal(loanId, itemName, amount, itemPrice, borrowDate, returnDate) {
            currentLoanId = loanId;
            currentItemPrice = itemPrice;
            currentAmount = amount;
            currentBorrowDate = borrowDate;
            currentReturnDate = returnDate;
            
            document.getElementById('returnMessage').innerHTML = `Kembalikan barang <strong>${itemName}</strong> (${amount} unit)?`;
            document.getElementById('returnForm').action = `/loans/${loanId}/return`;
            document.getElementById('returnModal').classList.remove('hidden');
            document.getElementById('returnCondition').value = 'good';
            document.getElementById('damageFields').style.display = 'none';
            document.getElementById('damageDescription').value = '';
            document.getElementById('paymentMethod').value = '';
            document.getElementById('transferReference').value = '';
            document.getElementById('transferRefDiv').style.display = 'none';
            
            updateFineDisplay();
        }

        function closeReturnModal() {
            document.getElementById('returnModal').classList.add('hidden');
        }

        // Fungsi untuk melihat struk
        function viewReceipt(loanId) {
            // Tampilkan loading
            Swal.fire({
                title: 'Memuat...',
                text: 'Sedang mengambil data struk',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            fetch(`/loans/${loanId}/receipt`)
                .then(response => response.json())
                .then(data => {
                    Swal.close();
                    if (data.success) {
                        displayReceipt(data.receipt);
                        document.getElementById('receiptModal').classList.remove('hidden');
                    } else {
                        Swal.fire('Error', data.message || 'Gagal memuat struk', 'error');
                    }
                })
                .catch(error => {
                    Swal.close();
                    console.error('Error:', error);
                    Swal.fire('Error', 'Terjadi kesalahan saat memuat struk', 'error');
                });
        }

        // Tampilkan struk
        function displayReceipt(receipt) {
            const conditionBadge = getConditionBadge(receipt.condition_text);
            const paymentMethodText = receipt.payment_method === 'cash' ? '💵 Tunai (Cash)' : '🏦 Transfer Bank';
            const petugasName = document.querySelector('.user-info h4')?.innerText || 'Petugas';
            
            document.getElementById('receiptContent').innerHTML = `
                <div class="text-center" style="font-family: 'Courier New', monospace;">
                    <h2 class="text-xl font-bold">RÉA GALLERY</h2>
                    <p class="text-sm">Kebaya & Traditional Wear</p>
                    <p class="text-xs">Jl. Merdeka No. 123, Jakarta</p>
                    <p class="text-xs">Telp: (021) 1234567</p>
                    <hr class="my-3" style="border-top: 1px dashed #ccc;">
                    <h3 class="font-semibold">STRUK PENGEMBALIAN</h3>
                    <p class="text-xs">No. Transaksi: ${receipt.transaction_number}</p>
                    <p class="text-xs">Tanggal: ${receipt.date}</p>
                    <hr class="my-3" style="border-top: 1px dashed #ccc;">
                    <table class="w-full text-sm" style="width:100%;">
                        <tr><td class="text-left" style="padding: 4px 0;">Peminjam</td><td class="text-right" style="padding: 4px 0;">: ${receipt.borrower_name}</td></tr>
                        <tr><td class="text-left" style="padding: 4px 0;">Barang</td><td class="text-right" style="padding: 4px 0;">: ${receipt.item_name}</td></tr>
                        <tr><td class="text-left" style="padding: 4px 0;">Jumlah</td><td class="text-right" style="padding: 4px 0;">: ${receipt.amount} unit</td></tr>
                        <tr><td class="text-left" style="padding: 4px 0;">Tgl Pinjam</td><td class="text-right" style="padding: 4px 0;">: ${receipt.borrow_date}</td></tr>
                        <tr><td class="text-left" style="padding: 4px 0;">Tgl Kembali</td><td class="text-right" style="padding: 4px 0;">: ${receipt.return_date}</td></tr>
                        <tr><td class="text-left" style="padding: 4px 0;">Kondisi</td><td class="text-right" style="padding: 4px 0;">: ${conditionBadge}</td></tr>
                        ${receipt.damage_description ? `<tr><td class="text-left" style="padding: 4px 0;">Keterangan</td><td class="text-right" style="padding: 4px 0; font-size: 11px;">: ${receipt.damage_description}</td></tr>` : ''}
                        <tr><td colspan="2"><hr class="my-2" style="border-top: 1px dashed #ccc;"></td></tr>
                        <tr><td class="text-left" style="padding: 4px 0;">Denda Keterlambatan</td><td class="text-right" style="padding: 4px 0;">: Rp ${formatNumber(receipt.late_fee)}</td></tr>
                        <tr><td class="text-left" style="padding: 4px 0;">Denda Kerusakan/Hilang</td><td class="text-right" style="padding: 4px 0;">: Rp ${formatNumber(receipt.damage_fine)}</td></tr>
                        <tr class="font-bold"><td class="text-left" style="padding: 4px 0;">TOTAL DENDA</td><td class="text-right" style="padding: 4px 0; color: #dc2626;">: Rp ${formatNumber(receipt.total_fine)}</td></tr>
                        <tr><td colspan="2"><hr class="my-2" style="border-top: 1px solid #333;"></td></tr>
                        <tr><td class="text-left" style="padding: 4px 0;">Metode Pembayaran</td><td class="text-right" style="padding: 4px 0;">: ${paymentMethodText}</td></tr>
                        ${receipt.transfer_reference ? `<tr><td class="text-left" style="padding: 4px 0;">No. Referensi</td><td class="text-right" style="padding: 4px 0; font-size: 11px;">: ${receipt.transfer_reference}</td></tr>` : ''}
                    </table>
                    <hr class="my-3" style="border-top: 1px dashed #ccc;">
                    <p class="text-xs">Terima kasih telah mengembalikan barang</p>
                    <p class="text-xs">Barang yang dikembalikan dalam kondisi ${receipt.condition_text.toLowerCase()}</p>
                    <p class="text-xs mt-2">*** Simpan struk ini sebagai bukti ***</p>
                    <div class="signature" style="display: flex; justify-content: space-between; margin-top: 30px;">
                        <div style="text-align: center;">
                            <p>Peminjam,</p>
                            <p style="margin-top: 30px;">_________________</p>
                            <p class="text-xs">${receipt.borrower_name}</p>
                        </div>
                        <div style="text-align: center;">
                            <p>Petugas,</p>
                            <p style="margin-top: 30px;">_________________</p>
                            <p class="text-xs">${petugasName}</p>
                        </div>
                    </div>
                </div>
            `;
        }

        function getConditionBadge(condition) {
            const badges = {
                'Baik': '<span style="background:#dcfce7; color:#166534; padding:2px 8px; border-radius:12px;">✓ Baik</span>',
                'Kerusakan Ringan': '<span style="background:#fed7aa; color:#9a3412; padding:2px 8px; border-radius:12px;">⚠ Kerusakan Ringan</span>',
                'Kerusakan Berat': '<span style="background:#fecaca; color:#991b1b; padding:2px 8px; border-radius:12px;">⚠ Kerusakan Berat</span>',
                'Hilang': '<span style="background:#fee2e2; color:#991b1b; padding:2px 8px; border-radius:12px;">✗ Hilang</span>'
            };
            return badges[condition] || condition;
        }

        function closeReceiptModal() {
            document.getElementById('receiptModal').classList.add('hidden');
        }

        function printReceipt() {
            const printContent = document.getElementById('receiptContent').innerHTML;
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Struk Pengembalian - Réa Gallery</title>
                    <style>
                        * { margin: 0; padding: 0; box-sizing: border-box; }
                        body { 
                            font-family: 'Courier New', monospace; 
                            padding: 20px; 
                            background: white;
                        }
                        .receipt {
                            max-width: 380px;
                            margin: 0 auto;
                            background: white;
                        }
                        @media print {
                            body { padding: 0; }
                        }
                    </style>
                </head>
                <body>
                    <div class="receipt">
                        ${printContent}
                    </div>
                    <script>
                        window.onload = function() {
                            window.print();
                            setTimeout(function() { window.close(); }, 1000);
                        }
                    <\/script>
                </body>
                </html>
            `);
            printWindow.document.close();
        }

        // Event listeners untuk kondisi dan metode pembayaran
        document.getElementById('returnCondition')?.addEventListener('change', function() {
            const damageFields = document.getElementById('damageFields');
            if (damageFields) {
                damageFields.style.display = this.value !== 'good' ? 'block' : 'none';
            }
            updateFineDisplay();
        });

        document.getElementById('paymentMethod')?.addEventListener('change', function() {
            const transferRefDiv = document.getElementById('transferRefDiv');
            if (transferRefDiv) {
                transferRefDiv.style.display = this.value === 'transfer' ? 'block' : 'none';
            }
        });

        // Validasi stok
        document.getElementById('item_id')?.addEventListener('change', function() {
            const stock = this.options[this.selectedIndex].getAttribute('data-stock');
            const amountInput = document.getElementById('amount');
            if (amountInput) {
                amountInput.max = stock;
                amountInput.placeholder = `Maksimal ${stock} item`;
            }
        });

        // Search
        document.getElementById('table-search')?.addEventListener('keyup', function() {
            const term = this.value.toLowerCase();
            document.querySelectorAll('tbody tr').forEach(row => {
                const name = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                row.style.display = name.includes(term) ? '' : 'none';
            });
        });

        // Auto hide alerts
        setTimeout(() => {
            document.querySelectorAll('.custom-alert').forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 300);
                }, 3000);
            });
        }, 1000);
    </script>
</body>
</html>