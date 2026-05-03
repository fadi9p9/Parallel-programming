<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderTracking;
use Illuminate\Database\Seeder;

class OrderTrackingSeeder extends Seeder
{
    public function run(): void
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            OrderTracking::factory()->count(fake()->numberBetween(1, 4))->create([
                'order_id' => $order->id,
            ]);
        }
    }
}