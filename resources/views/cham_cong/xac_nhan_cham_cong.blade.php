<!DOCTYPE html>
<html>
<head>
	<title>Xác Nhận Chấm Công</title>

	<meta charset='utf-8' />
	<link href="{{asset('css/core/main.css')}}" rel='stylesheet' />
	<link href="{{asset('css/daygrid/main.css')}}"  rel='stylesheet' />
	<link href="{{asset('css/list/main.css')}}" rel='stylesheet' />
	<script src="{{asset('js/core/main.js')}}"></script>
	<script src="{{asset('js/interaction/main.js')}}"></script>
	<script src="{{asset('js/daygrid/main.js')}}"></script>
	<script src="{{asset('js/list/main.js')}}"></script>
	<script src="{{asset('js/google-calendar/main.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('css/boostrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}"/>
	<script src="{{asset('js/jquery.js')}}"></script>

	<style>

	  body {
	    margin: 40px 10px;
	    padding: 0;
	    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
	    font-size: 14px;
	  }

	  #loading {
	    display: none;
	    position: absolute;
	    top: 10px;
	    right: 10px;
	  }

	  #calendar {
	    max-width: 400px;
	    margin: 0 auto;
	  }

	</style>
</head>
<body>
		<h1 align="center">Xác Nhận Chấm Công</h1>
		<div style="height: 100%;width: 100%">
			<div style="height: 100%;width:30%;float: left">
				<form action="{{route('cham_cong.get_cham_cong_by_search')}}" >
				<div >
					<div class="form-group">
						<label>Chọn Ngành</label>
						<select id="chuyen_nganh" name="ma_chuyen_nganh" class="form-control">
							<option >--Chọn Chuyên Ngành--</option>
							@foreach($array_chuyen_nganh as $chuyen_nganh)
								<option value="{{$chuyen_nganh->ma_chuyen_nganh}}">
									{{$chuyen_nganh->ten_chuyen_nganh}}
								</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Chọn Môn</label>
						<select id="mon" class="form-control" name="ma_mon">
							<option value="">--Chọn Môn--</option>
							
						</select>
					</div>
					<div class="form-group">
						<label>Chọn Lớp</label>
						<select id="lop" class="form-control" name="ma_lop">
							<option value="">--Chọn Lớp--</option>
							
						</select>
					</div>
				</div>
				<div >

					<div id='loading'>loading...</div>

					<div id='calendar'>
						<input class="form-control" type="text" name="ngay" id="ngay">
					</div>

					<div class="form-group" id="button">
						<button type="submit"> Search</button>
					</div>

				</div>
				</form>
			</div>

			<h3 align="center">Bảng Chấm Công</h3>

			<div id="" style="height: 100%;width:70%;float: left ; text-align: center">

				<a href="{{route('cham_cong.xac_nhan_cham_cong')}}">
					<input align="center" type="button"value="Hiển thị tất cả" style="float:left;margin-left: 50px;color: white;background: black">
				</a>
				<br><br>

				<table border="1" width="90%" align="center">
					<tr>
						<th>Ngày</th>
						<th>Môn</th>
						<th>Số giờ làm</th>
						<th>Giảng viên</th>
						<th></th>
					</tr>
					
					@foreach($array_cham_cong as $cham_cong)
						<tr>
							<td>
								<?php 
									echo date('d', strtotime($cham_cong->ngay));
								?>								
							</td>
							<td>{{$cham_cong->ten_mon}}</td>
							<td><input id="so_h_lam" class="form-control" value=" {{$cham_cong->so_h_lam}}"></td>
							<td>{{$cham_cong->ten_giang_vien}}</td>
							<td>
								<a href="{{route('cham_cong.process_update_cham_cong',['ma'=> $cham_cong->ma_giang_vien,'ngay'=>$cham_cong->ngay,'so_h_lam'=>$cham_cong->so_h_lam])}}">
									Xác Nhận
								</a>
							</td>
						</tr>
					@endforeach
				</table>

				<div id="so_h_dm_mon">
					<h4>Số giờ đã chấm công : </h4>
					<h4>Số giờ định mức môn :</h4>
				</div>

			</div>
		</div>
</body>

<!-- search -->
<script src="{{asset('js/select2.js')}}"></script>
<script type="text/javascript">
	   	$(document).ready(function() {
			$("#chuyen_nganh").select2();
			$("#chuyen_nganh").change(function(){

				$('#mon').val(null).trigger('change');
				$('#lop').val(null).trigger('change');
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

<!-- calendar -->
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

      plugins: [ 'interaction', 'dayGrid', 'googleCalendar' ],

      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },

      displayEventTime: false, // don't show the time column in list view

      // THIS KEY WON'T WORK IN PRODUCTION!!!
      // To make your own Google API key, follow the directions here:
      // http://fullcalendar.io/docs/google_calendar/
      googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',


      dateClick: function(date) {
      	
      	document.getElementById('ngay').value = date.dateStr;
      	
      },

      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      }

    });

    calendar.render();
  });
 </script>
<!-- update -->
 <script>
</script>
</html>
