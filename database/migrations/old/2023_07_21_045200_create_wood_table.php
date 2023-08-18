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
        Schema::create('wood', function (Blueprint $table) {
            $table->increments('control_id')->unsigned()->unique();
            $table->string('size');
            $table->string('upper');
            $table->string('lower');
            $table->integer('layoutcost');
            $table->integer('fishcost');
            $table->string('name');
            $table->integer('price');
            $table->timestamps();
        });
        // Set the range of control_id
        DB::statement('ALTER TABLE stone AUTO_INCREMENT = 30000');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wood');
    }
};
