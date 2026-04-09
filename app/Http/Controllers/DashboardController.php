<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Pastikan pengguna sudah login
        if (Auth::check()) {
            $user = Auth::user();
            $userRole = $user->role;
            
            // Data untuk semua role
            $items = Item::all();
            
            if ($userRole === 'admin') {
                // Admin: Lihat semua data peminjaman
                $borrowItems = Loan::where('status', 'borrowed')->count();
                $returnItems = Loan::where('status', 'returned')->count();
                
            } elseif ($userRole === 'petugas') {
                // Petugas: Lihat semua data peminjaman (sama seperti admin untuk statistik)
                $borrowItems = Loan::where('status', 'borrowed')->count();
                $returnItems = Loan::where('status', 'returned')->count();
                
            } else {
                // User: Hanya lihat peminjaman mereka sendiri
                $borrowItems = Loan::where('user_id', $user->id)->where('status', 'borrowed')->count();
                $returnItems = Loan::where('user_id', $user->id)->where('status', 'returned')->count();
            }
            
            return view('dashboard', compact('userRole', 'items', 'borrowItems', 'returnItems'));
        }

        return redirect()->route('login')->withErrors(['error' => 'Anda harus login untuk mengakses halaman ini.']);
    }


    public function dashboardData(Request $request)
    {
        $user = $request->user();

        // Admin dashboard data
        if ($user->hasRole('Admin')) {
            return response()->json([
                'total_item' => Item::count(),
                'item_dipinjam' => Loan::where('status', 'borrowed')->count(),
                'item_dikembalikan' => Loan::where('status', 'returned')->count(),
            ]);
        }

        // Non-admin (user) dashboard data
        return response()->json([
            'item_dipinjam' => Loan::where('user_id', $user->id)->where('status', 'borrowed')->count(),
            'item_dikembalikan' => Loan::where('user_id', $user->id)->where('status', 'returned')->count(),
        ]);
    }

    public function allItems(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->withErrors(['error' => 'Anda harus login untuk mengakses halaman ini.']);
        }

        $user = Auth::user();
        $search = $request->input('search');
        
        // Query untuk items
        $query = Item::query();
        
        // Jika ada pencarian
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }
        
        // Untuk user, hanya tampilkan item yang tersedia
        if ($user->role === 'user') {
            $query->where(function ($q) {
                $q->where('quantity', '>', 0)
                  ->orWhere('stock', '>', 0)
                  ->orWhere('is_available', true);
            });
        }
        
        $items = $query->paginate(10);

        return view('items.index', compact('items', 'search'));
    }
}