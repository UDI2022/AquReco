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
５. orderlist_fish（中間リスト）

bash
Copy code
php artisan make:migration create_orderlist_fish_table --create=orderlist_fish
php
Copy code
// database/migrations/2023_07_26_000005_create_orderlist_fish_table.php

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
６. orderlist_products（中間リスト）

bash
Copy code
php artisan make:migration create_orderlist_products_table --create=orderlist_products
php
Copy code
// database/migrations/2023_07_26_000006_create_orderlist_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderlistProductsTable extends Migration
{
    public function up()
    {
        Schema::create('orderlist_products', function (Blueprint $table) {
            $table->unsignedBigInteger('orderlist_id');
            $table->foreign('orderlist_id')->references('id')->on('orderlists')->onDelete('cascade');
            $table->unsignedBigInteger('products_id');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orderlist_products');
    }
}