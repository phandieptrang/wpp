<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop',function(Blueprint $table)
        {
            $table->increments('ma_lop');
            $table->string('ten_lop',50);
            $table->unsignedInteger('ma_chuyen_nganh');
            $table->foreign('ma_chuyen_nganh')->references('ma_chuyen_nganh')->on('chuyen_nganh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lop');
    }
}
