<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserOtp;
use App\Models\DeliveryFee;
use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $addresses = UserAddress::all();
        $deliveryFees = DeliveryFee::all();

        foreach ($users->random(30) as $user) {
            Order::factory()->count(fake()->numberBetween(1, 3))->create([
                'user_id' => $user->id,
                'delivery_address_id' => $addresses->random()->id,
                'delivery_fee_id' => $deliveryFees->random()->id,
            ]);
        }
    }
}