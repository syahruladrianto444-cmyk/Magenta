<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'department',
        'location',
        'type',
        'description',
        'requirements',
        'benefits',
        'meta_title',
        'meta_description',
        'deadline',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'deadline' => 'date',
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Scope a query to only include active careers.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include open positions.
     */
    public function scopeOpen($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('deadline')
                ->orWhere('deadline', '>=', now());
        });
    }

    /**
     * Get requirements as array.
     */
    public function getRequirementsArrayAttribute()
    {
        if (!$this->requirements) {
            return [];
        }
        return array_filter(array_map('trim', explode("\n", $this->requirements)));
    }

    /**
     * Get benefits as array.
     */
    public function getBenefitsArrayAttribute()
    {
        if (!$this->benefits) {
            return [];
        }
        return array_filter(array_map('trim', explode("\n", $this->benefits)));
    }
}
