@extends('layouts.app')

@section('title', 'Transaksi - Réa Gallery')

@section('content')
<style>
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
        color: var(--dark-gray);
    }

    /* Badges */
    .badge-good {
        background-color: #d1fae5;
        color: #065f46;
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }

    .badge-damaged {
        background-color: #fed7aa;
        color: #9a3412;
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }

    .badge-lost {
        background-color: #fee2e2;
        color: #991b1b;
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }

    .status-paid {
        background-color: #d1fae5;
        color: #065f46;
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }

    .status-pending {
        background-color: #fed7aa;
        color: #9a3412;
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }

    .status-waived {
        background-color: #f3f4f6;
        color: #6b7280;
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }

    /* Buttons */
    .btn-print {
        background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }

    .btn-print:hover {
        background: var(--soft-pink-500);
        transform: translateY(-2px);
        color: white;
        text-decoration: none;
    }

    .btn-pay-fine {
        background: linear-gradient(135deg, #f97316, #ea580c);
        color: white;
        padding: 0.4rem 0.8rem;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: none;
        cursor: pointer;
        width: 100%;
        justify-content: center;
    }

    .btn-pay-fine:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(249, 115, 22, 0.3);
    }

    .price-text {
        color: var(--soft-pink-600);
        font-weight: 600;
    }

    .total-fine {
        color: #dc2626;
        font-weight: bold;
    }

    /* Banner */
    .banner-pink {
        background: linear-gradient(135deg, #ffb3b3, #ff8c8c);
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

    @media (max-width: 768px) {
        table thead th,
        tbody td {
            padding: 0.75rem 1rem;
            font-size: 0.7rem;
        }
        
        .btn-print, .btn-pay-fine {
            padding: 0.25rem 0.5rem;
            font-size: 0.65rem;
        }
        
        .content-card {
            padding: 1rem;
        }
    }
</style>

<div class="sm:ml-64 p-8">
    <!-- Page Header -->
    <div class="page-header p-8 mb-8">
        <div class="relative z-10">
            <div class="flex items-center gap-2 text-white mb-2 opacity-90">
                <i class="fas fa-history text-sm"></i>
                <span class="text-sm">Pages / Transaksi</span>
            </div>
            <h1 class="text-3xl font-bold text-white">Riwayat Transaksi</h1>
            <p class="text-white mt-2 opacity-90">Kelola dan pantau semua transaksi peminjaman kebaya</p>
        </div>
    </div>

    <!-- Banner -->
    <div class="content-card p-6 mb-8 banner-pink text-white">
        <div class="flex items-center gap-4">
            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
                <i class="fas fa-receipt text-3xl text-soft-pink-500"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold font-elegant">Setiap Transaksi Tercatat</h2>
                <p class="opacity-90">Semua peminjaman kebaya tercatat dengan rapi untuk kenyamanan Anda.</p>
            </div>
        </div>
    </div>

    <!-- Tabel Transaksi Card -->
    <div class="content-card p-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div>
                <h2 class="section-title text-2xl font-bold mb-2">Semua Transaksi</h2>
                <p class="text-gray-500">Daftar lengkap transaksi peminjaman kebaya</p>
            </div>
            <div class="relative mt-4 md:mt-0">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" id="table-search" class="pl-10 pr-4 py-2 border border-soft-pink-200 rounded-full w-64 focus:outline-none focus:border-soft-pink-400" placeholder="Cari transaksi...">
            </div>
        </div>

        <div class="table-container overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Barang</th>
                        <th>Harga/Hari</th>
                        <th>Peminjam</th>
                        <th class="hidden md:table-cell">Tgl Pinjam</th>
                        <th class="hidden lg:table-cell">Tgl Kembali</th>
                        <th>Lama Sewa</th>
                        <th>Kondisi</th>
                        <th>Total Denda</th>
                        <th class="hidden xl:table-cell">Status Denda</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($loans as $loan)
                    @php
                        $borrowDate = \Carbon\Carbon::parse($loan->borrow_date);
                        
                        if($loan->returned_at) {
                            $actualReturnDate = \Carbon\Carbon::parse($loan->returned_at);
                            $daysRaw = $borrowDate->diffInDays($actualReturnDate);
                            $days = max(1, round($daysRaw));
                            $displayReturnDate = $actualReturnDate->format('d M Y');
                        } else {
                            $actualReturnDate = \Carbon\Carbon::parse($loan->return_date);
                            $daysRaw = $borrowDate->diffInDays($actualReturnDate);
                            $days = max(1, round($daysRaw));
                            $displayReturnDate = $actualReturnDate->format('d M Y') . ' (Jatuh Tempo)';
                        }
                        
                        $harga_per_hari = intval($loan->item->harga_sewa_perhari ?? $loan->item->price ?? 0);
                        $total_sewa = $harga_per_hari * $days;
                        
                        $finesCollection = $loan->fines ?? collect();
                        $totalFineFromFines = $finesCollection->sum('amount');
                        $pendingFines = $finesCollection->where('status', 'pending');
                        $hasPending = $pendingFines->count() > 0;
                        $hasPaid = $finesCollection->where('status', 'paid')->count() > 0;
                        $hasWaived = $finesCollection->where('status', 'waived')->count() > 0;
                        
                        $conditionFineAmount = 0;
                        $conditionFineType = null;
                        $hasConditionFineInFines = false;
                        
                        foreach($finesCollection as $fine) {
                            if(in_array($fine->fine_type, ['damage', 'lost'])) {
                                $hasConditionFineInFines = true;
                            }
                        }
                        
                        if(($loan->return_condition == 'damaged' || $loan->return_condition == 'rusak') && !$hasConditionFineInFines) {
                            $conditionFineAmount = 50000 * $days;
                            $conditionFineType = 'damage';
                        } elseif(($loan->return_condition == 'lost') && !$hasConditionFineInFines) {
                            $conditionFineAmount = 100000000;
                            $conditionFineType = 'lost';
                        }
                        
                        $totalFine = $totalFineFromFines + $conditionFineAmount;
                        $displayFineAmount = 'Rp ' . number_format($totalFine, 0, ',', '.');
                        
                        $conditionBadge = '';
                        $conditionIcon = '';
                        $conditionText = '';
                        if($loan->return_condition == 'good' || $loan->return_condition == 'baik') {
                            $conditionBadge = 'badge-good';
                            $conditionIcon = '✓';
                            $conditionText = 'Baik';
                        } elseif($loan->return_condition == 'damaged' || $loan->return_condition == 'rusak') {
                            $conditionBadge = 'badge-damaged';
                            $conditionIcon = '⚠';
                            $conditionText = 'Rusak';
                        } elseif($loan->return_condition == 'lost') {
                            $conditionBadge = 'badge-lost';
                            $conditionIcon = '✗';
                            $conditionText = 'Hilang';
                        } else {
                            $conditionText = '-';
                        }
                    @endphp
                    <tr>
                        <td class="font-medium text-soft-pink-600">{{ $loop->iteration + ($loans->currentPage() - 1) * $loans->perPage() }}</td>
                        <td class="font-mono text-sm text-soft-pink-600">#{{ str_pad($loan->id, 6, '0', STR_PAD_LEFT) }}</td>
                        <td class="font-medium">{{ $loan->item->name ?? 'Barang dihapus' }}</td>
                        <td class="price-text">Rp {{ number_format($harga_per_hari, 0, ',', '.') }}</td>
                        <td>{{ $loan->user->name ?? 'User dihapus' }}</td>
                        <td class="hidden md:table-cell">{{ \Carbon\Carbon::parse($loan->borrow_date)->format('d M Y') }}</td>
                        <td class="hidden lg:table-cell">{{ $displayReturnDate }}</td>
                        <td>
                            <div class="font-semibold text-soft-pink-600">{{ $days }} hari</div>
                            <div class="text-xs text-gray-500">Rp {{ number_format($total_sewa, 0, ',', '.') }}</div>
                        </td>
                        <td>
                            <span class="{{ $conditionBadge }}">
                                <i class="fas {{ $loan->return_condition == 'good' ? 'fa-check-circle' : ($loan->return_condition == 'lost' ? 'fa-times-circle' : 'fa-exclamation-triangle') }}"></i>
                                {{ $conditionText }}
                            </span>
                        </td>
                        <td>
                            @if($totalFine > 0)
                                <span class="total-fine">{{ $displayFineAmount }}</span>
                            @else
                                <span class="text-green-600">✓ Tidak ada denda</span>
                            @endif
                        </td>
                        <td class="hidden xl:table-cell">
                            @if($hasPending || $conditionFineAmount > 0)
                                <span class="status-pending"><i class="fas fa-clock"></i> Menunggu</span>
                            @elseif($hasPaid)
                                <span class="status-paid"><i class="fas fa-check-circle"></i> Lunas</span>
                            @elseif($hasWaived)
                                <span class="status-waived"><i class="fas fa-ban"></i> Dihapus</span>
                            @else
                                <span class="status-paid"><i class="fas fa-check-circle"></i> Selesai</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex flex-col gap-2">
                                <a href="{{ route('transactions.receipt', $loan->id) }}" class="btn-print">
                                    <i class="fas fa-print"></i> Cetak
                                </a>
                                @foreach($pendingFines as $fine)
                                    @if(auth()->user()->role == 'admin' || auth()->user()->id == $loan->user_id)
                                    <form action="{{ route('fines.pay', $fine->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-pay-fine" 
                                                onclick="return confirm('Bayar denda Rp {{ number_format($fine->amount, 0, ',', '.') }}?')">
                                            <i class="fas fa-money-bill-wave"></i> Bayar
                                        </button>
                                    </form>
                                    @endif
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="12" class="text-center py-12 text-gray-500">
                            <i class="fas fa-receipt text-5xl mb-3 text-soft-pink-300"></i>
                            <p class="text-lg">Belum ada transaksi</p>
                            <p class="text-sm">Belum ada transaksi peminjaman kebaya</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $loans->links() }}
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

<script>
    // Search functionality
    document.getElementById('table-search')?.addEventListener('keyup', function() {
        const term = this.value.toLowerCase();
        document.querySelectorAll('tbody tr').forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(term) ? '' : 'none';
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
@endsection