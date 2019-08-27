<!DOCTYPE html>
<html>
<head>
	<title>update phân công</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/boostrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}"/>
	<script src="{{asset('js/jquery.js')}}"></script>
</head>
<body>
		<div class="container">
			<h1>Update Phân Công </h1>
			<div class="col-lg-4">
			<form action="{{route('phan_cong.process_update')}}" method="post" accept-charset="utf-8">
				{{ csrf_field() }}
				<div class="form-group" id="div_mon">
					<label>Môn Học  : </label>
					@foreach($array_mon as $mon )
						@if($mon->ma_mon == $phan_cong->ma_mon)
							{{$mon->ten_mon}}<input type="hidden" name="ma_mon" value="{{$mon->ma_mon}}">
						@endif
					@endforeach
					</div>
				<div class="form-group">
					<label>Lớp Học  : </label>
					@foreach($array_lop as $lop)
						@if($lop->ma_lop == $phan_cong->ma_lop)
							{{$lop->ten_lop}}<input type="hidden" name="ma_lop" value="{{$lop->ma_lop}}">
						@endif
					@endforeach
				</div>
					<div class="form-group">
					<label>Chọn Giảng Viên</label>
					<select class="form-control" name="ma_giang_vien">
						@foreach($array_giang_vien as $giang_vien)
							<option value="{{$giang_vien->ma_giang_vien}}"@if($giang_vien->ma_giang_vien==$phan_cong->ma_giang_vien)selected @endif>
								{{$giang_vien->ten_giang_vien}}
							</option>
						@endforeach
					</select>
					</div>
					<div class="form-group">
						<label>Thời gian định mức</label>
						<input type="number" name="thoi_gian_dinh_muc_mon" value="{{$phan_cong->thoi_gian_dinh_muc_mon}}">
					</div>
					<div class="form-group" id="div_button">
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

	