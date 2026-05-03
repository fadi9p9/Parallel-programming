<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('media_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_media');
    }
};