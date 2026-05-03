<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Warehouse;

class WarehouseFactory extends Factory
{
    protected $model = Warehouse::class;
    
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'name' => json_encode(['en' => fake()->company() . ' Warehouse', 'ar' => fake()->company() . ' مستودع']),
            'description' => json_encode(['en' => fake()->sentence(), 'ar' => fake()->sentence()]),
            'is_active' => true,
            'location' => null,
            'area' => null,
            'city_id' => null,
            'note' => null,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => false,
        ]);
    }
}
