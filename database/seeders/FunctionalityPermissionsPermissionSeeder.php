<?php

namespace Database\Seeders;

use App\Models\FunctionalityPermission;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class FunctionalityPermissionsPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $functionalityPermissions = FunctionalityPermission::all();
        $permissions = Permission::all();

        foreach ($functionalityPermissions as $fp) {
            $fp->permissions()->attach($permissions->random(fake()->numberBetween(3, 10))->pluck('id'));
        }
    }
}