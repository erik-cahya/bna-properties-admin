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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->comment('fk to table customers');
            $table->unsignedBigInteger('properties_id')->comment('fk to table properties');
            $table->date('start_date')->required();
            $table->date('end_date')->required();
            $table->decimal('dp_amount', 18, 2)->nullable();
            $table->string('dp_status')->default('No DP')->required();
            $table->string('status')->required();
            $table->timestamps();


            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('properties_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
