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
        Schema::create('store', function (Blueprint $table) {
            $table->id('store_id');
            $table->string('name');
            $table->string('store_code');
            $table->string('address');
            $table->integer('location_id')->nullable();
            $table->integer('main_warehouse')->default(0);
            $table->string('phone_number')->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->string('iud_status',1)->default('d');
            $table->integer('plastic_product_id')->nullable();
            $table->string('branch_code')->nullable();
            $table->integer('enable_deficit')->nullable();
            $table->string('org_area_coordinator_nik')->nullable();
            $table->string('org_area_manager_nik')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store');
    }
};
