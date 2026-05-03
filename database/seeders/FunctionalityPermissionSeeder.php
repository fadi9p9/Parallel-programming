<?php

namespace Database\Seeders;

use App\Models\FunctionalityPermission;
use Illuminate\Database\Seeder;

class FunctionalityPermissionSeeder extends Seeder
{
    public function run(): void
    {
        FunctionalityPermission::factory()->count(15)->create();
    }
}