<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'category',
        'title',
        'short_desc',
        'content',
        'image_path',
        'published_at',
        'author',
        'is_published',
        'sort_order',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'published_at' => 'date',
        'is_published' => 'boolean',
    ];

    /**
     * Default ordering
     */
    protected static function booted()
    {
        static::addGlobalScope('ordered', function ($query) {
            $query
                ->orderByDesc('published_at')
                ->orderBy('sort_order');
        });
    }

    /**
     * Scope: only published news
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Accessor: full image URL
     */
    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image_path) {
            return null;
        }

        return asset('storage/' . $this->image_path);
    }
}