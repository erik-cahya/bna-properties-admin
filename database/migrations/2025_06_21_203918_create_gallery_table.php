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
        Schema::create('property_gallery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('properties_id')->comment('fk to properties table');
            $table->text('description')->nullable();
            $table->timestamps();

            // Foreign Key Constraint with ON DELETE CASCADE
            $table->foreign('properties_id')->references('id')->on('properties')->onDelete('cascade');
        });

        Schema::create('property_gallery_image', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('gallery_id')->unsigned()->index()->nullable();
            $table->foreign('gallery_id')->references('id')->on('property_gallery')->onDelete('cascade');

            $table->string('image_path');
            $table->string('caption')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_gallery');
        Schema::dropIfExists('property_gallery_image');
    }
};
