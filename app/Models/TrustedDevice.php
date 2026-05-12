<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrustedDevice extends Model
{
    protected $fillable = [
        'user_id',
        'device_hash',
        'ip_address',
        'user_agent',
        'trusted_until',
    ];

    protected $casts = [
        'trusted_until' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Generate a unique hash for a device based on IP + User-Agent.
     */
    public static function generateHash(string $ip, string $userAgent): string
    {
        return hash('sha256', $ip . '|' . $userAgent);
    }

    /**
     * Check if a device is trusted for a user.
     */
    public static function isTrusted(int $userId, string $ip, string $userAgent): bool
    {
        $hash = self::generateHash($ip, $userAgent);

        return self::where('user_id', $userId)
            ->where('device_hash', $hash)
            ->where('trusted_until', '>', now())
            ->exists();
    }

    /**
     * Trust a device for a user (30 days).
     */
    public static function trustDevice(int $userId, string $ip, string $userAgent): self
    {
        return self::updateOrCreate(
            ['user_id' => $userId, 'device_hash' => self::generateHash($ip, $userAgent)],
            [
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'trusted_until' => now()->addDays(30),
            ]
        );
    }
}
