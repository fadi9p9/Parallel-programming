<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Warehouse;
use App\Models\NotificationType;
use App\Models\NotificationTarget;
use App\Enum\NotificationTargetsTargetTypeEnum;
use Illuminate\Database\Seeder;

class NotificationTargetSeeder extends Seeder
{
    public function run(): void
    {
        $notificationTypes = NotificationType::all();
        $users = User::all();
        $warehouses = Warehouse::all();

        if ($users->isEmpty()) {
            return;
        }

        foreach ($notificationTypes as $type) {
            foreach (range(1, fake()->numberBetween(1, 3)) as $i) {
                $availableTypes = [
                    NotificationTargetsTargetTypeEnum::USER->value,
                ];

                if ($warehouses->isNotEmpty()) {
                    $availableTypes[] = NotificationTargetsTargetTypeEnum::WAREHOUSE->value;
                }

                $targetType = fake()->randomElement($availableTypes);

                $targetId = match ($targetType) {
                    NotificationTargetsTargetTypeEnum::USER->value => $users->random()->id,
                    NotificationTargetsTargetTypeEnum::WAREHOUSE->value => $warehouses->random()->id,
                    default => $users->random()->id,
                };

                NotificationTarget::factory()->create([
                    'notification_type_id' => $type->id,
                    'target_type' => $targetType,
                    'target_id' => $targetId,
                ]);
            }
        }
    }
}