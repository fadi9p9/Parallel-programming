<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Enum\OrdersStatusEnum;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
        protected $model = \App\Models\Order::class;

    public function definition(): array
    {
        $subtotal = fake()->randomFloat(2, 1000, 50000);
        $discount = fake()->optional(0.5)->randomFloat(2, 0, 1000);
        $deliveryFee = fake()->randomFloat(2, 500, 3000);
        $grandTotal = $subtotal - ($discount ?? 0) + $deliveryFee;

        return [
            'uuid' => Str::uuid()->toString(),
            'user_id' => null,
            'order_number' => fake()->unique()->numberBetween(100000, 999999),
            'status' => OrdersStatusEnum::CREATED->value,
            'total_amount' => $subtotal,
            'otp_id' => null,
            'verified_at' => null,
            'subtotal_amount' => $subtotal,
            'discount_total' => $discount ?? 0,
            'grand_total' => $grandTotal,
            'delivery_fee_id' => null,
            'delivery_fee' => $deliveryFee,
            'delivery_address_id' => null,
            'idempotency_key' => Str::uuid()->toString(),
            'note' => null,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
            'completed_at' => null,
            'canceled_at' => null,
            'cancellation_reason' => null,
        ];
    }

    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => OrdersStatusEnum::COMPLETED->value,
            'completed_at' => now(),
        ]);
    }

    public function canceled(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => OrdersStatusEnum::CANCELED->value,
            'canceled_at' => now(),
            'cancellation_reason' => fake()->sentence(),
        ]);
    }
}