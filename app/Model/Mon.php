<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Mon extends Model
{
	public $table = 'mon';
    public function get_all()
    {
    	$array_mon = DB::select("select*from $this->table join chuyen_nganh on chuyen_nganh.ma_chuyen_nganh = $this->table.ma_chuyen_nganh");
    	return $array_mon;
    }
    public function insert()
    {
    	DB::insert("insert into $this->table(ten_mon,ma_chuyen_nganh,luong_tung_mon,thoi_gian_dinh_muc) values (?,?,?,?)",[$this->ten_mon,$this->ma_chuyen_nganh,$this->luong_tung_mon,$this->thoi_gian_dinh_muc]);
    }
    public function get_one()
    {
        $array = DB::select("select * from $this->table
            join chuyen_nganh on $this->table.ma_chuyen_nganh = chuyen_nganh.ma_chuyen_nganh
            where ma_mon = ?
            limit 1",[$this->ma_mon]);
        return $array[0];
    }
    public function update_mon()
    {
       DB::update("update $this->table set ten_mon=?,ma_chuyen_nganh=?,luong_tung_mon=?,thoi_gian_dinh_muc=? where ma_mon = ?",[
            $this->ten_mon,
            $this->ma_chuyen_nganh,
            $this->luong_tung_mon,
            $this->thoi_gian_dinh_muc,
            $this->ma_mon
        ]);
       
    }
    public function get_all_mon_by_chuyen_nganh()
    {
        $array = DB::select("select * from $this->table
            where ma_chuyen_nganh = ?",[
                $this->ma_chuyen_nganh
            ]);
        return $array;
    }
}
