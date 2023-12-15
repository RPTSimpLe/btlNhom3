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
            <form id="searchForm" action="/admins/admin/searchHoaDon" method="get">
                <div class="row form-group">
                    <div class="search-label"><label for="text-input" class=" form-control-label">Tìm kiếm: </label></div>
                    <div class="col-4 " ><input type="text" id="search" name="" class="form-control">
                    </div>
                    <div class="col-4">
                        <select id="selectSearch" onchange="selectName(this);" class="form-control" required>
                            <option id="" value="">Tìm kiếm theo:</option>
                            <option id="" value=tenSP>Tên sản phẩm</option>
                            <option id="" value="hoTen">Tên khách hàng</option>
                        </select>
                    </div>
                    <div class="col-2"><button type="submit" class="btn btn-primary">Tìm kiếm</button> </div>
                </div>
            </form>
        </div>
            @if(isset($serchHoaDons))
                @php
                    $hoaDons=$serchHoaDons;
                @endphp
            @endif
            @foreach($hoaDons as $hoaDon)
            @if(!isset($serchHoaDons))
                @php
                    $chiTiets= \Illuminate\Support\Facades\DB::table("chi_tiet_hoa_dons")->where("hoaDon_id","=",$hoaDon->id)->get();
                    $user=\Illuminate\Support\Facades\DB::table("users")->select("users.hoTen")->where("id","=",$hoaDon->user_id)->first();
                @endphp
            @endif
            <div class="container">
                <div class="order_details_table">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Sản Phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tiền hàng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($chiTiets))
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
                            @else
                                <tr>
                                    <td>
                                        <p>{{$hoaDon->tenSanPham}}</p>
                                    </td>
                                    <td>
                                        <p>x {{$hoaDon->soLuong}}</p>
                                    </td>
                                    <td>
                                        <p>{{$hoaDon->tienHang}}đ</p>
                                    </td>
                                </tr>
                            @endif
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
                                    <p>Hình thức thanh toán</p>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <p>{{$hoaDon->hinhThucThanhToan}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Khách hàng</p>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <p>{{isset($user) ? $user->hoTen : $hoaDon->hoTen}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Trạng thái</p>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <p>{{$hoaDon->TrangThai}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <p>Địa chỉ:</p>
                                    <p>{{$hoaDon->diaChi}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" >
                                    <div class="col-5">
                                                @if($hoaDon->TrangThai=="Chờ xác nhận")
                                                    <form action="" id="sua_{{$hoaDon->id}}" class="d-inline">
                                                        <a class="btn btn-secondary" onclick="updateHoaDon({{$hoaDon->id}},1)" href="#">Chờ giao hàng</a>
                                                        <a class="btn btn-secondary" onclick="updateHoaDon({{$hoaDon->id}},2)" href="#">Đã giao</a>
                                                    </form>
                                                    <form action="" id="xoa_{{$hoaDon->id}}" class="d-inline">
                                                        <a class="btn btn-danger" onclick="xoaHoaDon({{$hoaDon->id}})" href="#">Hủy đơn hàng</a>
                                                    </form>
                                                @elseif($hoaDon->TrangThai=="Chờ giao hàng")
                                                    <form action="" id="sua_{{$hoaDon->id}}" class="d-inline">
                                                        <a class="btn btn-secondary" onclick="updateHoaDon({{$hoaDon->id}},2)" href="#">Đã giao</a>
                                                    </form>
                                                    <form action="" id="xoa_{{$hoaDon->id}}" class="d-inline">
                                                        <a class="btn btn-danger" onclick="xoaHoaDon({{$hoaDon->id}})" href="#">Hủy đơn hàng</a>
                                                    </form>
                                                @endif

                                    </div>
                                    <a style="float:right;" href="/admins/admin/inHoaDon/{{$hoaDon->id}}" class="btn btn-success">In hóa đơn</a>
                                    <a style="float:right;margin-right: 5px" href="/admins/admin/chiTietDon/{{$hoaDon->id}}" class="btn btn-info">Chi tiết</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach

    </section>
@endsection
@section("src")
    <script>
        function updateHoaDon(id,trangthai){
            document.getElementById("sua_"+id).action = "/admins/admin/updateHoaDon/"+id+"/"+trangthai
            document.getElementById("sua_"+id).submit()
        }
        function xoaHoaDon(id) {
            document.getElementById("xoa_"+id).action = "/admins/admin/xoaHoaDon/"+id
            document.getElementById("xoa_"+id).submit()
        }
    </script>
@endsection
</body>
</html>
