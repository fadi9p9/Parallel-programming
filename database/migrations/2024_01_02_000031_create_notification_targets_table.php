<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notification_targets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('notification_type_id')->nullable();
            $table->tinyInteger('target_type')->nullable();
            $table->unsignedBigInteger('target_id')->nullable();
            $table->timestamps();

            $table->foreign('notification_type_id')->references('id')->on('notification_types')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notification_targets');
    }
};