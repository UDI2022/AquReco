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
        Schema::create('plant', function (Blueprint $table) {
            $table->increments('control_id')->unsigned();
            $table->integer('family');
            $table->string('name');
            $table->integer('forground');
            $table->integer('midground');
            $table->integer('background');
            $table->integer('difficulty');
            $table->integer('light');
            $table->integer('temp');
            $table->integer('co2');
            $table->integer('other');
            $table->integer('tropical');
            $table->integer('japanese');
            $table->integer('goldfish');
            $table->integer('betta');
            $table->integer('killifish');
            $table->integer('ph');
            $table->integer('length');
            $table->timestamps();
        });

        // Set the range of control_id
        DB::statement('ALTER TABLE stone AUTO_INCREMENT = 40000');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant');
    }
};
