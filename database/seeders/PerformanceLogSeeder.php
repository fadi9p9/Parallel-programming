<?php

namespace Database\Seeders;

use App\Models\PerformanceLog;
use Illuminate\Database\Seeder;

class PerformanceLogSeeder extends Seeder
{
    public function run(): void
    {
        PerformanceLog::factory()->count(50)->create();
    }
}