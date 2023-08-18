<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderlistStoneTable extends Migration
{
    public function up()
    {
        Schema::create('orderlist_stone', function (Blueprint $table) {
            $table->unsignedBigInteger('orderlist_id');
            $table->unsignedBigInteger('stone_id');
            
            // 外部キー制約を設定
            $table->foreign('orderlist_id')->references('id')->on('orderlists')->onDelete('cascade');
            $table->foreign('stone_id')->references('id')->on('stone')->onDelete('cascade');
            
            $table->primary(['orderlist_id', 'stone_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('orderlist_stone');
    }
}