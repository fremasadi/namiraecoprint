<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutFeature extends Model
{
    protected $fillable = [
        'about_id',
        'icon',
        'title',
        'description',
        'sort_order',
    ];

    /**
     * Feature belongs to About
     */
    public function about(): BelongsTo
    {
        return $this->belongsTo(About::class);
    }
}