<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $warehouses = Warehouse::all();

        foreach ($products as $product) {
            foreach ($warehouses->random(fake()->numberBetween(1, 2)) as $warehouse) {
                Stock::factory()->create([
                    'product_id' => $product->id,
                    'warehouse_id' => $warehouse->id,
                ]);
            }
        }
    }
}