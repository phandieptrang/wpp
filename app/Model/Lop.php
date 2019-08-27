<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Lop extends Model
{
	public $table = 'lop';
    public function get_all()
    {
    	$array_lop = DB::select("select*from $this->table");
    	return $array_lop;	
    }
    public function get_all_lop_by_chuyen_nganh()
    {
        $array = DB::select("select * from $this->table
            where ma_chuyen_nganh = ?",[
                $this->ma_chuyen_nganh
            ]);
        return $array;
    }
}