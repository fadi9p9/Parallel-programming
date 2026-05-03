<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'name' => json_encode(['en' => fake()->words(3, true), 'ar' => fake()->words(3, true)]),
            'description' => json_encode(['en' => fake()->paragraph(), 'ar' => fake()->paragraph()]),
            'brand_id' => null,
            'is_active' => true,
            'average_rating' => fake()->randomFloat(2, 0, 5),
            'discount' => fake()->optional(0.3)->randomFloat(2, 0, 50),
            'version' => 0,
            'note' => null,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    public function withDiscount(): static
    {
        return $this->state(fn (array $attributes) => [
            'discount' => fake()->randomFloat(2, 5, 30),
        ]);
    }
}