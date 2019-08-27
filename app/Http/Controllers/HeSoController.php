<?php
namespace App\Http\Controllers;

use Request;
use App\Model\GiangVien;

/**
 * 
 */
class HeSoController extends Controller
{
	public function view_all()
	{
		$giang_vien = new GiangVien();
		$array_giang_vien = $giang_vien->get_all();
		return view('view_list_he_so',['array_giang_vien'=>$array_giang_vien]);
	}
	public function view_sua_he_so()
	{
		return view('sua_he_so');
	}
}