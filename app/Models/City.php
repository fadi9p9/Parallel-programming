<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'center_lat',
        'center_lng',
        'boundary',
        'area_km2',
        'zoom_level',
        'note',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected function casts(): array
    {
        return [
            'center_lat' => 'decimal:8',
            'center_lng' => 'decimal:8',
            'area_km2' => 'decimal:2',
            'zoom_level' => 'integer',
        ];
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }

    public function warehouses(): HasMany
    {
        return $this->hasMany(Warehouse::class);
    }

    public function deliveryFees(): HasMany
    {
        return $this->hasMany(DeliveryFee::class);
    }
}