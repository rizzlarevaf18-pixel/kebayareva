<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Nonaktifkan foreign key checks sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        // Cek apakah kolom kondisi ada
        if (Schema::hasColumn('items', 'kondisi')) {
            // Method 1: Menggunakan DB statement (paling reliable)
            DB::statement("ALTER TABLE items MODIFY kondisi VARCHAR(255) DEFAULT 'baik'");
            
            // Method 2: Atau gunakan cara ini jika method 1 tidak bekerja
            // Schema::table('items', function (Blueprint $table) {
            //     $table->string('kondisi')->default('baik')->change();
            // });
            
            // Update semua data yang NULL menjadi 'baik'
            DB::table('items')->whereNull('kondisi')->update(['kondisi' => 'baik']);
        } else {
            // Jika kolom belum ada, tambahkan
            Schema::table('items', function (Blueprint $table) {
                $table->string('kondisi')->default('baik')->after('stock');
            });
        }
        
        // Aktifkan kembali foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        if (Schema::hasColumn('items', 'kondisi')) {
            // Kembalikan ke kondisi awal
            DB::statement("ALTER TABLE items MODIFY kondisi VARCHAR(255) NOT NULL");
        }
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
};