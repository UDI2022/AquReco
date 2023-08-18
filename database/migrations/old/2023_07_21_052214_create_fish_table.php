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
        Schema::create('fish', function (Blueprint $table) {
            $table->increments('control_id')->unsigned();
            $table->integer('family');
            $table->string('category');
            $table->integer('name');
            $table->integer('size');
            $table->integer('cost');
            $table->integer('caution');
            $table->integer('ph');
            $table->integer('feed');
            $table->string('point');
        });
        // Set the range of control_id
        DB::statement('ALTER TABLE stone AUTO_INCREMENT = 50000');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fish');
    }
};
