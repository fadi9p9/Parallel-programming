<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'notification_type_id',
        'notifiable_type',
        'notifiable_id',
        'data',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'data' => 'array',
        ];
    }

    public function notificationType(): BelongsTo
    {
        return $this->belongsTo(NotificationType::class);
    }

    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }

    public function users(): HasMany
    {
        return $this->hasMany(NotificationUser::class);
    }
}