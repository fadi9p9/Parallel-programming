<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Enum\SalesReportsCacheReportTypeEnum;
use Illuminate\Support\Str;

class SalesReportsCacheFactory extends Factory
{
    protected $model = App\Models\SalesReportsCache::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'report_date' => fake()->date(),
            'report_type' => SalesReportsCacheReportTypeEnum::DAILY->value,
            'total_sales' => fake()->randomFloat(2, 100000, 1000000),
            'total_orders' => fake()->numberBetween(10, 500),
            'total_customers' => fake()->numberBetween(5, 200),
            'total_products_sold' => fake()->numberBetween(50, 2000),
            'top_selling_product_id' => null,
            'top_selling_category_id' => null,
            'data' => json_encode(['top_products' => []]),
        ];
    }
}