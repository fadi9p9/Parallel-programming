<?php

namespace Database\Factories;

use App\Enum\InventoryLogsTypeEnum;
use App\Enum\InventoryLogsSourceTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryLogFactory extends Factory
{
        protected $model = \App\Models\InventoryLog::class;

    public function definition(): array
    {
        return [
            'product_id' => null,
            'change' => fake()->randomFloat(2, -100, 100),
            'type' => fake()->randomElement([
                InventoryLogsTypeEnum::INCREASE->value,
                InventoryLogsTypeEnum::DECREASE->value,
                InventoryLogsTypeEnum::ADJUST->value,
            ]),
            'source_type' => fake()->randomElement([
                InventoryLogsSourceTypeEnum::ORDER->value,
                InventoryLogsSourceTypeEnum::RETURN->value,
                InventoryLogsSourceTypeEnum::MANUAL->value,
                InventoryLogsSourceTypeEnum::ADJUSTMENT->value,
            ]),
            'source_id' => null,
            'note' => null,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }
}