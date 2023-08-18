<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderlistWoodTable extends Migration
{
    public function up()
    {
        Schema::create('orderlist_wood', function (Blueprint $table) {
            $table->unsignedBigInteger('orderlist_id');
            $table->unsignedBigInteger('wood_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orderlist_wood');
    }
}
