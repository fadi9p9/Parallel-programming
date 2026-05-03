<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class BrandFactory extends Factory
{
        protected $model = \App\Models\Brand::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'name' => json_encode(['en' => fake()->company(), 'ar' => fake()->company()]),
            'description' => json_encode(['en' => fake()->sentence(), 'ar' => fake()->sentence()]),
            'logo_id' => null,
            'note' => null,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }
}