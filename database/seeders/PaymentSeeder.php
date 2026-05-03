<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            Payment::factory()->create([
                'order_id' => $order->id,
                'amount' => $order->grand_total,
            ]);
        }
    }
}