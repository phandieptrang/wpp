<?php
namespace App\Http\Controllers;

use Request;
use App\Model\Luong;
use Session;
class LuongController extends Controller
{
    public function xem_luong_giang_vien(){
        $luong = new Luong();
        $luong->ma_giang_vien = Session::get('ma_giang_vien');
        $array_luong = $luong->lay_luong_giang_vien();
        return view('luong.xem_luong', ['array_luong'=>$array_luong]);
    }
}
