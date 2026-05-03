<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users->random(30) as $user) {
            Cart::factory()->create([
                'user_id' => $user->id,
            ]);
        }

        Cart::factory()->count(10)->create();
    }
}