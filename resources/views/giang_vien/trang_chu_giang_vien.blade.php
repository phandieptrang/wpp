<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ giảng viên</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/boostrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}"/>
	<script src="{{asset('js/jquery.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
</head>
<body>
	<ul id="menu" style="margin: auto">
		<li> <a id="giang_vien_cham_cong" > Chấm công </a></li>
		<li> <a id="xem_luong"> Xem lương </a></li>
		<li> <a id="xem_phan_cong"> Bảng phân công </a> </li>
		<li style="float: right">  <a> {{Session::get("ten_dang_nhap_giang_vien")}} </a></li>
		<li style="float: right"> <a href="{{route('logout_giang_vien')}}"> Đăng xuất </a> </li>
	</ul>
	<p id="content">
		
	</p>
	<script type="text/javascript">
		$("#giang_vien_cham_cong").click(function () {
			$.ajax({
			async:false,
			type: "get",
			url: "http://localhost/project23/public/giang_vien/view_cham_cong",
			success: function (response) {
				$("#content").html(response);
			}
		});
		})

		$("#xem_luong").click(function () {
			$.ajax({
			async:false,
			type: "get",
			url: "http://localhost/project23/public/giang_vien/xem_luong",
			success: function (response) {
				$("#content").html(response);
			}
		});
		})

		$("#xem_phan_cong").click(function () {
			$.ajax({
			async:false,
			type: "get",
			url: "http://localhost/project23/public/giang_vien/bang_phan_cong",
			success: function (response) {
				$("#content").html(response);
			}
		});
		})
	</script>
</body>
</html>