<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_notification_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('notification_type_id');
            $table->boolean('is_enabled')->default(true);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('notification_type_id')->references('id')->on('notification_types')->onDelete('cascade');

            $table->unique(['user_id', 'notification_type_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_notification_settings');
    }
};