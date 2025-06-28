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
            $table->string('region');
            $table->string('sub_region');
            $table->text('address');
            $table->string('type_properties');
            $table->integer('number_bedroom');
            $table->integer('number_bathroom');
            $table->float('properties_size');
            $table->integer('year_build');
            $table->integer('max_people');
            $table->decimal('price_idr', 18, 2);
            $table->decimal('price_usd', 18, 2);
            $table->text('status_listing');

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
