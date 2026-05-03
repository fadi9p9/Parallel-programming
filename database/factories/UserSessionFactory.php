<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class UserSessionFactory extends Factory
{
    protected $model = \App\Models\UserSession::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'user_id' => null,
            'token' => Str::uuid()->toString(),
            'device_name' => fake()->randomElement(['iPhone 14', 'Samsung Galaxy S23', 'MacBook Pro', 'iPad Air']),
            'device_type' => fake()->randomElement(['mobile', 'tablet', 'desktop']),
            'ip_address' => fake()->ipv4(),
            'user_agent' => fake()->userAgent(),
            'expires_at' => now()->addDays(30),
            'last_activity_at' => now(),
        ];
    }

    public function expired(): static
    {
        return $this->state(fn (array $attributes) => [
            'expires_at' => now()->subDay(),
        ]);
    }
}