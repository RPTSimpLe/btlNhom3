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
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Confirmation</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Chi tiết</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Order Details Area =================-->
    <section class="order_details section_gap">
        <div class="container">
            <div class="order_details_table">
                <h2>Đơn hàng</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
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
                                    <p>{{$chiTiet->tienHang}}</p>
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
                                <h4>Địa chỉ</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>{{$hoaDon->diaChi}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Điện thoại</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>{{$user->sDT}}</p>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h4>Ghi chú</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>{{$hoaDon->ghiChu}}</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <a style="float: right" href="/user/donHangDaDat" class="btn btn-info">Trở lại</a>
        </div>

    </section>
    <!--================End Order Details Area =================-->

@endsection
</body>
</html>
