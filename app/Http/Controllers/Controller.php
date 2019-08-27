<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Request;
use App\Model\GiaoVu;
use App\Model\ChuyenNganh;
use App\Model\GiangVien;
use Session;
use DB;

class Controller extends BaseController
{
	public function view_login()
	{
		return view('view_login');
	}
	public function process_login()
	{
		$giao_vu = new GiaoVu();
		$giao_vu->ten_dang_nhap = Request::get('ten_dang_nhap');
		$giao_vu->ma_dang_nhap = Request::get('ma_dang_nhap');
		$giao_vu = $giao_vu->get_login();

		if(count($giao_vu)==1){
			Session::put('ma_dang_nhap',$giao_vu[0]->ma_dang_nhap);
			Session::put('ten_dang_nhap',$giao_vu[0]->ten_dang_nhap);
			return redirect()->route('backHome');
		}

		else{
			return redirect()->route('view_login')->with('error','Đăng nhập sai. Vui lòng thử lại!');
		}

	}
	
	public function redirect()
	{
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();
		return view('chuyen_nganh.view_all',['array_chuyen_nganh'=>$array_chuyen_nganh]);
	}
	public function logout()
	{
		Session::flush();
		return redirect()->route('view_login');
	}
	public function back_home()
	{
        return view('trangchu');
	} 
}

