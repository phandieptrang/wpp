<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhanCong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phan_cong',function(Blueprint $table)
        {
            $table->unsignedInteger('ma_giang_vien');
            $table->unsignedInteger('ma_mon');
            $table->unsignedInteger('ma_lop');
            $table->float('thoi_gian_dinh_muc')->unsigned();
            $table->foreign('ma_giang_vien')->references('ma_giang_vien')->on('giang_vien');
            $table->foreign('ma_mon')->references('ma_mon')->on('mon');
            $table->foreign('ma_lop')->references('ma_lop')->on('lop');
            $table->primary(['ma_mon','ma_lop','ma_giang_vien']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('phan_cong');
    }
}
