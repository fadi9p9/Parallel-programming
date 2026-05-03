<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationUserFactory extends Factory
{
        protected $model = \App\Models\NotificationUser::class;

    public function definition(): array
    {
        return [
            'notification_id' => null,
            'user_id' => null,
            'is_read' => false,
            'read_at' => null,
        ];
    }

    public function read(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_read' => true,
            'read_at' => now(),
        ]);
    }
}