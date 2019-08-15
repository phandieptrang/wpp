<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GiaoVu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giao_vu', function (Blueprint $table) {
            $table->increments('ma_giao_vu');
            $table->string('ten_dang_nhap',50);
            $table->string('ma_dang_nhap',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('giao_vu');
    }
}
