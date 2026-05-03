<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notification_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notification_id')->nullable()->constrained('notifications');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->boolean('is_read')->default(false);
            $table->timestamp('read_at')->nullable();
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notification_users');
    }
};