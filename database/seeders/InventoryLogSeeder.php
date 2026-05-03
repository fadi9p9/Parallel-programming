<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\InventoryLog;
use Illuminate\Database\Seeder;

class InventoryLogSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        foreach ($products->random(50) as $product) {
            InventoryLog::factory()->count(fake()->numberBetween(1, 10))->create([
                'product_id' => $product->id,
            ]);
        }
    }
}