<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained('loans')->onDelete('cascade');
            $table->enum('fine_type', ['late', 'damage', 'lost']);
            $table->decimal('amount', 15, 0);
            $table->enum('status', ['pending', 'paid'])->default('pending');
            $table->text('description')->nullable();
            $table->timestamps();
            
            // Index untuk optimasi query
            $table->index('loan_id');
            $table->index('fine_type');
            $table->index('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fines');
    }
};