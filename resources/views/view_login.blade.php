<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập giáo vụ</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/boostrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}"/>
	<script src="{{asset('js/jquery.js')}}"></script>
	<style type="text/css">
		body{
			background-color: lightgrey;
			color: black
			}
		button{
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>ĐĂNG NHẬP</h1>
		<div class="col-lg-4">
			<form action="{{route('process_login')}}" method="post">
				{{csrf_field()}}
				@if(Session::has('error'))
                    <span style="color:red">{{Session::get('error')}}</span>
                @endif
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="ten_dang_nhap" size="50">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="ma_dang_nhap" size="50">
				</div>
				<div class="form-group">
					<button type="submit" >ĐĂNG NHẬP</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>