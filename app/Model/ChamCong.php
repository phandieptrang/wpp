<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * 
 */
class ChamCong extends Model
{
	public $table = 'cham_cong';
	public function get_all()
	{
		$array_cham_cong = DB::select("select*from cham_cong join giang_vien on giang_vien.ma_giang_vien = cham_cong.ma_giang_vien join mon on mon.ma_mon = cham_cong.ma_mon ORDER by ngay ");
		// WHERE month(ngay) = (SELECT month(now()))
		return $array_cham_cong;
	}
	public function get_all_by_search()
	{
		$array_cham_cong = DB::select("select*from cham_cong 
			join giang_vien on giang_vien.ma_giang_vien = cham_cong.ma_giang_vien 
			join mon on mon.ma_mon = cham_cong.ma_mon
			where cham_cong.ma_mon like '%?%' and cham_cong.ma_lop like '%?%' and ngay like '%?%' 
			ORDER by ngay",[
			$this->ma_mon,
			$this->ma_lop,
			$this->ngay
		]);
		return $array_cham_cong;
	}
	public function insert()
    {
		$ngay=date('Y-m-d');
		DB::insert("insert into $this->table(ngay, ma_giang_vien, ma_mon, ma_lop,so_h_lam) values ('$ngay',$this->ma_giang_vien,$this->ma_mon,$this->ma_lop,$this->so_h_lam)");
    }
    public function update_cham_cong()
    {
    	DB::update("update $this->table set so_h_lam = ? where ma_giang_vien = ? and ngay = ?",[
            $this->so_h_lam,
            $this->ma_giang_vien,
            $this->ngay
        ]);
    }
}