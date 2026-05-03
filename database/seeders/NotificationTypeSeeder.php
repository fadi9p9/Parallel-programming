<?php

namespace Database\Seeders;

use App\Models\NotificationType;
use Illuminate\Database\Seeder;

class NotificationTypeSeeder extends Seeder
{
    public function run(): void
    {
        NotificationType::factory()->count(10)->create();
    }
}