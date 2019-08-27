<!DOCTYPE html>
<html>
<head>
	<title>Chuyên ngành</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/boostrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}"/>
	<script src="{{asset('js/jquery.js')}}"></script>
</head>
<body >
	<p>
	<h1>Danh sách chuyên ngành</h1>
	<table border="1" width="100%">
		<caption>
			<button>
				<a href="{{route('chuyen_nganh.view_insert')}}">
					Thêm Chuyên Ngành
				</a>
			</button>
		</caption>
		<tr>
			<th>STT</th>
			<th>Tên chuyên ngành</th>
		</tr>
		@foreach ($array_chuyen_nganh as $chuyen_nganh)
			<tr>
				<td>{{$chuyen_nganh->ma_chuyen_nganh}}</td>
				<td>{{$chuyen_nganh->ten_chuyen_nganh}}</td>
			</tr>
		@endforeach
	</table>
</p>
</body>
</html>