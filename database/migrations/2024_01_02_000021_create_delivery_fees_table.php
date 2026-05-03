<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enum\DeliveryFeesDeliveryTypeEnum;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('delivery_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->tinyInteger('delivery_type')->default(DeliveryFeesDeliveryTypeEnum::STANDARD->value);
            $table->decimal('fee', 12, 2);
            $table->integer('estimated_days')->nullable();
            $table->boolean('is_active')->default(true);
            $table->text('note')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delivery_fees');
    }
};