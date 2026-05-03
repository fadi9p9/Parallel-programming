<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserNotificationSettingFactory extends Factory
{
    protected $model = \App\Models\UserNotificationSetting::class;

    public function definition(): array
    {
        return [
            'user_id' => null,
            'notification_type_id' => null,
            'is_enabled' => true,
        ];
    }

    public function disabled(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_enabled' => false,
        ]);
    }
}