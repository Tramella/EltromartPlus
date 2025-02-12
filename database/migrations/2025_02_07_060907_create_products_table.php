<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_name");
            $table->unsignedBigInteger("cate_id");
            $table->unsignedBigInteger("brand_id");
            $table->unsignedBigInteger("color_id");
            $table->string('product_img');
            $table->decimal('regular_price');
            $table->decimal('sale_price');
            $table->integer('quantity');
            $table->string('materials');
            $table->string('type');
            $table->string('storage');
            $table->string('RAM');
            $table->integer('quantity_sold');
            $table->string('status');
            $table->text('descriptions');
            $table->timestamps();
            // Tạo khóa ngoại
            $table->foreign('cate_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');
            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
