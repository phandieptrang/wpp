<!DOCTYPE html>
<html>
<head>
	<title>Thêm Chuyên Ngành</title>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body >
	<div class="container">
		<form action="{{route('chuyen_nganh.process_insert')}}" method="post" accept-charset="utf-8" id="frm">
			{{ csrf_field() }}
			<caption>
				<h1>Thêm Chuyên Ngành</h1>
			</caption>
			<b>Tên chuyên ngành  </b>
			<input type="text" name="ten_chuyen_nganh" id="ten_chuyen_nganh">
			<br><br>
			<button type="submit">
				Thêm mới
			</button>

			<button>
				<a href="{{url()->previous()}}">
					Quay lại
				</a>
			</button>
		</form>
	</div>
</body>
</html>