<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'youtube_video_id',
        'status',
        'event_date',
        'description',
        'created_by',
        'is_active',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * The users (clients/PIC) assigned to this event.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'event_user')
            ->withPivot('role')
            ->withTimestamps();
    }

    /**
     * The admin who created this event.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the YouTube embed URL.
     */
    public function getYoutubeEmbedUrlAttribute(): ?string
    {
        if (!$this->youtube_video_id) {
            return null;
        }
        return "https://www.youtube.com/embed/{$this->youtube_video_id}?autoplay=1";
    }

    /**
     * Get the YouTube watch URL.
     */
    public function getYoutubeWatchUrlAttribute(): ?string
    {
        if (!$this->youtube_video_id) {
            return null;
        }
        return "https://www.youtube.com/watch?v={$this->youtube_video_id}";
    }

    /**
     * Get the YouTube thumbnail URL.
     */
    public function getYoutubeThumbnailUrlAttribute(): ?string
    {
        if (!$this->youtube_video_id) {
            return null;
        }
        return "https://img.youtube.com/vi/{$this->youtube_video_id}/maxresdefault.jpg";
    }

    /**
     * Get status badge color.
     */
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'preparing' => 'yellow',
            'live' => 'green',
            'completed' => 'blue',
            default => 'gray',
        };
    }

    /**
     * Get status label in Indonesian.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'preparing' => 'Persiapan',
            'live' => 'Live',
            'completed' => 'Selesai',
            default => '-',
        };
    }
}
