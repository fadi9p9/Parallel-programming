<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    public function run(): void
    {
        $carts = Cart::where('status', 1)->get();
        $products = Product::all();

        foreach ($carts as $cart) {
            foreach (range(1, fake()->numberBetween(1, 5)) as $i) {
                CartItem::factory()->create([
                    'cart_id' => $cart->id,
                    'product_id' => $products->random()->id,
                ]);
            }
        }
    }
}