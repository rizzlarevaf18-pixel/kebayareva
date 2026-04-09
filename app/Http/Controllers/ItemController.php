<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Menampilkan daftar barang (index)
     */
    public function index()
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        
        // Cek apakah user memiliki akses (admin atau petugas)
        $userRole = Auth::user()->role;
        if (!in_array($userRole, ['admin', 'petugas'])) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini!');
        }
        
        $items = Item::all();
        return view('items', compact('items'));
    }

    /**
     * Menampilkan form tambah barang
     */
    public function create()
    {
        // Cek akses
        if (!in_array(Auth::user()->role, ['admin', 'petugas'])) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses!');
        }
        
        return view('items-create');
    }

    /**
     * Menyimpan barang baru (store)
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:1',
            'price' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only(['name', 'description', 'stock', 'price']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            if (!file_exists(public_path('images'))) {
                mkdir(public_path('images'), 0755, true);
            }
            
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $item = Item::create($data);
        
        // Catat log
        Log::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'action' => 'create',
            'description' => 'Menambahkan item: ' . $item->name,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('items')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit barang
     */
    public function edit($id)
    {
        // Cek akses
        if (!in_array(Auth::user()->role, ['admin', 'petugas'])) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses!');
        }
        
        $item = Item::findOrFail($id);
        return view('items-edit', compact('item'));
    }

    /**
     * Mengupdate barang (update)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:1',
            'price' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $item = Item::findOrFail($id);
        $data = $request->only(['name', 'description', 'stock', 'price']);

        // Handle image upload jika ada file baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($item->image && file_exists(public_path('images/' . $item->image))) {
                unlink(public_path('images/' . $item->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            if (!file_exists(public_path('images'))) {
                mkdir(public_path('images'), 0755, true);
            }
            
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $item->update($data);
        
        // Catat log
        Log::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'action' => 'update',
            'description' => 'Mengupdate item: ' . $item->name,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('items')->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Menghapus barang (destroy)
     */
    public function destroy($id)
    {
        try {
            $item = Item::findOrFail($id);
            
            // Hapus file gambar jika ada
            if ($item->image && file_exists(public_path('images/' . $item->image))) {
                unlink(public_path('images/' . $item->image));
            }
            
            // Catat log sebelum hapus
            Log::create([
                'user_id' => Auth::id(),
                'item_id' => $id,
                'action' => 'delete',
                'description' => 'Menghapus item: ' . $item->name,
                'ip_address' => request()->ip(),
            ]);

            $item->delete();
            return redirect()->route('items')->with('success', 'Barang berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus barang: ' . $e->getMessage());
        }
    }

    /**
     * Handle method untuk kompatibilitas (opsional)
     */
    public function handle(Request $request, $itemId = null)
    {
        // Cek akses
        if (!in_array(Auth::user()->role, ['admin', 'petugas'])) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses!');
        }
        
        if ($request->isMethod('get') && !$itemId) {
            $items = Item::all();
            return view('items', compact('items'));
        }

        if ($request->isMethod('post')) {
            return $this->store($request);
        }

        if ($request->isMethod('put') && $itemId) {
            return $this->update($request, $itemId);
        }

        if ($request->isMethod('delete') && $itemId) {
            return $this->destroy($itemId);
        }

        return back()->with('error', 'Aksi tidak diizinkan.');
    }
}