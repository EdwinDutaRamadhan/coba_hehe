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
        Schema::create('product', function (Blueprint $table) {
            $table->id('product_id');
            $table->integer('parent_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('preorder_category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('contain_aerosol')->default(0);
            $table->string('name')->nullable();
            $table->string('avatar')->nullable();
            $table->text('description')->nullable();
            $table->text('perawatan')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('size_id')->nullable();
            $table->string('sku')->nullable();
            $table->string('plu')->nullable();
            $table->integer('price')->nullable();
            $table->integer('weight')->nullable();
            $table->float('rate')->nullable();
            $table->string('badge_text')->nullable();
            $table->integer('badge')->nullable();
            $table->text('shelf_location')->nullable();
            $table->text('size_guide')->nullable();
            $table->integer('current_discount')->nullable();
            $table->string('discount_type')->nullable();
            $table->integer('discount_id')->nullable();
            $table->timestamp('discount_start_period')->nullable();
            $table->timestamp('discount_end_period')->nullable();
            $table->integer('is_active')->default(0);
            $table->string('iud_status',1);
            $table->integer('threshold')->nullable();
            $table->unsignedInteger('merk_id')->nullable();
            $table->string('info_promo_pas')->nullable();
            $table->string('flag_company',1)->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
