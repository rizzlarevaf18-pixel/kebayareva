<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    use HasFactory;

    protected $table = 'fines';

    protected $fillable = [
        'loan_id',
        'fine_type',
        'amount',
        'status',
        'description',
    ];

    protected $casts = [
        'amount' => 'decimal:0',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relasi ke loan
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    // Status badge
    public function getStatusBadgeAttribute()
    {
        return $this->status === 'paid' 
            ? '<span class="badge bg-success">Lunas</span>' 
            : '<span class="badge bg-warning">Pending</span>';
    }

    // Tipe denda dalam bahasa Indonesia
    public function getFineTypeIndonesianAttribute()
    {
        $types = [
            'late' => 'Denda Keterlambatan',
            'damage' => 'Denda Kerusakan',
            'lost' => 'Denda Kehilangan',
        ];
        return $types[$this->fine_type] ?? ucfirst($this->fine_type);
    }
}