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
        Schema::create('purchase_payment_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_order_id');
            $table->string('trxn_id')->default(0);
            $table->double('paid_amount')->default(0);
            $table->string('payment_method')->default(0);
            $table->string('payment_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_payment_histories');
    }
};
