<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $roles = Role::all();

        foreach ($users->random(30) as $user) {
            $user->roles()->attach($roles->random(fake()->numberBetween(1, 3))->pluck('id'));
        }
    }
}