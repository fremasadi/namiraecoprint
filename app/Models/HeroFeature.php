<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HeroFeature extends Model
{
    protected $fillable = [
        'hero_id',
        'icon',
        'text',
        'sort_order',
    ];

    /**
     * Relasi: Feature milik satu hero
     */
    public function hero(): BelongsTo
    {
        return $this->belongsTo(Hero::class);
    }
}