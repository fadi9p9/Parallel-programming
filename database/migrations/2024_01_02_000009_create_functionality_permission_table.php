<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('functionality_permission', function (Blueprint $table) {
            $table->unsignedBigInteger('functionality_permission_id');
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();

            $table->foreign('functionality_permission_id')->references('id')->on('functionality_permissions')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');

            $table->primary(['functionality_permission_id', 'permission_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('functionality_permission');
    }
};