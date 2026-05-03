<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
use App\Models\City;

class CityFactory extends Factory
{
    protected $model = City::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'name' => json_encode(['en' => fake()->city(), 'ar' => fake()->city()]),
            'center_lat' => fake()->latitude(),
            'center_lng' => fake()->longitude(),
            'boundary' => null,
            'area_km2' => fake()->randomFloat(2, 100, 10000),
            'zoom_level' => 12,
            'note' => null,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }
}
