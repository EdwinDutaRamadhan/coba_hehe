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
        Schema::create('brand', function (Blueprint $table) {
            $table->id('brand_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('content_type')->nullable();
            $table->string('graphic_source')->nullable();
            $table->integer('graphic_upload_id')->nullable();
            $table->text('graphic_link')->nullable();
            $table->text('graphic_description')->nullable();
            $table->integer('banner_image')->nullable();
            $table->integer('icon')->nullable();
            $table->string('iud_status',1);
            $table->string('code')->nullable()->default(null);
            $table->integer('priority')->nullable();
            $table->string('flag_os',1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand');
    }
};
