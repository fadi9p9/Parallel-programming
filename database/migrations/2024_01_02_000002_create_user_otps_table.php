<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enum\UserOtpsTypeEnum;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_otps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('otp_code', 10);
            $table->tinyInteger('type')->default(UserOtpsTypeEnum::PHONE_VERIFICATION->value);
            $table->timestamp('expires_at');
            $table->timestamp('verified_at')->nullable();
            $table->boolean('is_used')->default(false);
            $table->integer('attempts')->default(0);
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['user_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_otps');
    }
};