<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Middleware\checkLogin;

Route::group(['prefix' => 'giao_vu', 'middleware' => 'CheckGiaoVu'], function(){
	Route::group(['prefix'=>'mon'],function (){
		$group = 'mon';
		Route::get('view_all','MonController@view_all')->name("$group.view_all");
		Route::get('view_insert','MonController@view_insert')->name("$group.view_insert");
		Route::post('process_insert','MonController@process_insert')->name("$group.process_insert");
		Route::get('view_update','MonController@view_update')->name("$group.view_update");
		Route::post('process_update','MonController@process_update')->name("$group.process_update");
	});

	Route::group(['prefix'=>'chuyen_nganh'],function (){
		$group = 'chuyen_nganh';
		Route::get('view_all','ChuyenNganhController@view_all')->name("$group.view_all");
		Route::get('view_insert','ChuyenNganhController@view_insert')->name("$group.view_insert");
		Route::post('process_insert','ChuyenNganhController@process_insert')->name("$group.process_insert");
	});

	Route::group(['prefix'=>'phan_cong'],function (){
		$group = 'phan_cong';
		Route::get('view_all','PhanCongController@view_all')->name("$group.view_all");
		Route::get('view_insert','PhanCongController@view_insert')->name("$group.view_insert");
		Route::post('process_insert','PhanCongController@process_insert')->name("$group.process_insert");
		Route::get('view_update','PhanCongController@view_update')->name("$group.view_update");
		Route::post('process_update','PhanCongController@process_update')->name("$group.process_update");
		Route::get('get_mon_by_chuyen_nganh','PhanCongController@get_mon_by_chuyen_nganh')->name("$group.get_mon_by_chuyen_nganh");
		Route::get('get_lop_by_chuyen_nganh','PhanCongController@get_lop_by_chuyen_nganh')->name("$group.get_lop_by_chuyen_nganh");
		Route::get('get_giang_vien_by_chuyen_nganh','PhanCongController@get_giang_vien_by_chuyen_nganh')->name("$group.get_giang_vien_by_chuyen_nganh");
	});

	Route::group(['prefix'=>'cham_cong'],function(){
		$group = "cham_cong";
		Route::get('process_update_cham_cong','ChamCongController@process_update_cham_cong')->name("$group.process_update_cham_cong");
		Route::get('xac_nhan_cham_cong','ChamCongController@xac_nhan_cham_cong')->name("$group.xac_nhan_cham_cong");
		Route::get('get_cham_cong_by_search','ChamCongController@get_cham_cong_by_search')->name("$group.get_cham_cong_by_search");
	});

	Route::get('redirect','Controller@redirect')->name('redirect');
	Route::get('logout','Controller@logout')->name('logout');
	Route::get('back_home','Controller@back_home')->name('backHome');

});

Route::get('view_login','Controller@view_login')->name('view_login')->middleware(checkLogin::class);
Route::post('process_login','Controller@process_login')->name('process_login');

Route::group(['prefix' => 'giang_vien'], function (){
	//view chấm công
	Route::get('view_cham_cong','ChamCongController@view_cham_cong')->name("giang_vien.view_cham_cong");
	Route::post('process_cham_cong','ChamCongController@process_cham_cong')->name("giang_vien.process_cham_cong");
	//trang đăng nhập giảng viên
	Route::get('trang_chu_giang_vien', 'GiangVienController@trang_chu_giang_vien')->name("giang_vien.trang_chu_giang_vien");
	//login giảng viên
	Route::get('login_giang_vien', 'GiangVienController@login_giang_vien')->name("giang_vien.login_giang_vien");
	Route::post('process_login_giang_vien','GiangVienController@process_login_giang_vien')->name('giang_vien.process_login_giang_vien');
	//lương
	Route::get('xem_luong', 'LuongController@xem_luong_giang_vien')->name('luong.xem_luong');
	Route::get('logout_giang_vien','GiangVienController@logout_giang_vien')->name('logout_giang_vien');
	//xem phân công giảng viên
	Route::get('bang_phan_cong', 'PhanCongController@bang_phan_cong_giang_vien')->name('giang_vien.bang_phan_cong');
});