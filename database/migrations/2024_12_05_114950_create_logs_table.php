<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Hapus tabel lama jika ada
        Schema::dropIfExists('logs');
        
        // Buat tabel baru dengan struktur lengkap
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('item_id')->nullable();
            $table->integer('amount')->default(0);
            $table->enum('action', ['borrow', 'return', 'approve', 'reject', 'take', 'pending']);
            $table->text('description')->nullable(); // ← Kolom description
            $table->decimal('late_fee', 15, 2)->default(0);
            $table->decimal('damage_fine', 15, 2)->default(0);
            $table->decimal('total_fine', 15, 2)->default(0);
            $table->timestamps();
            
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('set null');
            
            // Index untuk performa
            $table->index(['user_id', 'action']);
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};