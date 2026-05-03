<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $categories = Category::all();

        foreach ($products as $product) {
            $product->categories()->attach(
                $categories->random(fake()->numberBetween(1, 3))->pluck('id')
            );
        }
    }
}