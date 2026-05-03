<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    protected static ?string $password;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'phone' => fake()->unique()->phoneNumber(),
            'media_id' => null,
            'is_phone_verified' => false,
        ];
    }

    public function verified(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_phone_verified' => true,
        ]);
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    public function temporaryPassword(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_temporary_password' => true,
        ]);
    }
}