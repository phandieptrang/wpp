<!DOCTYPE html>
<html>
<head>
	<title>Môn học</title>
</head>
<body>
	<h1>Danh sách các môn học</h1>
	<table border="1" width="100%">
		<caption>
			<button>
				<a href="{{route('mon.view_insert')}}">
					Thêm Môn
				</a>
			</button>
		</caption>
		<tr>
			<th>STT</th>
			<th>Tên môn học</th>
			<th>Chuyên ngành</th>
			<th>Lương từng môn</th>
			<th>Thời gian định mức</th>
			<th></th>
		</tr>
		@foreach ($array_mon as $mon)
			<tr>
				<td>{{$mon->ma_mon}}</td>
				<td>{{$mon->ten_mon}}</td>
				<td>{{$mon->ten_chuyen_nganh}}</td>
				<td>{{$mon->luong_tung_mon}}</td>
				<td>{{$mon->thoi_gian_dinh_muc}}</td>
				<td>
					<a href="{{route('mon.view_update',['ma' => $mon->ma_mon])}}">Update</a>
				</td>
			</tr>
		@endforeach

	</table>
	
</body>
</html>