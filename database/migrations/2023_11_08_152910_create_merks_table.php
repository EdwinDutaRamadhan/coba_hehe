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
        Schema::create('merk', function (Blueprint $table) {
            $table->id('merk_id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('content_type')->nullable();
            $table->string('graphic_source')->nullable();
            $table->integer('graphic_upload_id')->nullable();
            $table->text('graphic_link')->nullable();
            $table->text('graphic_description')->nullable();
            $table->integer('banner_image')->nullable();
            $table->integer('icon')->nullable();
            $table->string('iud_status',1)->nullable();
            $table->string('code')->nullable();
            $table->integer('brand_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merk');
    }
};
