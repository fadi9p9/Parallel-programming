<?php

namespace Database\Factories;

use App\Enum\DeliveryFeesDeliveryTypeEnum;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFeeFactory extends Factory
{
        protected $model = \App\Models\DeliveryFee::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'city_id' => null,
            'warehouse_id' => null,
            'delivery_type' => DeliveryFeesDeliveryTypeEnum::STANDARD->value,
            'fee' => fake()->randomFloat(2, 500, 5000),
            'estimated_days' => fake()->numberBetween(1, 7),
            'is_active' => true,
            'note' => null,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}