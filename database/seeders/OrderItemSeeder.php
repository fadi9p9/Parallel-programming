<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        $orders = Order::all();
        $products = Product::all();

        foreach ($orders as $order) {
            foreach (range(1, fake()->numberBetween(1, 5)) as $i) {
                OrderItem::factory()->create([
                    'order_id' => $order->id,
                    'product_id' => $products->random()->id,
                ]);
            }
        }
    }
}