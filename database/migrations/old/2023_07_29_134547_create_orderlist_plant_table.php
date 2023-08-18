<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderlistPlantTable extends Migration
{
    public function up()
    {
        Schema::create('orderlist_plant', function (Blueprint $table) {
            $table->unsignedBigInteger('orderlist_id');
            $table->foreign('orderlist_id')->references('id')->on('orderlists')->onDelete('cascade');
            $table->unsignedBigInteger('plant_id');
            $table->foreign('plant_id')->references('id')->on('plant')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orderlist_plant');
    }
}