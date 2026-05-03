<?php

namespace Database\Factories;

use App\Enum\OrderTrackingChangedByTypeEnum;
use App\Enum\OrdersStatusEnum;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderTrackingFactory extends Factory
{
        protected $model = \App\Models\OrderTracking::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'order_id' => null,
            'status' => OrdersStatusEnum::CREATED->value,
            'changed_by_type' => OrderTrackingChangedByTypeEnum::USER->value,
            'note' => null,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }

    public function bySystem(): static
    {
        return $this->state(fn (array $attributes) => [
            'changed_by_type' => OrderTrackingChangedByTypeEnum::SYSTEM->value,
        ]);
    }

    public function byAdmin(): static
    {
        return $this->state(fn (array $attributes) => [
            'changed_by_type' => OrderTrackingChangedByTypeEnum::ADMIN->value,
        ]);
    }
}