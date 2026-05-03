<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSession extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'uuid',
        'user_id',
        'token',
        'device_name',
        'device_type',
        'ip_address',
        'user_agent',
        'expires_at',
        'last_activity_at',
    ];

    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
            'last_activity_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}