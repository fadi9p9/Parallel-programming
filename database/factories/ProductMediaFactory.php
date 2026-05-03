<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class ProductMediaFactory extends Factory
{
    protected $model = \App\Models\ProductMedia::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'product_id' => null,
            'media_id' => null,
        ];
    }
}