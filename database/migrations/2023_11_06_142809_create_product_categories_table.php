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
        Schema::create('product_category', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('name');
            $table->string('background_hex_code')->nullable();
            $table->integer('upload_id')->nullable()->default(0);
            $table->integer('nesting_level');
            $table->integer('parent_id')->nullable();
            $table->integer('position')->nullable();
            $table->string('iud_status',1);
            $table->string('code')->nullable()->default(null);
            $table->timestamps();
            $table->integer('is_adult_category')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_category');
    }
};
