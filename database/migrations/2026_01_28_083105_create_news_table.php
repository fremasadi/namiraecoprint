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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            // Kategori berita (Event, Achievement, Workshop, dll)
            $table->string('category', 100);

            // Judul berita
            $table->string('title');

            // Deskripsi singkat (untuk list / card)
            $table->string('short_desc', 255);

            // Konten lengkap (HTML allowed)
            $table->longText('content');

            // Gambar utama berita
            $table->string('image_path')->nullable();

            // Tanggal publish (bukan created_at)
            $table->date('published_at')->nullable();

            // Penulis
            $table->string('author', 150)->nullable();

            // Status aktif / draft
            $table->boolean('is_published')->default(true);

            // Urutan manual (optional)
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
