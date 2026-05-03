<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolesPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = Role::all();
        $permissions = Permission::all();

        foreach ($roles as $role) {
            $role->permissions()->attach($permissions->random(fake()->numberBetween(5, 15))->pluck('id'));
        }
    }
}