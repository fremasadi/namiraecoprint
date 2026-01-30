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
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();
            // About Section
            $table->text('about_text')->nullable();

            // Boutique Location
            $table->string('boutique_name')->nullable();
            $table->text('address')->nullable();
            $table->string('maps_url')->nullable();

            // Contact Info (JSON)
            $table->json('phones')->nullable();
            // Format: [{"number": "0812...", "label": "WhatsApp", "url": "wa.me/...", "is_whatsapp": true}]

            // Shop Locations (JSON)
            $table->json('shop_locations')->nullable();
            // Format: [{"name": "Novotel", "type": "Hotel", "address": "...", "url": "https://..."}]

            // Online Stores (JSON)
            $table->json('online_stores')->nullable();
            // Format: [{"platform": "Tokopedia", "name": "...", "url": "https://..."}]

            // Social Media (JSON)
            $table->json('social_media')->nullable();
            // Format: [{"platform": "Instagram", "username": "@...", "url": "https://...", "icon": "fa-instagram"}]

            // Copyright
            $table->string('copyright_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_settings');
    }
};
