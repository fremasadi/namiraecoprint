<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class FooterSetting extends Model
{
    protected $fillable = [
        'about_text',
        'boutique_name',
        'address',
        'maps_url',
        'phones',
        'shop_locations',
        'online_stores',
        'social_media',
        'copyright_text',
    ];

    /**
     * Cast JSON fields to array
     */
    protected $casts = [
        'phones' => 'array',
        'shop_locations' => 'array',
        'online_stores' => 'array',
        'social_media' => 'array',
    ];

    /**
     * Get default values for JSON fields
     */
    protected $attributes = [
        'phones' => '[]',
        'shop_locations' => '[]',
        'online_stores' => '[]',
        'social_media' => '[]',
    ];

    /**
     * Boot method - Clear cache when footer is updated
     */
    protected static function booted(): void
    {
        // Clear cache otomatis saat footer diupdate
        static::saved(function () {
            Cache::forget('site_footer');
        });

        static::deleted(function () {
            Cache::forget('site_footer');
        });
    }
}