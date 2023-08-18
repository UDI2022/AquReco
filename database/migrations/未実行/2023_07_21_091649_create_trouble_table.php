<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trouble', function (Blueprint $table) {
            $table->increments('trouble_id')->unsigned();
            $table->string('trouble');
            $table->string('content');
            $table->string('comment');
            $table->unsignedBigInteger('control_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trouble');
    }
};
