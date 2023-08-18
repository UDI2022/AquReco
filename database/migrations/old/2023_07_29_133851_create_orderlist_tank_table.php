<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderlistTankTable extends Migration
{
    public function up()
    {
        Schema::create('orderlist_tank', function (Blueprint $table) {
            $table->unsignedBigInteger('orderlist_id');
            $table->foreign('orderlist_id')->references('id')->on('orderlists')->onDelete('cascade');
            $table->unsignedBigInteger('tank_id');
            $table->foreign('tank_id')->references('id')->on('tank')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orderlist_tank');
    }
}
