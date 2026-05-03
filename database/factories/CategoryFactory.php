<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
        protected $model = \App\Models\Category::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'name' => json_encode(['en' => fake()->words(2, true), 'ar' => fake()->words(2, true)]),
            'description' => json_encode(['en' => fake()->sentence(), 'ar' => fake()->sentence()]),
            'media_id' => null,
            'note' => null,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }
}