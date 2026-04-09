<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('loans', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->decimal('late_fee', 15, 2)->default(0);
            $table->decimal('damage_fine', 15, 2)->default(0);
            $table->decimal('total_fine', 15, 2)->default(0);
            $table->string('payment_method')->nullable();
            $table->string('transfer_reference')->nullable();
            $table->string('receipt_url')->nullable();
            $table->string('transaction_number')->nullable();
            $table->string('damage_description')->nullable();
            $table->string('return_condition')->nullable();
            $table->timestamp('actual_return_date')->nullable();
        });
    }
};
