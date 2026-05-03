<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAddress;
use App\Models\City;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $cities = City::all();

        foreach ($users->random(40) as $user) {
            foreach (range(1, fake()->numberBetween(1, 3)) as $i) {
                UserAddress::factory()->create([
                    'user_id' => $user->id,
                    'city_id' => $cities->random()->id,
                    'is_default' => $i === 1,
                ]);
            }
        }
    }
}