<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateOrderlistProductsTable extends Migration
{
    public function up()
    {
        Schema::create('orderlist_products', function (Blueprint $table) {
            $table->unsignedBigInteger('orderlist_id');
            $table->unsignedBigInteger('products_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orderlist_products');
    }
}