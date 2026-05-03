<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NotificationType extends Model
{
    use HasFactory;

    protected $table = 'notification_types';

    protected $fillable = [
        'code',
        'title',
        'description',
        'priority',
        'channel',
    ];

    protected function casts(): array
    {
        return [
            'priority' => 'integer',
            'channel' => 'integer',
        ];
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function userSettings(): HasMany
    {
        return $this->hasMany(UserNotificationSetting::class);
    }

    public function targets(): HasMany
    {
        return $this->hasMany(NotificationTarget::class);
    }
}