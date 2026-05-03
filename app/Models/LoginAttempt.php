<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoginAttempt extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'user_id',
        'phone',
        'ip_address',
        'user_agent',
        'success',
        'failure_reason',
        'attempted_at',
    ];

    protected function casts(): array
    {
        return [
            'success' => 'boolean',
            'attempted_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}