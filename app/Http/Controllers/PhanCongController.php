<?php 
namespace App\Http\Controllers;

use Request;
use App\Model\ChuyenNganh;
use App\Model\Mon;
use App\Model\GiangVien;
use App\Model\Lop;
use App\Model\PhanCong;
use DB;
use Session;
/**
 * 
 */
class PhanCongController extends Controller
{
	private $folder = 'phan_cong';

	public function view_all()
	{
		$phan_cong = new PhanCong();
		$array_phan_cong = $phan_cong->get_all();
		return view("$this->folder.view_all",[
			'array_phan_cong' => $array_phan_cong
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

	public function get_mon_by_chuyen_nganh()
	{
		$mon = new Mon();
		$mon->ma_chuyen_nganh = Request::get('ma_chuyen_nganh');
		$array_mon = $mon->get_all_mon_by_chuyen_nganh();

		return $array_mon;
	}

	public function get_lop_by_chuyen_nganh()
	{
		$lop = new Lop();
		$lop->ma_chuyen_nganh = Request::get('ma_chuyen_nganh');
		$array_lop = $lop->get_all_lop_by_chuyen_nganh();
		return $array_lop;
	}

	public function get_giang_vien_by_chuyen_nganh()
	{
		$giang_vien = new GiangVien();
		$giang_vien->ma_chuyen_nganh = Request::get('ma_chuyen_nganh');
		$array_giang_vien = $giang_vien->get_all_giang_vien_by_chuyen_nganh();
		
		return $array_giang_vien;
	}

	public function process_insert()
	{
		$phan_cong = new PhanCong();
		
		$phan_cong->ma_chuyen_nganh = Request::get('ma_chuyen_nganh');
		$phan_cong->ma_lop = Request::get('ma_lop');
		$phan_cong->ma_mon = Request::get('ma_mon');
		$phan_cong->ma_giang_vien = Request::get('ma_giang_vien');
		$phan_cong->thoi_gian_dinh_muc_mon = Request::get('thoi_gian_dinh_muc_mon');
		$phan_cong->insert();

		return redirect()->route('phan_cong.view_all');
	}

	public function view_update()
	{
		$phan_cong = new PhanCong();
		$phan_cong->ma_giang_vien = Request::get('ma');
		$phan_cong = $phan_cong->get_one();

		$chuyen_nganh       = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();

		$mon = new Mon();
		$array_mon = $mon->get_all();

		$giang_vien = new GiangVien();
		$array_giang_vien = $giang_vien->get_all();

		$lop = new Lop();
		$array_lop = $lop->get_all();

		return view("$this->folder.view_update",['phan_cong'=>$phan_cong,'array_chuyen_nganh'=>$array_chuyen_nganh,'array_mon'=>$array_mon,'array_lop'=>$array_lop,'array_giang_vien'=>$array_giang_vien]);
	}

	public function process_update()
	{
		$phan_cong = new PhanCong();
		$phan_cong->ma_giang_vien = Request::get('ma_giang_vien');
		$phan_cong->ma_mon = Request::get('ma_mon');
		$phan_cong->ma_lop = Request::get('ma_lop');
		$phan_cong->thoi_gian_dinh_muc_mon = Request::get('thoi_gian_dinh_muc_mon');
		$phan_cong->update_phan_cong();
			
		return redirect()->route('phan_cong.view_all');
	}

	public function bang_phan_cong_giang_vien(){
		$phan_cong = new PhanCong();
		$phan_cong->ma_giang_vien = Request::get("ma_giang_vien");
		$array_phan_cong = $phan_cong->get_all_by_ma_giang_vien();
		return view("$this->folder.view_phan_cong_giang_vien",[
			'array_phan_cong' => $array_phan_cong
		]);
	}
}