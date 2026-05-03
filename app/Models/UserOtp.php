<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserOtp extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'otp_code',
        'type',
        'expires_at',
        'verified_at',
        'is_used',
        'attempts',
        'note',
    ];

    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
            'verified_at' => 'datetime',
            'is_used' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}