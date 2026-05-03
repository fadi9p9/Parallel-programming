<?php

namespace Database\Factories;

use App\Enum\NotificationTargetsTargetTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationTargetFactory extends Factory
{
    protected $model = \App\Models\NotificationTarget::class;

    public function definition(): array
    {
        return [
            'notification_type_id' => null,
            'target_type' => NotificationTargetsTargetTypeEnum::USER->value,
            'target_id' => null,
        ];
    }
}