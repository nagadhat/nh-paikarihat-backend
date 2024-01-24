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
        Schema::create('user_theme_elements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_theme_id')->index();
            $table->integer('element_id');
            $table->longText('html_content')->nullable();
            $table->longText('text_content')->nullable();
            $table->json('image_content')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_theme_elements');
    }
};
