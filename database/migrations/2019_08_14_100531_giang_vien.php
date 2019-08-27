<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GiangVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giang_vien', function (Blueprint $table) {
            $table->increments('ma_giang_vien');
            $table->string('ten_giang_vien',50);
            $table->string('ten_dang_nhap',50);
            $table->string('ma_dang_nhap',50);
            $table->unsignedInteger('ma_chuyen_nganh');
            $table->foreign('ma_chuyen_nganh')->references('ma_chuyen_nganh')->on('chuyen_nganh');
            $table->unsignedInteger('he_so');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('giang_vien');
    }
}
