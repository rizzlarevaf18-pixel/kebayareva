@extends('layouts.app')

@section('title', 'Struk Transaksi - Lentora')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <!-- Struk Card -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden" id="struk-content">
            <div class="p-6">
                <!-- Header -->
                <div class="text-center border-b pb-4">
                    <h1 class="text-2xl font-bold text-gray-800">LENTORA</h1>
                    <p class="text-sm text-gray-600">Sistem Peminjaman Barang</p>
                    <p class="text-xs text-gray-500">Jl. Contoh No. 123, Kota Contoh</p>
                    <p class="text-xs text-gray-500">Telp: (021) 1234567</p>
                </div>
                
                <!-- Info Transaksi -->
                <div class="mt-4 space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="font-semibold text-gray-700">No. Invoice:</span>
                        <span class="text-gray-900">{{ $transaction->invoice_number ?? '#' . str_pad($transaction->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold text-gray-700">Tanggal:</span>
                        <span class="text-gray-900">{{ \Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y H:i:s') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold text-gray-700">Kasir:</span>
                        <span class="text-gray-900">{{ $transaction->user->name ?? 'Admin' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold text-gray-700">Pelanggan:</span>
                        <span class="text-gray-900">{{ $transaction->customer_name ?? 'Umum' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold text-gray-700">Metode Bayar:</span>
                        <span class="text-gray-900 uppercase">{{ $transaction->payment_method }}</span>
                    </div>
                </div>
                
                <!-- Detail Items -->
                <div class="mt-4 border-t border-b py-3">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b text-gray-700">
                                <th class="text-left py-2">Nama Barang</th>
                                <th class="text-center py-2">Qty</th>
                                <th class="text-right py-2">Harga</th>
                                <th class="text-right py-2">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaction->details as $detail)
                            <tr class="text-gray-800">
                                <td class="py-1">{{ $detail->item->name ?? 'Barang dihapus' }}</td>
                                <td class="text-center py-1">{{ $detail->quantity }}</td>
                                <td class="text-right py-1">Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                                <td class="text-right py-1">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Total -->
                <div class="mt-4 space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-700">Total</span>
                        <span class="text-gray-900">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-700">Dibayar</span>
                        <span class="text-green-600 font-semibold">Rp {{ number_format($transaction->paid_amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-700">Kembalian</span>
                        <span class="text-blue-600 font-semibold">Rp {{ number_format($transaction->change_amount, 0, ',', '.') }}</span>
                    </div>
                </div>
                
                <!-- Grand Total -->
                <div class="mt-4 pt-3 border-t-2 border-gray-300">
                    <div class="flex justify-between text-lg font-bold">
                        <span class="text-gray-800">GRAND TOTAL</span>
                        <span class="text-purple-600">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</span>
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="mt-6 text-center text-xs text-gray-500 border-t pt-4">
                    <p>Terima kasih telah berbelanja di Lentora</p>
                    <p>Barang yang sudah dibeli tidak dapat dikembalikan</p>
                    <p class="mt-2">Simpan struk ini sebagai bukti pembayaran</p>
                    <p class="mt-2 text-gray-400">=== Lentora ===</p>
                </div>
            </div>
        </div>
        
        <!-- Tombol Aksi -->
        <div class="mt-6 flex gap-3 justify-center">
            <button onclick="printStruk()" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                </svg>
                Cetak Struk
            </button>
            <a href="{{ route('transactions') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </button>
        </div>
    </div>
</div>

<style media="print">
    body {
        background: white;
        margin: 0;
        padding: 0;
    }
    
    .container {
        padding: 0;
        margin: 0;
        max-width: 100%;
    }
    
    .btn-print, .bg-gray-500, .bg-green-500, .mt-6 {
        display: none !important;
    }
    
    .bg-white {
        box-shadow: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }
    
    @page {
        margin: 1cm;
        size: auto;
    }
</style>

<script>
    function printStruk() {
        window.print();
    }
    
    // Auto print jika ingin langsung cetak (opsional)
    // setTimeout(function() {
    //     window.print();
    // }, 500);
</script>
@endsection