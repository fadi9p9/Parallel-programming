<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartItemFactory extends Factory
{
        protected $model = \App\Models\CartItem::class;

    public function definition(): array
    {
        $quantity = fake()->numberBetween(1, 5);
        $unitPrice = fake()->randomFloat(2, 10, 500);
        $discountValue = fake()->optional(0.3)->randomFloat(2, 0, 50);
        $totalPrice = $quantity * $unitPrice;
        $finalPrice = $totalPrice - ($discountValue ?? 0);

        return [
            'uuid' => Str::uuid()->toString(),
            'cart_id' => null,
            'product_id' => null,
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'total_price' => $totalPrice,
            'discount_value' => $discountValue,
            'product_name' => fake()->words(3, true),
            'final_price' => $finalPrice,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }
}