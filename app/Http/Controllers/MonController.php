<?php 
namespace App\Http\Controllers;

use Request;
use App\Model\ChuyenNganh;
use App\Model\Mon;
/**
 * 
 */
class MonController extends Controller
{
	private $folder = 'mon';
	public function view_all()
	{
		$mon 		= new Mon();
		$array_mon  = $mon->get_all();
		return view("$this->folder.view_all",[
			'array_mon' => $array_mon
		]);
	}
	public function view_insert()
	{
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();
		return view("$this->folder.view_insert",[
			'array_chuyen_nganh' => $array_chuyen_nganh
		]);
	}
	public function process_insert()
	{
		$mon = new Mon();
		$mon->ten_mon = Request::get('ten_mon');
		$mon->ma_chuyen_nganh = Request::get('ma_chuyen_nganh');
		$mon->luong_tung_mon = Request::get('luong_tung_mon');
		$mon->thoi_gian_dinh_muc = Request::get('thoi_gian_dinh_muc');
		$mon->insert();

		return redirect()->route('mon.view_all');
	}

	public function view_update()
	{
		$mon                = new Mon();
		$mon->ma_mon 		 = Request::get("ma");
		$mon                = $mon->get_one();
		$chuyen_nganh       = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();

		return view("$this->folder.view_update",[
			'mon' => $mon,
			'array_chuyen_nganh' => $array_chuyen_nganh
		]);
	}
	public function process_update()
	{

		$mon                	 = new Mon();
		$mon->ma_mon 		     = Request::get('ma_mon');
		$mon->ten_mon			 = Request::get('ten_mon');
		$mon->ma_chuyen_nganh    = Request::get('ma_chuyen_nganh');
		$mon->luong_tung_mon     = Request::get('luong_tung_mon');
		$mon->thoi_gian_dinh_muc = Request::get('thoi_gian_dinh_muc');
		$mon->update_mon();
			
		return redirect()->route('mon.view_all');
	}
}
