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
        p{ color: black; }
    </style>
    <section class="order_details section_gap">
            <div class="container">
                <div class="order_details_table">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <a href="/admins/admin/donHang" class="btn btn-info">Quay lại</a>
                            <thead>
                            <tr>
                                <th scope="col">Sản Phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tiền hàng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($chiTiets as $chiTiet)
                                <tr>
                                    <td>
                                        <p>{{$chiTiet->tenSanPham}}</p>
                                    </td>
                                    <td>
                                        <p>x {{$chiTiet->soLuong}}</p>
                                    </td>
                                    <td>
                                        <p>{{$chiTiet->tienHang}}đ</p>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <p>Giảm giá</p>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <p>{{$hoaDon->giamGia}}%</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Phí ship</p>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <p>20000đ</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Tổng tiền</p>
                                </td>
                                <td>

                                </td>
                                <td>
                                    <p>{{$hoaDon->tongTien}}đ</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Khách hàng</p>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <p>{{$user->hoTen}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Điện thoại</p>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <p>{{$user->sDT}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <p>Địa chỉ:</p>
                                    <p>{{$hoaDon->diaChi}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <p>Ghi chú:</p>
                                    <p>{{$hoaDon->ghiChu}}</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </section>
@endsection
</body>
</html>
