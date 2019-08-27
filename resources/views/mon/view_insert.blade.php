<!DOCTYPE html>
<html>
<head>
	<title>Thêm Môn</title>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<h1>Thêm Môn Mới</h1>
		<div class="col-lg-4">
			<form action="{{route('mon.process_insert')}}" method="post" accept-charset="utf-8">
			{{csrf_field()}}
				<div class="form-group">
				<label>Chọn chuyên ngành</label>
					<select class="form-control" name="ma_chuyen_nganh" id="ma_chuyen_nganh">
						@foreach($array_chuyen_nganh as $chuyen_nganh)
							<option value="{{$chuyen_nganh->ma_chuyen_nganh}}">{{$chuyen_nganh->ten_chuyen_nganh}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
				<label>Tên môn mới</label>
				<input type="text" name="ten_mon">
				</div>
				<div class="form-group">
					<label>Thời gian định mức</label>
					<input type="number" name="thoi_gian_dinh_muc">
				</div>
				<div class="form-group">
					<label>Lương định mức</label>
					<input type="number" name="luong_tung_mon">
				</div>
				<div class="form-group">
					<button type="submit">Thêm</button>
				
					<button>
							<a href="{{url()->previous()}}">Quay lại</a>
					</button>
				</div>
			</form>
		</div>
	</div>
	
</body>
</html>