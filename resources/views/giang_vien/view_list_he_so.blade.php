<!DOCTYPE html>
<html>
<head>
	<title>List He So</title>
	
	<link rel="stylesheet" type="text/css" href="{{asset('css/boostrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}"/>
	<script src="{{asset('js/jquery.js')}}"></script>
</head>
<body >
	<div class="container">
		<h1 align="center">Danh Sách Hệ Số Giảng Viên</h1>
		Tìm Kiếm : 
				<form id="frmSearch">
					<input type="text" name="key" id="search">
					<button type="submit" onclick="submitsearch()">Search</button>
				</form><br><br>
		<div class="form-group">
			<table border="1" width=100%>
				<tr>
					<th>Tên Giảng Viên</th>
					<th>Hệ Số</th>
				</tr>
				@foreach($array_giang_vien as $giang_vien)
				<tr>
					<td>{{$giang_vien->ten_giang_vien}}</td>
					<td>{{$giang_vien->he_so}}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
	<script>
		function submitsearch()
		{
			
		}
	</script>
</body>
</html>