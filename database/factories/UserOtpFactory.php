<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Enum\UserOtpsTypeEnum;
use Illuminate\Support\Str;

class UserOtpFactory extends Factory
{
    protected $model = \App\Models\UserOtp::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'user_id' => null,
            'otp_code' => strval(fake()->numberBetween(100000, 999999)),
            'type' => UserOtpsTypeEnum::PHONE_VERIFICATION->value,
            'expires_at' => now()->addMinutes(10),
            'verified_at' => null,
            'is_used' => false,
            'attempts' => 0,
            'note' => null,
        ];
    }

    public function used(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_used' => true,
            'verified_at' => now(),
        ]);
    }

    public function expired(): static
    {
        return $this->state(fn (array $attributes) => [
            'expires_at' => now()->subMinutes(5),
        ]);
    }
}