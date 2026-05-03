<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\User;
use App\Models\NotificationUser;
use Illuminate\Database\Seeder;

class NotificationUserSeeder extends Seeder
{
    public function run(): void
    {
        $notifications = Notification::all();
        $users = User::all();

        foreach ($notifications as $notification) {
            NotificationUser::factory()->create([
                'notification_id' => $notification->id,
                'user_id' => $users->random()->id,
            ]);
        }
    }
}