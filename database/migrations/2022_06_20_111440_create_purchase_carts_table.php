<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('product_id');
            $table->integer('quantity');
            $table->double('purchase_amount')->nullable();
            $table->double('sub_total')->default(0);
            $table->double('discount_amount')->default(0);
            $table->double('total_amount')->default(0);
            $table->double('mrp')->nullable();
            $table->string('unit')->nullable();
            $table->string('lot_no')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_carts');
    }
}
