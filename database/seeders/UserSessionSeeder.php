<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserSession;
use Illuminate\Database\Seeder;

class UserSessionSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users->random(30) as $user) {
            UserSession::factory()->count(fake()->numberBetween(1, 3))->create([
                'user_id' => $user->id,
            ]);
        }
    }
}