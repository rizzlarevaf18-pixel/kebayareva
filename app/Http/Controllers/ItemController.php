<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('items', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tidak digunakan karena pakai modal
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Debug: Log data yang masuk
        Log::info('Store method called');
        Log::info('Request data:', $request->all());
        
        try {
            // Validasi data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            // Buat item baru
            $item = new Item();
            $item->name = $request->name;
            $item->description = $request->description;
            $item->price = $request->price;
            $item->stock = $request->stock;

            // Upload image jika ada
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $item->image = $imageName;
            }

            $item->save();
            
            Log::info('Item saved successfully. ID: ' . $item->id);

            return redirect()->route('items')->with('success', 'Kebaya berhasil ditambahkan!');
            
        } catch (\Exception $e) {
            Log::error('Error in store method: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return redirect()->back()
                ->with('error', 'Gagal menambahkan kebaya: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Tidak digunakan karena pakai modal
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $item = Item::findOrFail($id);
            $item->name = $request->name;
            $item->description = $request->description;
            $item->price = $request->price;
            $item->stock = $request->stock;

            if ($request->hasFile('image')) {
                // Hapus gambar lama
                if ($item->image && file_exists(public_path('images/' . $item->image))) {
                    unlink(public_path('images/' . $item->image));
                }
                
                // Upload gambar baru
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $item->image = $imageName;
            }

            $item->save();

            return redirect()->route('items')->with('success', 'Kebaya berhasil diupdate!');
            
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal mengupdate kebaya: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $item = Item::findOrFail($id);
            
            // Hapus gambar
            if ($item->image && file_exists(public_path('images/' . $item->image))) {
                unlink(public_path('images/' . $item->image));
            }
            
            $item->delete();

            return redirect()->route('items')->with('success', 'Kebaya berhasil dihapus!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus kebaya: ' . $e->getMessage());
        }
    }
}