<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderlistFishTable extends Migration
{
    public function up()
    {
        Schema::create('orderlist_fish', function (Blueprint $table) {
            $table->unsignedBigInteger('orderlist_id');
            $table->foreign('orderlist_id')->references('id')->on('orderlists')->onDelete('cascade');
            $table->unsignedBigInteger('fish_id');
            $table->foreign('fish_id')->references('id')->on('fish')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orderlist_fish');
    }
}