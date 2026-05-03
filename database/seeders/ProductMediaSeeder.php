<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Media;
use App\Models\ProductMedia;
use Illuminate\Database\Seeder;

class ProductMediaSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $media = Media::all();

        foreach ($products as $product) {
            foreach ($media->random(fake()->numberBetween(1, 4)) as $m) {
                ProductMedia::factory()->create([
                    'product_id' => $product->id,
                    'media_id' => $m->id,
                ]);
            }
        }
    }
}