<!DOCTYPE html>
<html>
<head>
	<title>Thêm Chấm Công</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/boostrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}"/>
	<script src="{{asset('js/jquery.js')}}"></script>
</head>
<body>
	<div class="container">
		<h1>Thêm Chấm Công</h1>
		<div class="col-lg-4">
		<form action="{{route('giang_vien.process_cham_cong')}}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			<div class="form-group">
			<label>Chọn chuyên ngành</label>
			<select class="form-control" name="ma_chuyen_nganh" id="chuyen_nganh">
				<option disabled selected>--Chọn Chuyên Ngành--</option>
				@foreach($array_chuyen_nganh as $chuyen_nganh)
					<option value="{{$chuyen_nganh->ma_chuyen_nganh}}">{{$chuyen_nganh->ten_chuyen_nganh}}</option>
				@endforeach
			</select>
			</div>
			<div class="form-group" id="div_mon">
				<label>Chọn môn</label>
				<select class="form-control" name="ma_mon" id="mon">
					
				</select>
			</div>
			<div class="form-group">
				<label>Chọn lớp</label>
				<select class="form-control" name="ma_lop" id="lop">
				
				</select>
				</div>
				<div class="form-group">
					<label>Thời gian giảng dạy</label>
					<input type="number" name="so_h_lam" id="so_h_lam">
				</div>
				<div class="form-group" id="div_button">
					<button type="submit" style="color: skyblue">Thêm</button>
				
					<button>
							<a href="{{url()->previous()}}" style="color: black">Quay lại</a>
					</button>
				</div>
		</form>
		</div>
	</div>
	<script src="{{asset('js/select2.js')}}"></script>
	<script type="text/javascript">
	   	$(document).ready(function() {
			$("#chuyen_nganh").select2();
			$("#chuyen_nganh").change(function(){

				$('#mon').val(null).trigger('change');
			})
			$('#mon').select2({
				ajax: {
				    url: '{{ route('phan_cong.get_mon_by_chuyen_nganh') }}',
				    dataType: 'json',
				    data: function () {
				        return {
				            ma_chuyen_nganh: $("#chuyen_nganh").val()
				        }
				    },
				    processResults: function (data) {
				      	return {
							results: $.map(data, function (item) {
								return {
									text: item.ten_mon,
									id: item.ma_mon
								}
							})
						};
				    }
				}
		
			});
			$('#lop').select2({
				ajax: {
				    url: '{{ route('phan_cong.get_lop_by_chuyen_nganh') }}',
				    dataType: 'json',
				    data: function () {
				        return {
				            ma_chuyen_nganh: $("#chuyen_nganh").val()
				        }
				    },
				    processResults: function (data) {
				      	return {
							results: $.map(data, function (item) {
								return {
									text: item.ten_lop,
									id: item.ma_lop
								}
							})
						};
				    }
				},
		
			});
		});
</script>

</body>
</html>