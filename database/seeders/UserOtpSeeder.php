<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserOtp;
use Illuminate\Database\Seeder;

class UserOtpSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users->random(30) as $user) {
            UserOtp::factory()->count(fake()->numberBetween(1, 5))->create([
                'user_id' => $user->id,
            ]);
        }
    }
}