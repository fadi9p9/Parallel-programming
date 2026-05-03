<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class UserAddressFactory extends Factory
{
    protected $model = \App\Models\UserAddress::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'user_id' => null,
            'city_id' => null,
            'address_line' => fake()->address(),
            'lat' => fake()->latitude(),
            'lng' => fake()->longitude(),
            'is_default' => false,
            'label' => fake()->randomElement(['home', 'work', 'other']),
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }

    public function default(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_default' => true,
        ]);
    }
}