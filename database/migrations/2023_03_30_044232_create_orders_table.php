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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('order_prefix');
            $table->integer('order_code');
            $table->foreignId('customer_id')->default(0);
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->longText('customer_address');
            $table->string('total_quantity')->nullable();
            $table->string('delivery_area')->nullable();
            $table->string('discount_amount')->default(0);
            $table->string('total_amount')->default(0);
            $table->tinyInteger('payment_status')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->string('order_from')->default('website');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
