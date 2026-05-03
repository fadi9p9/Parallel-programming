<?php

namespace Database\Seeders;

use App\Models\SalesReportsCache;
use Illuminate\Database\Seeder;

class SalesReportsCacheSeeder extends Seeder
{
    public function run(): void
    {
        SalesReportsCache::factory()->count(30)->create();
    }
}