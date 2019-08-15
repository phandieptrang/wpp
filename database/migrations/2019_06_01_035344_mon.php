<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mon',function(Blueprint $table)
        {
            $table->increments('ma_mon');
            $table->string('ten_mon',50);
            $table->unsignedInteger('ma_chuyen_nganh');
            $table->unsignedInteger('luong_tung_mon');
            $table->unsignedInteger('thoi_gian_dinh_muc');
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
        Schema::drop('mon');
    }
}
