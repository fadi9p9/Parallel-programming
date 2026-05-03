<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerformanceLogFactory extends Factory
{
    protected $model = \App\Models\PerformanceLog::class;

    public function definition(): array
    {
        return [
            'endpoint' => fake()->randomElement([
                '/api/products',
                '/api/orders',
                '/api/users',
                '/api/categories',
            ]),
            'execution_time_ms' => fake()->numberBetween(50, 500),
            'memory_usage_kb' => fake()->numberBetween(1024, 8192),
        ];
    }
}