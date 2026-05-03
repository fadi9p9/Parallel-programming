<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
        protected $model = \App\Models\Notification::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'notification_type_id' => null,
            'notifiable_type' => 'App\\Models\\User',
            'notifiable_id' => null,
            'data' => json_encode(['title' => fake()->sentence(), 'body' => fake()->paragraph()]),
            'created_by' => null,
        ];
    }
}