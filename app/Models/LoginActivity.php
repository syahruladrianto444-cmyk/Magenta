<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginActivity extends Model
{
    protected $fillable = [
        'user_id',
        'email',
        'ip_address',
        'user_agent',
        'status',
        'login_at',
    ];

    protected $casts = [
        'login_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Log a login activity.
     */
    public static function log(?int $userId, string $email, string $ip, ?string $userAgent, string $status): self
    {
        return self::create([
            'user_id' => $userId,
            'email' => $email,
            'ip_address' => $ip,
            'user_agent' => $userAgent,
            'status' => $status,
            'login_at' => now(),
        ]);
    }
}
