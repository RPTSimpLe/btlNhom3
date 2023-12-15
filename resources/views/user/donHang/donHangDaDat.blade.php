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
@extends("user.layout.layout")
@section("page")
    <style>
        .navHD .nav-item{
            margin: 0 10%;
        }
        .navHD .nav-item .nav-link{
            font-size: 17px;
        }
        .navHD .nav-item .nav-link:hover{
            color: #ffa500;
        }
        .order_details nav{
            margin-top: 5%;
        }
    </style>
    <section class="order_details section_gap">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav d-flex flex w-100 justify-content-center navHD">
                        <li class="nav-item ">
                            <a class="nav-link" href="/user/locDon/0">Chờ xác nhận</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/locDon/1">Chờ giao hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/locDon/2">Đã giao</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div id="donHangs">

            @foreach($hoaDons as $hoaDon)
                @php
                    $chiTiets= \Illuminate\Support\Facades\DB::table("chi_tiet_hoa_dons")->where("hoaDon_id","=",$hoaDon->id)->get();
                @endphp
                <div class="container">
                    <div class="order_details_table">
                        <h2>Đơn hàng</h2>
                        <div class="table-responsive">
                            <table class="table">
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
                                                <h5>x {{$chiTiet->soLuong}}</h5>
                                            </td>
                                            <td>
                                                <p>{{$chiTiet->tienHang}}đ</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>
                                            <h4>Giảm giá</h4>
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
                                        <h4>Phí ship</h4>
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
                                        <h4>Tổng tiền</h4>
                                    </td>
                                    <td>
                                        <h5></h5>
                                    </td>
                                    <td>
                                        <p>{{$hoaDon->tongTien}}đ</p>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>
                                            <h4>Hình thức thanh toán</h4>
                                        </td>
                                        <td>
                                            <h5></h5>
                                        </td>
                                        <td>
                                            <p>{{$hoaDon->hinhThucThanhToan}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>Tình trạng</h4>
                                        </td>
                                        <td>
                                            <h5></h5>
                                        </td>
                                        <td>
                                            <p>{{$hoaDon->TrangThai}}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a style="float: right; margin-left: 10px" href="/user/chiTietDon/{{$hoaDon->id}}" class="genric-btn info circle">Chi tiết</a>
                            @if($hoaDon->danhGia!="đã đánh giá" && $hoaDon->TrangThai=="Đã giao")
                                <a style="float: right" class="genric-btn success circle arrow" href="/user/danhGia/{{$chiTiet->tenSanPham}}?idHD={{$hoaDon->id}}" >Đánh giá</a>
                            @endif
                            @if($hoaDon->TrangThai!="Đã giao")
                                <a style="float: right" class="genric-btn danger circle arrow" href="/user/huyDon/{{$hoaDon->id}}" >Hủy đơn</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
</body>
</html>
