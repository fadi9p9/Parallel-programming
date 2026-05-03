<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderTracking extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order_tracking';

    protected $fillable = [
        'uuid',
        'order_id',
        'status',
        'changed_by_type',
        'note',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'integer',
            'changed_by_type' => 'integer',
        ];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}