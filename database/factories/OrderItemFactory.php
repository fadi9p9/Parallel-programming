<?php

namespace Database\Factories;

use App\Enum\OrderItemsDiscountTypeEnum;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
        protected $model = \App\Models\OrderItem::class;

    public function definition(): array
    {
        $quantity = fake()->numberBetween(1, 10);
        $unitPrice = fake()->randomFloat(2, 100, 1000);
        $totalPrice = $quantity * $unitPrice;
        $discountValue = fake()->optional(0.3)->randomFloat(2, 0, 100);
        $finalPrice = $totalPrice - ($discountValue ?? 0);

        return [
            'uuid' => Str::uuid()->toString(),
            'order_id' => null,
            'product_id' => null,
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'total_price' => $totalPrice,
            'discount_value' => $discountValue,
            'discount_type' => fake()->randomElement([
                OrderItemsDiscountTypeEnum::PERCENTAGE->value,
                OrderItemsDiscountTypeEnum::FIXED->value,
            ]),
            'final_price' => $finalPrice,
            'product_name' => fake()->words(3, true),
            'product_price' => json_encode(['unit_price' => $unitPrice]),
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }
}