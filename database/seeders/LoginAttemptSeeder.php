<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\LoginAttempt;
use Illuminate\Database\Seeder;

class LoginAttemptSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            LoginAttempt::factory()->count(fake()->numberBetween(1, 10))->create([
                'user_id' => $user->id,
                'phone' => $user->phone,
            ]);
        }

        LoginAttempt::factory()->count(20)->create();
    }
}