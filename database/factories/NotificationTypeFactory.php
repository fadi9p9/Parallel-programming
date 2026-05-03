<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Enum\NotificationTypesPriorityEnum;
use App\Enum\NotificationTypesChannelEnum;

class NotificationTypeFactory extends Factory
{
    protected $model = \App\Models\NotificationType::class;

    private static $codes = [
        'STOCK_LOW',
        'ORDER_CREATED',
        'ORDER_COMPLETED',
        'PAYMENT_RECEIVED',
        'NEW_USER_REGISTERED',
        'ORDER_CANCELED',
        'REFUND_PROCESSED',
        'DELIVERY_STARTED',
        'DELIVERY_COMPLETED',
        'PASSWORD_CHANGED',
        'EMAIL_VERIFIED',
        'ACCOUNT_ACTIVATED',
        'WELCOME_MESSAGE',
        'PROMOTION_ALERT',
        'SYSTEM_NOTIFICATION',
    ];

    public function definition(): array
    {
        $code = array_shift(self::$codes);
        if ($code === null) {
            $code = 'NOTIFICATION_' . Str::random(10);
        }

        return [
            'code' => $code,
            'title' => json_encode(['en' => fake()->sentence(), 'ar' => fake()->sentence()]),
            'description' => json_encode(['en' => fake()->paragraph(), 'ar' => fake()->paragraph()]),
            'priority' => NotificationTypesPriorityEnum::MEDIUM->value,
            'channel' => NotificationTypesChannelEnum::DATABASE->value,
        ];
    }

    public function highPriority(): static
    {
        return $this->state(fn (array $attributes) => [
            'priority' => NotificationTypesPriorityEnum::HIGH->value,
        ]);
    }
}