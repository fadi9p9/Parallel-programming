<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryFee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'city_id',
        'warehouse_id',
        'delivery_type',
        'fee',
        'estimated_days',
        'is_active',
        'note',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'fee' => 'decimal:2',
            'estimated_days' => 'integer',
        ];
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }
}