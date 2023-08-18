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
        Schema::create('noticetovisit', function (Blueprint $table) {
            $table->increments('NtV_id')->unsigned();
            $table->integer('call');
            $table->integer('time');
            $table->integer('delete');
            $table->integer('shop');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticetovisit');
    }
};
