<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enum\OrdersStatusEnum;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'user_id',
        'order_number',
        'status',
        'total_amount',
        'otp_id',
        'verified_at',
        'subtotal_amount',
        'discount_total',
        'grand_total',
        'delivery_fee_id',
        'delivery_fee',
        'delivery_address_id',
        'idempotency_key',
        'note',
        'created_by',
        'updated_by',
        'deleted_by',
        'completed_at',
        'canceled_at',
        'cancellation_reason',
    ];

    protected function casts(): array
    {
        return [
            'status' => OrdersStatusEnum::class,
            'verified_at' => 'datetime',
            'total_amount' => 'decimal:2',
            'subtotal_amount' => 'decimal:2',
            'discount_total' => 'decimal:2',
            'grand_total' => 'decimal:2',
            'delivery_fee' => 'decimal:2',
            'completed_at' => 'datetime',
            'canceled_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function otp(): BelongsTo
    {
        return $this->belongsTo(UserOtp::class, 'otp_id');
    }

    public function deliveryFee(): BelongsTo
    {
        return $this->belongsTo(DeliveryFee::class, 'delivery_fee_id');
    }

    public function deliveryAddress(): BelongsTo
    {
        return $this->belongsTo(UserAddress::class, 'delivery_address_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function tracking(): HasMany
    {
        return $this->hasMany(OrderTracking::class);
    }
}