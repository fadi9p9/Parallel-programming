<?php

namespace Database\Factories;

use App\Enum\CartsStatusEnum;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
        protected $model = \App\Models\Cart::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'user_id' => null,
            'session_id' => Str::uuid()->toString(),
            'status' => CartsStatusEnum::ACTIVE->value,
            'expires_at' => now()->addHours(24),
            'note' => null,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }

    public function expired(): static
    {
        return $this->state(fn (array $attributes) => [
            'expires_at' => now()->subHour(),
        ]);
    }

    public function converted(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => CartsStatusEnum::CONVERTED->value,
        ]);
    }
}