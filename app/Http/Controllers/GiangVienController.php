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
class GiangVienController extends Controller
{
	public function view_list_he_so()
	{
		$giang_vien = new GiangVien();
		$array_giang_vien = $giang_vien->get_all();

		return view('giang_vien.view_list_he_so',[
			'array_giang_vien'=>$array_giang_vien
		]);
	}
	public function trang_chu_giang_vien()
	{
		return view('giang_vien.trang_chu_giang_vien');
	}
	public function login_giang_vien()
	{
		return view("giang_vien.login_giang_vien");
	}
	public function process_login_giang_vien(){
		$giang_vien = new GiangVien();
		$giang_vien->ten_dang_nhap = Request::get('ten_dang_nhap');
		$giang_vien->ma_dang_nhap = Request::get('ma_dang_nhap');
		$giang_vien = $giang_vien->get_login_giang_vien();

		if(count($giang_vien)==1){
			Session::put('ma_dang_nhap_giang_vien',$giang_vien[0]->ma_dang_nhap);
			Session::put('ten_dang_nhap_giang_vien',$giang_vien[0]->ten_dang_nhap);
			Session::put('ma_giang_vien',$giang_vien[0]->ma_giang_vien);
			return redirect()->route('giang_vien.trang_chu_giang_vien');
		}
		else{
			return redirect()->route('login_giang_vien')->with('error','Đăng nhập sai. Vui lòng thử lại!');
		}
	}
	public function logout_giang_vien()
	{
		Session::flush();
		return redirect()->route('giang_vien.login_giang_vien');
	}
}