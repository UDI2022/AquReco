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
        Schema::create('tank', function (Blueprint $table) {
            $table->increments('control_id')->unsigned()->unique();
            $table->integer('size')->unsigned();

            $table->integer('width');
            $table->integer('depth');
            $table->integer('height');
            $table->decimal('waterrate', 3, 2)->default(0.8);
            $table->integer('woodcost')->default(0);
            $table->integer('stonecost')->default(0);
            $table->integer('fishcost')->default(0);
            $table->string('name');
            $table->integer('price');
            $table->timestamps();
        });
        // Set the range of control_id
        DB::statement('ALTER TABLE stone AUTO_INCREMENT = 10000');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tank');
    }
};
