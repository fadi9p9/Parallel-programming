<?php

namespace Database\Factories;

use App\Enum\PaymentsMethodEnum;
use App\Enum\PaymentsStatusEnum;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
        protected $model = \App\Models\Payment::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'order_id' => null,
            'amount' => fake()->randomFloat(2, 1000, 50000),
            'method' => PaymentsMethodEnum::CASH_ON_DELIVERY->value,
            'status' => PaymentsStatusEnum::PENDING->value,
            'transaction_ref' => Str::uuid()->toString(),
            'currency_code' => 'SYP',
            'note' => null,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }

    public function paid(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => PaymentsStatusEnum::PAID->value,
        ]);
    }

    public function failed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => PaymentsStatusEnum::FAILED->value,
        ]);
    }
}