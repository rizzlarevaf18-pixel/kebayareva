<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'stock',
        'price',      // Tambahkan price (harga)
        'image',
        'ukuran',     // Tambahkan ukuran
        'warna',      // Tambahkan warna
        'quantity',   // Tambahkan quantity jika diperlukan
        'kondisi',    // Tambahkan kondisi
        'is_available' // Tambahkan status ketersediaan
    ];
    
    // Optional: Accessor untuk format harga
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
    
    // Optional: Mutator untuk memastikan price selalu integer
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = (int) $value;
    }
    
    // Optional: Scope untuk barang yang tersedia
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true)->where('stock', '>', 0);
    }
}