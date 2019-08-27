<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Luong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luong',function(Blueprint $table)
        {
            $table->unsignedInteger('thang');
            $table->unsignedInteger('nam');
            $table->integer('ma_giang_vien')->unsigned();
            $table->foreign('ma_giang_vien')->references('ma_giang_vien')->on('giang_vien');
            $table->float('so_gio_lam')->unsigned();
            $table->unsignedInteger('luong');
            $table->primary(['thang','nam','ma_giang_vien']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('luong');
    }
}
