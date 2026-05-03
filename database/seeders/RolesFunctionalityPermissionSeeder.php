<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\FunctionalityPermission;
use Illuminate\Database\Seeder;

class RolesFunctionalityPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = Role::all();
        $functionalityPermissions = FunctionalityPermission::all();

        foreach ($roles as $role) {
            $role->functionalityPermissions()->attach(
                $functionalityPermissions->random(fake()->numberBetween(2, 8))->pluck('id')
            );
        }
    }
}