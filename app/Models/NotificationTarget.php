<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotificationTarget extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'notification_type_id',
        'target_type',
        'target_id',
    ];

    protected function casts(): array
    {
        return [
            'target_type' => 'integer',
        ];
    }

    public function notificationType(): BelongsTo
    {
        return $this->belongsTo(NotificationType::class);
    }

    public function target(): MorphTo
    {
        return $this->morphTo();
    }
}