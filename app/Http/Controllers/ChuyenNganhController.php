<?php 
namespace App\Http\Controllers;

use Request;
use App\Model\ChuyenNganh;
/**
 * 
 */
class ChuyenNganhController extends Controller
{
	private $folder = 'chuyen_nganh';
	public function view_all()
	{
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();
		return view("$this->folder.view_all",[
			'array_chuyen_nganh' => $array_chuyen_nganh
		]);
	}
	public function view_insert()
	{
		return view("$this->folder.view_insert");
	}
	public function process_insert()
	{
		$chuyen_nganh = new ChuyenNganh();
		$chuyen_nganh->ten_chuyen_nganh = Request::get('ten_chuyen_nganh');
		$chuyen_nganh->insert();

		return redirect()->route('chuyen_nganh.view_all');
	}
	
}
