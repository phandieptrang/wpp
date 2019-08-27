<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * 
 */
class GiaoVu extends Model
{
	protected $table = 'giao_vu';
    public function get_login()
    {
    	$array = DB::select("select * from $this->table
    		where ten_dang_nhap = ? and ma_dang_nhap = ?",[
    			$this->ten_dang_nhap,
    			$this->ma_dang_nhap
    		]);
    	return $array;
    }
}