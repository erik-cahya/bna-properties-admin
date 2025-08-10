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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->text('properties_code');
            $table->string('properties_name');
            $table->text('slug');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('region_id');
            $table->foreignId('region_id')->references('id')->on('regions');
            $table->text('address')->nullable();
            $table->string('type_properties')->nullable();
            $table->integer('number_bedroom')->nullable();
            $table->integer('number_bathroom')->nullable();
            $table->float('properties_size')->nullable();
            $table->integer('year_build')->nullable();
            $table->integer('max_people')->nullable();
            $table->decimal('price_idr', 18, 2)->nullable();
            $table->decimal('price_usd', 18, 2)->nullable();
            $table->text('status_listing')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
