<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ChuyenNganh extends Model
{
	public $table = 'chuyen_nganh';
    public function get_all()
    {
    	$array_chuyen_nganh = DB::select("select*from $this->table");
    	return $array_chuyen_nganh;	
    }
    public function get_one()
    {
        $array_chuyen_nganh = DB::select("select*from $this->table join mon on mon.ma_chuyen_nganh = chuyen_nganh.ma_chuyen_nganh where ma_mon =? limited 1",[$this->ma_mon]);
        return $array_chuyen_nganh[0];
    }
     public function insert()
    {
    	DB::insert("insert into $this->table(ten_chuyen_nganh) values (?)",[$this->ten_chuyen_nganh]);
    }
}
