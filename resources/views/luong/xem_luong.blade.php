<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/boostrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}"/>
	<script src="{{asset('js/jquery.js')}}"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    table tr, td{
        border: 1px solid black;
        border-collapse: collapse
    }
    </style>
    <title>Xem lương</title>
</head>
<body>
    <table>
        <tr>
            <td>
                Tháng 
            </td>
            <td>
                Năm
            </td>
            <td>
                Mã giảng viên
            </td>
            <td>
                Số giờ làm
            </td>
            <td>
                Lương
            </td>
        </tr>
        @foreach ($array_luong as $luong)
        
        <tr>
            <td>
                {{$luong->thang}}
            </td>
            <td>
                {{$luong->nam}}
            </td>
            <td>
                {{$luong->ma_giang_vien}}
            </td>
            <td>
                {{$luong->so_gio_lam}}
            </td>
            <td>
                {{$luong->luong}}
            </td>
        </tr>
        @endforeach  
 
    </table>
</body>
</html>