<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class StockFactory extends Factory
{
    protected $model = \App\Models\Stock::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'product_id' => null,
            'quantity' => fake()->numberBetween(0, 1000),
            'min_quantity' => fake()->numberBetween(5, 50),
            'warehouse_id' => null,
            'note' => null,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }

    public function lowStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'quantity' => fake()->numberBetween(1, 10),
        ]);
    }
}