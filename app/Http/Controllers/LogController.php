<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    /**
     * Menampilkan daftar log aktivitas
     */
    public function index()
    {
        // Ambil semua log dengan relasi user dan item, diurutkan dari terbaru
        $logs = Log::with(['user', 'item'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        return view('log', compact('logs'));
    }

    /**
     * Menyimpan log aktivitas baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'action' => 'required|string|max:255',
            'item_id' => 'nullable|exists:items,id',
            'amount' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $log = Log::create([
            'user_id' => auth()->id(),
            'item_id' => $request->item_id,
            'action' => $request->action,
            'amount' => $request->amount,
            'description' => $request->description,
            'ip_address' => $request->ip(),
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'log' => $log]);
        }

        return back()->with('success', 'Log aktivitas berhasil dicatat.');
    }

    /**
     * Menghapus log aktivitas
     */
    public function destroy($id)
    {
        try {
            $log = Log::findOrFail($id);
            $log->delete();

            return redirect()->route('logs')->with('success', 'Log berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('logs')->with('error', 'Terjadi kesalahan saat menghapus log.');
        }
    }

    /**
     * Handle method untuk kompatibilitas (GET dan DELETE)
     */
    public function handle(Request $request, $logId = null)
    {
        // Method GET - menampilkan logs
        if ($request->isMethod('get')) {
            $logs = Log::with(['user', 'item'])
                ->orderBy('created_at', 'desc')
                ->paginate(15);
            
            return view('log', compact('logs'));
        }

        // Method DELETE - menghapus log
        if ($request->isMethod('delete') && $logId) {
            try {
                $log = Log::findOrFail($logId);
                $log->delete();
                return redirect()->route('logs')->with('success', 'Log berhasil dihapus.');
            } catch (\Exception $e) {
                return redirect()->route('logs')->with('error', 'Terjadi kesalahan saat menghapus log.');
            }
        }

        return redirect()->route('logs')->with('error', 'Aksi tidak diizinkan.');
    }
}