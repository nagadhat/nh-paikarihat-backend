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
        Schema::create('order_return_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->string('product_name')->nullable();
            $table->string('order_code');
            $table->string('total_quantity')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('order_date')->nullable();
            $table->string('return_reason')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_return_requests');
    }
};
