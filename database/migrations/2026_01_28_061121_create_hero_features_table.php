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
        Schema::create('hero_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hero_id')->constrained('heroes')->cascadeOnDelete();

            $table->string('icon')->nullable(); // ✦ 🌿 dll
            $table->string('text'); // isi badge
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_features');
    }
};
