<!DOCTYPE html>
<html>
<head>
	<title>Update Môn</title>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
	
	<div class="container">
		<h1>Update Môn Học</h1>
		<div class="col-lg-4">
			<form action="{{route('mon.process_update')}}" method="post" accept-charset="utf-8">
			{{csrf_field()}}
				<div class="form-group">
				<label>Chọn chuyên ngành</label>
				<input type="hidden" name="ma_mon" value="{{$mon->ma_mon}}">
				<select class="form-control" name="ma_chuyen_nganh" id="ma_chuyen_nganh">
					@foreach($array_chuyen_nganh as $chuyen_nganh)

						<option value="{{$chuyen_nganh->ma_chuyen_nganh}}" @if ($chuyen_nganh->ma_chuyen_nganh == $mon->ma_chuyen_nganh )selected @endif >
							{{$chuyen_nganh->ten_chuyen_nganh}}
						</option>

					@endforeach
				</select>
				</div>
				<div class="form-group">
				<label>Tên môn học</label>
				<input type="text" name="ten_mon" value="{{$mon->ten_mon}}">
				</div>
				<div class="form-group">
					<label>Thời gian định mức</label>
					<input name="thoi_gian_dinh_muc" type="text" value="{{$mon->thoi_gian_dinh_muc}}">
					</div>
				<div class="form-group">
					<label>Lương từng môn</label>
					<input name="luong_tung_mon" type="text" value="{{$mon->luong_tung_mon}}">
				</div>
				<div class="form-group">
					<button type="submit">Update</button>
				
					<button>
							<a href="{{url()->previous()}}">Quay lại</a>
					</button>
				</div>
			</form>
	</div>
	</div>
	
</body>
</html>