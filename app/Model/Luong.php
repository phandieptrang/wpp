<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class Luong extends Model
{
    public $table = 'luong';
    public function lay_luong_giang_vien(){
        $luong_giang_vien = DB::select("select * from $this->table where ma_giang_vien = ?",[
            $this->ma_giang_vien
        ]);
       return $luong_giang_vien;
    }

    public function luong_giang_vien_da_xac_nhan(){
        $luong_giang_vien = DB::select("select * from $this->table where ma_giang_vien = ? and tinh_trang = 1",[
            $this->ma_giang_vien
        ]);
       return $luong_giang_vien;
    }
}
