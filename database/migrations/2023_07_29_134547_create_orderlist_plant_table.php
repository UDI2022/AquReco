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
            $table->unsignedBigInteger('plant_id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('orderlist_plant');
    }
}