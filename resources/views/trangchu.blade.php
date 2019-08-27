<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="{{asset('css/style.css')}}"/>
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
	
	<title>Trang chủ</title>
</head>
<body>
	<div id="menu">
		<ul>
			<li> <a id="CHUYEN_NGANH"> Chuyên Ngành</a></li>
			<li> <a id="MON"> Môn</a> </li>
			<li> <a id="phan_cong"> Phân Công</a> </li>
			<li> <a id="xac_nhan_phan_cong">Xác Nhận Chấm Công</a> </li>
			<li style="float: right">  <a> {{Session::get("ten_dang_nhap")}} </a></li>
			<li style="float: right"> <a href="{{route('logout')}}"> Đăng xuất </a> </li>
		</ul>
	</div>


<p id="content">

</p>

</body>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/select2.js')}}"></script>
<script>
	function processCalendar(){
	    var calendarEl = document.getElementById('calendar');
	    console.log(calendarEl);
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
	    console.log(calendarEl);
	    calendar.render();
	}
  
	$(document).ready(function () {
			$("#CHUYEN_NGANH").click(function () {
				$.ajax({
				async:false,
				type: "get",
				url: "http://localhost/project23/public/giao_vu/chuyen_nganh/view_all",
				success: function (response) {
					$("#content").html(response);
				}
			});
			})
		})
	
		$("#MON").click(function () {
			$.ajax({
			async:false,
			type: "get",
			url: "http://localhost/project23/public/giao_vu/mon/view_all",
			success: function (response) {
				$("#content").html(response);
			}
		});
		})
	
		$("#phan_cong").click(function () {
			$.ajax({
			async:false,
			type: "get",
			url: "http://localhost/project23/public/giao_vu/phan_cong/view_all",
			success: function (response) {
				$("#content").html(response);
			}
		});
		})

		$("#xac_nhan_phan_cong").click(function () {
			$.ajax({
			async:false,
			type: "get",
			url: "http://localhost/project23/public/giao_vu/cham_cong/xac_nhan_cham_cong",
			success: function (response) {
				$("#content").html(response);
				setTimeout(function(){processCalendar();},100);			
			}
		});
		})

</script>

</html>