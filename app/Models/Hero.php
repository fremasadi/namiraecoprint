<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hero extends Model
{
    protected $fillable = [
        'background_image',
        'title',
        'subtitle',
        'is_active',
    ];

    /**
     * Relasi: Hero memiliki banyak feature (badge)
     */
    public function features(): HasMany
    {
        return $this->hasMany(HeroFeature::class)
            ->orderBy('sort_order');
    }
}