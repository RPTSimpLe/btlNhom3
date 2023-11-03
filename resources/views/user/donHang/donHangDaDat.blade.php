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
    <section class="order_details section_gap">
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
                                </tbody>
                            </table>
                            <a style="float: right" href="/user/chiTietDon/{{$hoaDon->id}}" class="genric-btn info circle">Chi tiết</a>

                        </div>
                    </div>
                </div>
            @endforeach
    </section>
@endsection
</body>
</html>
