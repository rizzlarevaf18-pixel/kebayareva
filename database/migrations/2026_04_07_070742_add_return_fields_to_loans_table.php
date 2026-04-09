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
            $table->dateTime('actual_return_date')->nullable()->after('return_date');
            $table->string('return_condition')->nullable();
            $table->text('damage_description')->nullable();
            $table->decimal('late_fee', 10, 2)->default(0);
            $table->decimal('damage_fine', 10, 2)->default(0);
            $table->decimal('total_fine', 10, 2)->default(0);
            $table->string('payment_method')->nullable();
            $table->string('transfer_reference')->nullable();
            $table->string('transaction_number')->nullable();
            $table->string('receipt_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn([
                'actual_return_date',
                'return_condition',
                'damage_description',
                'late_fee',
                'damage_fine',
                'total_fine',
                'payment_method',
                'transfer_reference',
                'transaction_number',
                'receipt_url'
            ]);
        });
    }
};