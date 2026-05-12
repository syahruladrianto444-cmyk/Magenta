<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PresentationDeck extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'business_unit',
        'category',
        'short_description',
        'thumbnail_image',
        'pdf_file',
        'is_featured',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Auto-generate slug from title.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($deck) {
            if (empty($deck->slug)) {
                $deck->slug = Str::slug($deck->title);
            }
        });
    }

    /**
     * Scope: only active decks.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: only featured decks.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope: ordered by sort_order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }
}
