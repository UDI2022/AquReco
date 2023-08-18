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
            $table->unsignedBigInteger('fish_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orderlist_fish');
    }
}