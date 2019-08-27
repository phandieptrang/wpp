<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}"/> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bảng phân công lịch dạy</title>
</head>
<body>
    <div>
        <h1>Phân công giảng viên </h1>
        <table>
            <tr>
                <td>Môn</td>
                <td>Lớp</td>
                <td>Giờ định mức</td>
            </tr>
            @foreach ($array_phan_cong as $phan_cong)
            <tr>
                <td>
                    {{$phan_cong -> ten_mon}}
                </td>
                <td>
                    {{$phan_cong -> ten_lop}}
                </td>
                <td>
                    {{$phan_cong -> thoi_gian_dinh_muc_mon}}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>