<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoginAttemptFactory extends Factory
{
        protected $model = \App\Models\LoginAttempt::class;

    public function definition(): array
    {
        return [
            'user_id' => null,
            'phone' => fake()->phoneNumber(),
            'ip_address' => fake()->ipv4(),
            'user_agent' => fake()->userAgent(),
            'success' => fake()->boolean(70),
            'failure_reason' => null,
            'attempted_at' => now(),
        ];
    }

    public function failed(string $reason = 'wrong_password'): static
    {
        return $this->state(fn (array $attributes) => [
            'success' => false,
            'failure_reason' => $reason,
        ]);
    }
}