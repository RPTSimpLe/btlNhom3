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
        .fa-star{
            color: black;
            cursor: pointer;
        }
        .product_description_area .tab-content .total_rate .rating_list .list li a .black{
            color: black;
            cursor: pointer;
        }
    </style>
    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="">
                        <div class="single-prd-item">
                            <img class="img-fluid" src="/images/{{$sanPham->url}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{$sanPham->ten}}</h3>
                        <h2>{{$sanPham->giaBan}}đ</h2>
                        <ul class="list">
                            <li><a class="active" href="#"><span style="width: 92px">Loại sản phẩm</span> : {{$sanPham->tenDanhMuc}}</a></li>
                            <li><a href="#"><span>Tình trạng</span>: {{$sanPham->tonKho==0 ? "Hết hàng":"Còn hàng"}}</a></li>
                        </ul>
                        <p>Laptop là thiết bị không thể thiếu trong cuộc sống hiện đại.
                            Với khả năng di động và tính linh hoạt, laptop đã trở thành công cụ hỗ trợ đắc lực cho công việc và giải trí của mọi người.
                            Máy tính xách tay hiện nay có thiết kế mỏng nhẹ, cấu hình mạnh mẽ và đa dạng về chủng loại.
                            Tùy vào nhu cầu sử dụng, bạn có thể lựa chọn laptop phù hợp với mục đích của mình,
                            từ những dòng sản phẩm giá rẻ cho đến những chiếc máy cao cấp với những tính năng tiên tiến nhất.</p>
                        <div class="product_count">
                            <label for="qty">Số lượng:</label>
                            <input type="number" name="qty" id="sst" maxlength="12" value="1" onclick="soLuong(this.value)" onkeyup="soLuong(this.value)" title="Quantity:" class="input-text qty">
                        </div>
                        <div class="card_area d-flex align-items-center">
                            <a class="primary-btn" id="gioHang" href="/user/themVaoGio?sanPhamId={{$sanPham->id}}&soLuong=1&gia={{$sanPham->giaBan}}">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mô tả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                       aria-selected="false">Đánh giá</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade  show active" id="home" role="tabpanel" style="height: 600px;" aria-labelledby="home-tab">
                    <h4>Thông số sản phẩm</h4>
                    <textarea readonly name="moTa" id="textarea-input"  rows="25"  class="form-control moTa"> {{$sanPham->moTa}}</textarea>
                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row total_rate">
                                <div class="col-6">
                                    <div class="box_total">
                                        <h4>{{isset($tbc)?$formatted_number = number_format($tbc, 1, '.', '') : ""}}</h4>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="rating_list">
                                        <h3>Based on 3 Reviews</h3>
                                        <ul class="list">
                                            <li><a href="#">5 sao <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> {{isset($demSoSao)? $demSoSao[4] : 0}}</a></li>
                                            <li><a href="#">4 sao <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star black"></i> {{isset($demSoSao)? $demSoSao[3] : 0}}</a></li>
                                            <li><a href="#">3 sao <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star black"></i><i class="fa fa-star black"></i> {{isset($demSoSao)? $demSoSao[2] : 0}}</a></li>
                                            <li><a href="#">2 sao <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star black"></i><i
                                                        class="fa fa-star black"></i><i class="fa fa-star black"></i> {{isset($demSoSao)? $demSoSao[1] : 0}}</a></li>
                                            <li><a href="#">1 sao <i class="fa fa-star"></i><i class="fa fa-star black"></i><i class="fa fa-star black"></i><i
                                                        class="fa fa-star black"></i><i class="fa fa-star black"></i> {{isset($demSoSao)? $demSoSao[0] : 0}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review_list">
                                @if(count($danhGias)>0)
                                    @foreach($danhGias as $danhGia)
                                        <div class="review_item">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4>{{$danhGia->hoTen}}</h4>
                                                    @for($i=1;$i<=5;$i++)
                                                        @if($i<=$danhGia->soSao)
                                                            <i class="fa fa-star"  style="color: yellow"></i>
                                                        @else
                                                            <i class="fa fa-star"  style="color: black"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <p>{{$danhGia->danhGia}}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @if(isset($form))
                            <div class="col-lg-6">
                                <div class="review_box">
                                    <h4>Thêm đánh giá</h4>
                                    <form class="row contact_form" action="/user/themDanhGia" method="post" id="contactForm" method="post" novalidate="novalidate">
                                        @csrf
                                        <p style="padding-left: 15px;">Đánh giá của bạn: </p>
                                        <ul class="list">
                                            <li><i class="fa fa-star" id="rv_1" onclick="danhGia(this)"></i></li>
                                            <li><i class="fa fa-star" id="rv_2" onclick="danhGia(this)"></i></li>
                                            <li><i class="fa fa-star" id="rv_3" onclick="danhGia(this)"></i></li>
                                            <li><i class="fa fa-star" id="rv_4" onclick="danhGia(this)"></i></li>
                                            <li><i class="fa fa-star" id="rv_5" onclick="danhGia(this)"></i></li>
                                        </ul>
                                        <input name="idHD" value="{{$idHD}}" hidden>
                                        <input name="soSao" id="soSao" value="1" hidden>
                                        <input name="idSP" id="idSP" value="{{$sanPham->id}}" hidden>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" id="message" rows="1" name="danhGia" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="submit" value="submit" class="primary-btn">Thêm đánh giá</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->

@endsection
@section("src")
    <script>
        function soLuong(e){
            document.getElementById("gioHang").href = "/user/themVaoGio?sanPhamId={{$sanPham->id}}&soLuong="+e+"&gia={{$sanPham->giaBan}}"
        }
        function danhGia(e){
            document.getElementById(`rv_1`).style.color = "black"
            document.getElementById(`rv_2`).style.color = "black"
            document.getElementById(`rv_3`).style.color = "black"
            document.getElementById(`rv_4`).style.color = "black"
            document.getElementById(`rv_5`).style.color = "black"

            $id=e.getAttribute("id").slice(-1)
            for (let i = 1; i <= $id; i++) {
                document.getElementById(`rv_${i}`).style.color = "yellow"
            }
            document.getElementById("soSao").value= $id
        }
    </script>
@endsection
</body>
</html>
