<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enum\OrdersStatusEnum;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('order_number')->unique();
            $table->tinyInteger('status')->default(OrdersStatusEnum::CREATED->value);
            $table->decimal('total_amount', 12, 2);
            $table->unsignedBigInteger('otp_id')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->decimal('subtotal_amount', 12, 2);
            $table->decimal('discount_total', 12, 2)->default(0);
            $table->decimal('grand_total', 12, 2);
            $table->unsignedBigInteger('delivery_fee_id')->nullable();
            $table->decimal('delivery_fee', 12, 2)->default(0);
            $table->unsignedBigInteger('delivery_address_id')->nullable();
            $table->string('idempotency_key', 255)->unique();
            $table->text('note')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->text('cancellation_reason')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('otp_id')->references('id')->on('user_otps')->onDelete('set null');
            $table->foreign('delivery_fee_id')->references('id')->on('delivery_fees')->onDelete('set null');
            $table->foreign('delivery_address_id')->references('id')->on('user_addresses')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');

            $table->index(['user_id', 'status']);
            $table->index('idempotency_key');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};