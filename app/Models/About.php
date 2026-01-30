<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class About extends Model
{
    protected $fillable = [
        'title',
        'paragraph_1',
        'paragraph_2',
        'image_path',
        'is_active',
    ];

    /**
     * About has many features
     */
    public function features(): HasMany
    {
        return $this->hasMany(AboutFeature::class)
            ->orderBy('sort_order');
    }
}