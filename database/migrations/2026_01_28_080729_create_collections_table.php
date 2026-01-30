<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Ecoprint Bordir & Benang Sulam
            $table->string('short_desc', 255); // Deskripsi singkat (card/list)
            $table->longText('description'); // Deskripsi panjang (HTML allowed)

            $table->string('image_path')->nullable(); // Gambar utama koleksi

            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
