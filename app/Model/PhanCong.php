<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class PhanCong extends Model
{
	public $table = 'phan_cong';
    public function get_all()
    {
    	$array_phan_cong = DB::select("select*from $this->table join mon on mon.ma_mon = $this->table.ma_mon join lop on lop.ma_lop = $this->table.ma_lop join giang_vien on giang_vien.ma_giang_vien = $this->table.ma_giang_vien");
    	return $array_phan_cong;
    }
    public function insert()
    {
    	DB::insert("insert into $this->table(ma_giang_vien,ma_mon,ma_lop,thoi_gian_dinh_muc_mon) values (?,?,?,?)",[$this->ma_giang_vien,$this->ma_mon,$this->ma_lop,$this->thoi_gian_dinh_muc_mon]);
    }
    public function get_one()
    {
        $array = DB::select("select*from $this->table where ma_giang_vien=? limit 1",[
            $this->ma_giang_vien
        ]);
        return $array[0];
    }
    public function update_phan_cong()
    {
        DB::update("update $this->table set ma_giang_vien=?,thoi_gian_dinh_muc_mon=? where ma_mon = ? and ma_lop=?",[
            $this->ma_giang_vien,
            $this->thoi_gian_dinh_muc_mon,
            $this->ma_mon,
            $this->ma_lop
        ]);
    }
    public function get_all_by_ma_giang_vien()
    {
    	$array_phan_cong = DB::select("select*from $this->table join mon on mon.ma_mon = $this->table.ma_mon join lop on lop.ma_lop = $this->table.ma_lop join giang_vien on giang_vien.ma_giang_vien = $this->table.ma_giang_vien where phan_cong.ma_giang_vien = ?",[
            Session::get('ma_giang_vien')
        ]);
    	return $array_phan_cong;
    }
    
}
