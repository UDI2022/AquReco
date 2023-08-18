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
        Schema::create('orderlist', function (Blueprint $table) {
            $table->id('orderlist_id');
            $table->unsignedBigInteger('user_id');
            $table->string('ordernumber');
            $table->string('email');
            $table->unsignedBigInteger('control_id');
            $table->boolean('flag');
            $table->string('title');
            $table->text('comment');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('User_ID')->references('user_id')->on('user');
            $table->foreign('Control_ID')->references('stone_id')->on('stone');
            $table->foreign('Control_ID')->references('tank_id')->on('tank');
            $table->foreign('Control_ID')->references('plant_id')->on('plant');
            $table->foreign('Control_ID')->references('fish_id')->on('fish');
            $table->foreign('Control_ID')->references('products_id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderlist');
    }
};
