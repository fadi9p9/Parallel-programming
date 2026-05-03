<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FunctionalityPermissionFactory extends Factory
{
        protected $model = \App\Models\FunctionalityPermission::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'name' => fake()->unique()->words(3, true),
            'description' => fake()->sentence(),
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }
}