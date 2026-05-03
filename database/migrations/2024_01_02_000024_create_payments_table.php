<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enum\PaymentsMethodEnum;
use App\Enum\PaymentsStatusEnum;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->decimal('amount', 12, 2);
            $table->tinyInteger('method')->default(PaymentsMethodEnum::CASH_ON_DELIVERY->value);
            $table->tinyInteger('status')->default(PaymentsStatusEnum::PENDING->value);
            $table->string('transaction_ref', 255)->nullable();
            $table->char('currency_code', 3)->default('SYP');
            $table->text('note')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');

            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};