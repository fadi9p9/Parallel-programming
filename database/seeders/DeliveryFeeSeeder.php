<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Warehouse;
use App\Models\DeliveryFee;
use Illuminate\Database\Seeder;

class DeliveryFeeSeeder extends Seeder
{
    public function run(): void
    {
        $cities = City::all();
        $warehouses = Warehouse::all();

        foreach ($cities as $city) {
            foreach ($warehouses->random(fake()->numberBetween(1, 3)) as $warehouse) {
                DeliveryFee::factory()->create([
                    'city_id' => $city->id,
                    'warehouse_id' => $warehouse->id,
                ]);
            }
        }
    }
}