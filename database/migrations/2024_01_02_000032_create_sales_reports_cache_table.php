<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales_reports_cache', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->date('report_date');
            $table->tinyInteger('report_type');
            $table->decimal('total_sales', 14, 2)->nullable();
            $table->integer('total_orders')->nullable();
            $table->integer('total_customers')->nullable();
            $table->integer('total_products_sold')->nullable();
            $table->unsignedBigInteger('top_selling_product_id')->nullable();
            $table->unsignedBigInteger('top_selling_category_id')->nullable();
            $table->json('data')->nullable();
            $table->timestamps();

            $table->foreign('top_selling_product_id')->references('id')->on('products')->onDelete('set null');
            $table->foreign('top_selling_category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales_reports_cache');
    }
};