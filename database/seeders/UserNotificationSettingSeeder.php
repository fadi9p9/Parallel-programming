<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\NotificationType;
use App\Models\UserNotificationSetting;
use Illuminate\Database\Seeder;

class UserNotificationSettingSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $notificationTypes = NotificationType::all();

        foreach ($users->random(20) as $user) {
            foreach ($notificationTypes->random(fake()->numberBetween(2, 8)) as $type) {
                UserNotificationSetting::factory()->create([
                    'user_id' => $user->id,
                    'notification_type_id' => $type->id,
                ]);
            }
        }
    }
}