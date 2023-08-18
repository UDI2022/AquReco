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
        Schema::create('favorite', function (Blueprint $table) {
            $table->id('favorite_id');
            $table->string('email');
            $table->unsignedBigInteger('control_id');
            $table->timestamps();

            // Ensure that the control_id exists in one of stone, tank, plant, fish, or products.
            $table->foreign('control_id')->references('stone_id')->on('stone')->onDelete('cascade');
            $table->foreign('control_id')->references('tank_id')->on('tank')->onDelete('cascade');
            $table->foreign('control_id')->references('plant_id')->on('plant')->onDelete('cascade');
            $table->foreign('control_id')->references('fish_id')->on('fish')->onDelete('cascade');
            $table->foreign('control_id')->references('products_id')->on('products')->onDelete('cascade');

            // Associate with the 'email' column in the User table
            $table->foreign('email')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite');
    }
};
