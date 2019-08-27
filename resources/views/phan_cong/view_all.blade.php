<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/boostrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}"/>
	<script src="{{asset('js/jquery.js')}}"></script>
</head>
<body>
	<h1 align="center">Danh sách phân công</h1>
<table width="100%" border="1">
	<caption>
		<a href="{{ route('phan_cong.view_insert') }}">
			<button >Thêm Phân Công</button>
		</a>
	</caption>
	<tr>
		<th>Giảng viên</th>
		<th>Lớp</th>
		<th>Môn</th>
		<th>Thời gian định mức môn</th>
		<th></th>
	</tr>
	@foreach ($array_phan_cong as $phan_cong)
		<tr>
			<td>{{$phan_cong->ten_giang_vien}}</td>
			<td>{{$phan_cong->ten_lop}}</td>
			<td>{{$phan_cong->ten_mon}}</td>
			<td>{{$phan_cong->thoi_gian_dinh_muc_mon}}</td>
			<td>
				<button>
					<a href="{{route('phan_cong.view_update',['ma'=>$phan_cong->ma_giang_vien])}}">Update</a>
				</button>
			</td>
		</tr>
	@endforeach
</table>
</body>
</html>