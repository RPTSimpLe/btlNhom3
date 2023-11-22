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
                    <h1>Giỏ hàng</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="/category">Giỏ hàng</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá tiền</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img style="width: 150px;height: 100px; " src="/images/{{$cart->url}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>{{$cart->ten}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{$cart->giaBan}}đ</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                       <form id="updateSL_{{$cart->id}}" action="/user/capNhatGioHang/{{$cart->id}}" method="post">
                                           @csrf
                                           @method("patch")
                                           <input type="number" name="soLuong" id="sst" maxlength="12" value="{{$cart->soLuong}}"
                                                  onkeyup="tien(this.value,{{$cart->giaBan}},{{$cart->id}})"
{{--                                                  onclick="tien(this.value,{{$cart->giaBan}},{{$cart->id}})"--}}
                                                  class="input-text qty">
                                           <input type="number" name="tongTienBan" id="tongTienBan_{{$cart->id}}" hidden="">
                                       </form>
                                    </div>
                                </td>
                                <td>
                                    <h5 id="tien_{{$cart->id}}" class="tien">{{$cart->tongTien}}đ</h5>
                                </td>
                                <td>
                                    <form action="/user/xoaGioHang/{{$cart->id}}" id="form_{{$cart->id}}" method="post">
                                        @csrf
                                        @method("delete")
                                        <a href="#" style="cursor: pointer" onclick="xoa({{$cart->id}})"> <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5 >Giảm giá:</h5>
                            </td>
                            <td>
                                @if(\Illuminate\Support\Facades\Auth::user()->KHTT==1)
                                    <h5 id="giamGia">10%</h5>
                                @else
                                    <h5 id="giamGia">0%</h5>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5 >Tổng tiền:</h5>
                            </td>
                            <td>
                                <h5 id="tongTien"></h5>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="/category">Tiếp tục mua hàng</a>
                                    <a class="primary-btn" href="/user/datHang">Đặt hàng</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection
@section("src")
    <script>
        function tien(sl,gt,id){
            document.getElementById("tien_"+id).innerHTML = sl*gt+"đ"
            document.getElementById("tongTienBan_"+id).value=sl*gt
            document.getElementById("updateSL_"+id).submit()
             tongTien()
        }
        function tongTien(){
            tong=0
            tiens= document.querySelectorAll(".tien")
            for (const tien of tiens ) {
                tong+=parseInt(tien.innerHTML.slice(0, -1))
            }
            if (document.getElementById("giamGia").innerHTML.slice(0, -1)!=0){
                tong = tong - tong/parseInt(document.getElementById("giamGia").innerHTML.slice(0, -1))
            }
            document.getElementById("tongTien").innerHTML=tong+"đ"
        }
        tongTien()
        function xoa(id) {
            document.getElementById(`form_${id}`).submit();
        }
    </script>
@endsection
</body>
</html>
