<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends("admin.layout.layout")
@section("page")
    <style>
        .tong{ text-align: right;}
    </style>
    @if(count($thongKes)!=0)
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <strong class="card-title">Thống kê tháng {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $thongKes[0]->updated_at)->format("m/Y")}}</strong>
                    <a class="btn btn-info" href="/admins/admin/inThongKe/{{$thongKes[0]->id}}">In thống kê</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th scope="col">Tên sản Phẩm</th>
                            <th scope="col">Số lượng nhập</th>
                            <th scope="col">Số lượng bán</th>
                            <th scope="col">Giá nhập</th>
                            <th scope="col">Giá bán</th>
                            <th scope="col">Tổng tiền nhập</th>
                            <th scope="col">Tổng tiền bán</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $x=1 @endphp
                        @foreach($thongKes as $thongKe)
                            <tr>
                                <td>{{$x++}}</td>
                                <td scope="row">{{$thongKe->tenSanPham}}</td>
                                <td>{{$thongKe->soLuongNhap}}</td>
                                <td>{{$thongKe->soLuongBan}}</td>
                                <td>{{$thongKe->giaNhap}}</td>
                                <td>{{$thongKe->giaBan}}</td>
                                <td>{{$thongKe->tongTienNhapHang}}</td>
                                <td>{{$thongKe->tongTienBan}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th scope="row">Tổng chi</th>
                            <td class="tong" colspan="7">{{$thongKes[0]->tienChi}}đ</td>
                        </tr>
                        <tr>
                            <th scope="row">Tổng thu</th>
                            <td class="tong" colspan="7">{{$thongKes[0]->tienThu}}đ</td>
                        </tr>
                        <tr>
                            <th scope="row">Doanh thu</th>
                            <td class="tong" colspan="7">{{$thongKes[0]->doanhThu}}đ</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <h4>Vui lòng thêm sản phẩm trước khi thống kê</h4>
    @endif
@endsection
</body>
</html>
