<?php
namespace App\Http\Controllers;

use Request;
use App\Model\GiangVien;
use App\Model\ChuyenNganh;
use App\Model\ChamCong;
use App\Model\Mon;
use App\Model\Lop;
use Session;

/**
 * 
 */
class ChamCongController extends Controller
{
	public function view_cham_cong()
	{
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();

		$lop = new Lop();
		$array_lop = $lop->get_all();

		$mon = new Mon();
		$array_mon = $mon->get_all();

		return view('cham_cong.view_cham_cong',[
			'array_lop'=>$array_lop,'array_mon'=>$array_mon,'array_chuyen_nganh'=>$array_chuyen_nganh
		]);
	}
	public function process_cham_cong()
	{
		$cham_cong = new ChamCong();
		$cham_cong->ngay = getdate();
		$cham_cong->ma_giang_vien = Session::get('ma_giang_vien');
		$cham_cong->ma_mon = Request::get('ma_mon');
		$cham_cong->ma_lop = Request::get('ma_lop');
		$cham_cong->so_h_lam = Request::get('so_h_lam');
		$cham_cong->insert();
		return view('');
	}
	public function xac_nhan_cham_cong()
	{
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();

		$cham_cong = new ChamCong();
		$array_cham_cong = $cham_cong->get_all();

		return view('cham_cong.xac_nhan_cham_cong',[
			'array_chuyen_nganh'=>$array_chuyen_nganh,
			'array_cham_cong'=>$array_cham_cong
		]);
	}
	public function get_cham_cong_by_search()
	{
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();

		$cham_cong = new ChamCong();
		$cham_cong->ngay = Request::get("ngay");
		$cham_cong->ma_mon = Request::get("ma_mon");
		$cham_cong->ma_lop = Request::get("ma_lop");
		$array_cham_cong = $cham_cong->get_all_by_search();

		return view('cham_cong.xac_nhan_cham_cong',[
			'array_chuyen_nganh'=>$array_chuyen_nganh,
			'array_cham_cong'=>$array_cham_cong
		]);
	}
	public function process_update_cham_cong(){
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();

		$cham_cong = new ChamCong();
		$cham_cong->so_h_lam = Request::get("so_h_lam");
		$cham_cong->ma_giang_vien = Request::get("ma");
		$cham_cong->ngay = Request::get("ngay");
		$cham_cong->update_cham_cong();

		return redirect()->route('cham_cong.xac_nhan_cham_cong');
	}
}