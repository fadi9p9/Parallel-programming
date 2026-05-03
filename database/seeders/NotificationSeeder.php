<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Notification;
use App\Models\NotificationType;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $notificationTypes = NotificationType::all();

        foreach ($users->random(30) as $user) {
            Notification::factory()->count(fake()->numberBetween(1, 5))->create([
                'notification_type_id' => $notificationTypes->random()->id,
                'notifiable_type' => 'App\\Models\\User',
                'notifiable_id' => $user->id,
            ]);
        }
    }
}