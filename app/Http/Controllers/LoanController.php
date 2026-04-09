<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use App\Models\Log;
use App\Models\Fine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoanController extends Controller
{
    /**
     * Menampilkan halaman peminjaman
     */
    public function loans($userId = null)
    {
        $userId = $userId ?? Auth::id();

        // Ambil semua barang yang tersedia (stok > 0)
        $items = Item::where('stock', '>', 0)->get();

        // Ambil pinjaman berdasarkan role
        if (Auth::user()->role === 'admin') {
            $loans = Loan::with('item', 'user')->orderBy('created_at', 'desc')->get();
        } else {
            $loans = Loan::with('item')->where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        }

        return view('pinjamBarang', compact('items', 'loans'));
    }

    /**
     * Proses peminjaman barang
     */
    public function borrow(Request $request)
    {
        // Validasi input
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'user' => 'required|string',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:borrow_date',
            'description' => 'required|string',
            'amount' => 'required|integer|min:1',
        ]);

        // Ambil data barang yang dipilih
        $item = Item::findOrFail($request->item_id);

        // Pastikan ada cukup stok barang
        if ($item->stock < $request->amount) {
            return back()->with('error', 'Stok barang tidak mencukupi');
        }

        // Kurangi stok barang
        $item->decrement('stock', $request->amount);

        // Simpan data peminjaman ke tabel loans
        $loan = Loan::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
            'description' => $request->description,
            'amount' => $request->amount,
            'status' => 'borrowed',
        ]);

        // Catat log peminjaman
        Log::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'action' => 'borrow',
            'amount' => $request->amount,
            'description' => 'Peminjaman ' . $item->name . ' sebanyak ' . $request->amount . ' unit',
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('pinjamBarang')->with('success', 'Peminjaman berhasil!');
    }

    /**
     * Proses pengembalian barang dengan perhitungan denda
     */
    public function returnLoan(Request $request, $id)
    {
        try {
            $loan = Loan::with('item')->findOrFail($id);

            // Cek jika sudah dikembalikan
            if ($loan->status === 'returned') {
                return back()->with('error', 'Barang sudah dikembalikan');
            }

            $item = $loan->item;

            if (!$item) {
                return back()->with('error', 'Barang tidak ditemukan');
            }

            $amount = $loan->amount;
            $itemPrice = $item->price ?? 0;

            // ========== HITUNG DENDA KETERLAMBATAN ==========
            $returnPlanDate = Carbon::parse($loan->return_date);
            $today = Carbon::now();
            $lateFee = 0;

            if ($today > $returnPlanDate) {
                $daysLate = $returnPlanDate->diffInDays($today);
                $lateFee = $daysLate * 5000; // Rp 5.000 per hari
                
                // Simpan denda keterlambatan ke tabel fines
                if ($lateFee > 0) {
                    Fine::create([
                        'loan_id' => $loan->id,
                        'fine_type' => 'late',
                        'amount' => $lateFee,
                        'status' => 'pending',
                        'description' => "Terlambat {$daysLate} hari",
                    ]);
                }
            }

            // ========== HITUNG DENDA KERUSAKAN ==========
            $totalItemPrice = $itemPrice * $amount;
            $damageFine = 0;
            $returnCondition = $request->return_condition ?? 'good';
            $damageDescription = $request->damage_description ?? null;
            $fineType = null;

            switch ($returnCondition) {
                case 'light_damage':
                    $damageFine = $totalItemPrice * 0.25;
                    $fineType = 'damage';
                    break;
                case 'heavy_damage':
                    $damageFine = $totalItemPrice * 0.75;
                    $fineType = 'damage';
                    break;
                case 'lost':
                    $damageFine = $totalItemPrice;
                    $fineType = 'lost';
                    break;
                default:
                    $damageFine = 0;
            }

            // Simpan denda kerusakan/kehilangan ke tabel fines
            if ($damageFine > 0 && $fineType) {
                Fine::create([
                    'loan_id' => $loan->id,
                    'fine_type' => $fineType,
                    'amount' => $damageFine,
                    'status' => 'pending',
                    'description' => $damageDescription ?? ($fineType == 'lost' ? 'Barang hilang' : 'Barang mengalami kerusakan'),
                ]);
            }

            $totalFine = $lateFee + $damageFine;

            // Update loan dengan data pengembalian
            $loan->status = 'returned';
            $loan->actual_return_date = now();
            $loan->return_condition = $returnCondition;
            $loan->damage_description = $damageDescription;
            $loan->late_fee = $lateFee;
            $loan->damage_fine = $damageFine;
            $loan->total_fine = $totalFine;
            $loan->payment_method = $request->payment_method;
            $loan->transfer_reference = $request->transfer_reference;
            $loan->transaction_number = 'TRX-' . time() . '-' . $loan->id;
            $loan->receipt_url = '/receipts/' . $loan->transaction_number;
            $loan->save();

            // Kembalikan stok (kecuali jika hilang)
            if ($returnCondition !== 'lost') {
                $item->increment('stock', $amount);
            }

            // Catat log pengembalian
            Log::create([
                'user_id' => Auth::id(),
                'item_id' => $item->id,
                'amount' => $amount,
                'action' => 'return',
                'description' => "Pengembalian barang. Total denda: Rp " . number_format($totalFine, 0, ',', '.'),
                'ip_address' => $request->ip(),
            ]);

            return redirect()->route('pinjamBarang')->with('success', 'Barang berhasil dikembalikan. Total denda: Rp ' . number_format($totalFine, 0, ',', '.'));
            
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Ambil data struk pengembalian
     */
    public function getReceipt($id)
    {
        try {
            $loan = Loan::with('item', 'user', 'fines')->findOrFail($id);

            // Mapping kondisi ke teks
            $conditionText = '';
            switch ($loan->return_condition) {
                case 'good':
                    $conditionText = 'Baik';
                    break;
                case 'light_damage':
                    $conditionText = 'Kerusakan Ringan';
                    break;
                case 'heavy_damage':
                    $conditionText = 'Kerusakan Berat';
                    break;
                case 'lost':
                    $conditionText = 'Hilang';
                    break;
                default:
                    $conditionText = '-';
            }

            // Generate transaction number jika belum ada
            if (!$loan->transaction_number) {
                $loan->transaction_number = 'TRX-' . time() . '-' . $loan->id;
                $loan->save();
            }

            // Ambil daftar denda dari tabel fines
            $finesList = [];
            foreach ($loan->fines as $fine) {
                $typeText = '';
                switch ($fine->fine_type) {
                    case 'late': $typeText = 'Denda Keterlambatan'; break;
                    case 'damage': $typeText = 'Denda Kerusakan'; break;
                    case 'lost': $typeText = 'Denda Kehilangan'; break;
                    default: $typeText = ucfirst($fine->fine_type);
                }
                
                $finesList[] = [
                    'type' => $fine->fine_type,
                    'type_text' => $typeText,
                    'amount' => (float) $fine->amount,
                    'status' => $fine->status,
                    'description' => $fine->description,
                ];
            }

            return response()->json([
                'success' => true,
                'receipt' => [
                    'transaction_number' => $loan->transaction_number,
                    'date' => Carbon::parse($loan->actual_return_date ?? $loan->updated_at)->format('d/m/Y H:i'),
                    'borrower_name' => $loan->user->name ?? 'User tidak ditemukan',
                    'item_name' => $loan->item->name ?? 'Barang tidak ditemukan',
                    'amount' => $loan->amount,
                    'borrow_date' => Carbon::parse($loan->borrow_date)->format('d/m/Y'),
                    'return_date' => Carbon::parse($loan->return_date)->format('d/m/Y'),
                    'condition_text' => $conditionText,
                    'damage_description' => $loan->damage_description ?? '-',
                    'late_fee' => (float) ($loan->late_fee ?? 0),
                    'damage_fine' => (float) ($loan->damage_fine ?? 0),
                    'total_fine' => (float) ($loan->total_fine ?? 0),
                    'payment_method' => $loan->payment_method ?? 'cash',
                    'transfer_reference' => $loan->transfer_reference ?? null,
                    'fines_list' => $finesList,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat struk: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Approve peminjaman (jika diperlukan)
     */
    public function approve($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = 'approved';
        $loan->save();

        return back()->with('success', 'Peminjaman disetujui');
    }

    /**
     * Reject peminjaman (jika diperlukan)
     */
    public function reject($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = 'rejected';
        $loan->save();

        // Kembalikan stok jika sudah dikurangi
        if ($loan->item) {
            $loan->item->increment('stock', $loan->amount);
        }

        return back()->with('success', 'Peminjaman ditolak');
    }

    /**
     * Ambil barang oleh peminjam
     */
    public function take($id)
    {
        $loan = Loan::findOrFail($id);
        
        if ($loan->status !== 'approved') {
            return back()->with('error', 'Peminjaman belum disetujui');
        }
        
        $loan->status = 'borrowed';
        $loan->save();

        return back()->with('success', 'Barang berhasil diambil');
    }

}
