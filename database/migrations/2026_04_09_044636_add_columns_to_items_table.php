<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToItemsTable extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            // Tambahkan kolom yang belum ada
            if (!Schema::hasColumn('items', 'price')) {
                $table->integer('price')->default(0)->after('description');
            }
            if (!Schema::hasColumn('items', 'ukuran')) {
                $table->string('ukuran')->nullable()->after('price');
            }
            if (!Schema::hasColumn('items', 'warna')) {
                $table->string('warna')->nullable()->after('ukuran');
            }
            if (!Schema::hasColumn('items', 'quantity')) {
                $table->integer('quantity')->default(0)->after('stock');
            }
            if (!Schema::hasColumn('items', 'kondisi')) {
                $table->string('kondisi')->default('baik')->after('quantity');
            }
            if (!Schema::hasColumn('items', 'is_available')) {
                $table->boolean('is_available')->default(true)->after('kondisi');
            }
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn(['price', 'ukuran', 'warna', 'quantity', 'kondisi', 'is_available']);
        });
    }
}