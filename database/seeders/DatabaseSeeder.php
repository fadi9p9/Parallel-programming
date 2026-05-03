<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CitySeeder::class,
            MediaSeeder::class,
            WarehouseSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
            // RoleSeeder::class,
            // PermissionSeeder::class,
            // FunctionalityPermissionSeeder::class,
            // UserRoleSeeder::class,
            // RolesPermissionSeeder::class,
            // RolesFunctionalityPermissionSeeder::class,
            // FunctionalityPermissionsPermissionSeeder::class,
            ProductMediaSeeder::class,
            ProductCategorySeeder::class,
            StockSeeder::class,
            UserAddressSeeder::class,
            UserOtpSeeder::class,
            CartSeeder::class,
            CartItemSeeder::class,
            DeliveryFeeSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            PaymentSeeder::class,
            OrderTrackingSeeder::class,
            InventoryLogSeeder::class,
            NotificationTypeSeeder::class,
            NotificationSeeder::class,
            NotificationUserSeeder::class,
            UserNotificationSettingSeeder::class,
            NotificationTargetSeeder::class,
            // SalesReportsCacheSeeder::class,
            UserSessionSeeder::class,
            LoginAttemptSeeder::class,
            PerformanceLogSeeder::class,
        ]);
    }
}