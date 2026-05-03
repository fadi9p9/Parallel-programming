<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserNotificationSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'notification_type_id',
        'is_enabled',
    ];

    protected function casts(): array
    {
        return [
            'is_enabled' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function notificationType(): BelongsTo
    {
        return $this->belongsTo(NotificationType::class);
    }
}