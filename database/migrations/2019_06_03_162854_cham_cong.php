<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChamCong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cham_cong', function(Blueprint $table)
        {
            $table->date('ngay');
            $table->unsignedInteger('ma_giang_vien');
            $table->unsignedInteger('ma_mon');
            $table->unsignedInteger('ma_lop');
            $table->float('so_gio_lam')->unsigned();
            $table->primary(['ngay','ma_giang_vien','ma_lop','ma_mon']);
            $table->foreign('ma_giang_vien')->references('ma_giang_vien')->on('giang_vien');
            $table->foreign('ma_mon')->references('ma_mon')->on('mon');
            $table->foreign('ma_lop')->references('ma_lop')->on('lop');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cham_cong');
    }
}
