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
            $table->foreign('orderlist_id')->references('id')->on('orderlists')->onDelete('cascade');
            $table->unsignedBigInteger('wood_id');
            $table->foreign('wood_id')->references('id')->on('wood')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orderlist_wood');
    }
}
