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
        .container .bannerc{ padding-top: 15px; height: 395px;}
        .container .bannerc .img-fluid{ scale: 0.7; }
        .container .bannerc p{font-size: 14px;}
    </style>
    <section class="banner-area">
        <div class="container">
            <div class="row bannerc align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="active-banner-slider owl-carousel">
                        <!-- single-slide -->
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h4>Laptop Asus TUF Gaming FX506HF-HN017W <br></h4>
                                    <br>
                                    <p>Core i5 11400H/16GB/512GB/GeForce RTX 2050 4GB/Win11</p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="{{asset("user/img/banner/laptop.png")}}" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- single-slide -->
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h4>Laptop HP Pavilion <br> 14-dv2073TU <br></h4>
                                    <br>
                                    <p>Core i5 1235U/16GB/512GB/Win11</p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="{{asset("user/img/banner/lapHP.png")}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- start features Area -->
    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{asset("user/img/features/f-icon1.png")}}" alt="">
                        </div>
                        <h6>Giao hàng miễn phí</h6>
                        <p>Miễn phí vận chuyển cho mọi đơn hàng</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{asset("user/img/features/f-icon2.png")}}" alt="">
                        </div>
                        <h6>Chính sách hoàn trả</h6>
                        <p>Miễn phí vận chuyển cho mọi đơn hàng</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{asset("user/img/features/f-icon3.png")}}" alt="">
                        </div>
                        <h6>Hỗ trợ 24/7</h6>
                        <p>Miễn phí vận chuyển cho mọi đơn hàng</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{asset("user/img/features/f-icon4.png")}}" alt="">
                        </div>
                        <h6>Thanh toán an toàn</h6>
                        <p>Miễn phí vận chuyển cho mọi đơn hàng</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end features Area -->

    <!-- Start category Area -->
    <section class="category-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <h1 style="margin-left: 26%">Sản phẩm bán chạy</h1>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                @if(isset($spBestSeller[0]))
                                    <img class="img-fluid w-100" src="/images/{{$spBestSeller[0]->url}}" alt="">
                                    <a href="/chiTietSanPham/{{$spBestSeller[0]->id}}">
                                        <div class="deal-details">
                                            <h6 class="deal-title">{{$spBestSeller[0]->ten}}</h6>
                                        </div>
                                    </a>
                                @else
                                    <img class="img-fluid w-100" src="{{asset("user/img/category/c1.jpg")}}" alt="">
                                    <a href="user/img/category/c1.jpg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">Laptop</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                @if(isset($spBestSeller[1]))
                                    <img class="img-fluid w-100" src="/images/{{$spBestSeller[1]->url}}" alt="">
                                    <a href="/chiTietSanPham/{{$spBestSeller[1]->id}}">
                                        <div class="deal-details">
                                            <h6 class="deal-title">{{$spBestSeller[1]->ten}}</h6>
                                        </div>
                                    </a>
                                @else
                                    <img class="img-fluid w-100" src="{{asset("user/img/category/c2.jpg")}}" alt="">
                                    <a href="user/img/category/c1.jpg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">Laptop</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                @if(isset($spBestSeller[2]))
                                    <img class="img-fluid w-100" src="/images/{{$spBestSeller[2]->url}}" alt="">
                                    <a href="/chiTietSanPham/{{$spBestSeller[2]->id}}">
                                        <div class="deal-details">
                                            <h6 class="deal-title">{{$spBestSeller[2]->ten}}</h6>
                                        </div>
                                    </a>
                                @else
                                    <img class="img-fluid w-100" src="{{asset("user/img/category/c3.jpg")}}" alt="">
                                    <a href="user/img/category/c1.jpg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">Laptop</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                @if(isset($spBestSeller[3]))
                                    <img class="img-fluid w-100" src="/images/{{$spBestSeller[3]->url}}" alt="">
                                    <a href="/chiTietSanPham/{{$spBestSeller[3]->id}}">
                                        <div class="deal-details">
                                            <h6 class="deal-title">{{$spBestSeller[3]->ten}}</h6>
                                        </div>
                                    </a>
                                @else
                                    <img class="img-fluid w-100" src="{{asset("user/img/category/c4.jpg")}}" alt="">
                                    <a href="user/img/category/c1.jpg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">Laptop</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                @if(isset($spBestSeller[4]))
                                    <img class="img-fluid w-100" src="/images/{{$spBestSeller[4]->url}}" alt="">
                                    <a href="/chiTietSanPham/{{$spBestSeller[4]->id}}">
                                        <div class="deal-details">
                                            <h6 class="deal-title">{{$spBestSeller[4]->ten}}</h6>
                                        </div>
                                    </a>
                                @else
                                    <img class="img-fluid w-100" src="{{asset("user/img/category/c4.jpg")}}" alt="">
                                    <a href="user/img/category/c1.jpg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">Laptop</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                @if(isset($spBestSeller[5]))
                                    <img class="img-fluid w-100" src="/images/{{$spBestSeller[5]->url}}" alt="">
                                    <a href="/chiTietSanPham/{{$spBestSeller[5]->id}}">
                                        <div class="deal-details">
                                            <h6 class="deal-title">{{$spBestSeller[5]->ten}}</h6>
                                        </div>
                                    </a>
                                @else
                                    <img class="img-fluid w-100" src="{{asset("user/img/category/c4.jpg")}}" alt="">
                                    <a href="user/img/category/c1.jpg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">Laptop</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End category Area -->
    <!-- Start related-product Area -->
    <section class="related-product-area section_gap_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Sản phẩm gần đây</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 text-a">
                    <div class="row">
                       @if(isset($spGanDay))
                           @for($x=0;$x<9;$x++)
                               @if(isset($spGanDay[$x]))
                                    <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                        <div class="single-related-product d-flex">
                                            <a href="#"><img style="width: 70px;height: 70px" src="/images/{{$spGanDay[$x]->url}}" alt=""></a>
                                            <div class="desc">
                                                <a href="#" class="title">{{$spGanDay[$x]->ten}}</a>
                                                <div class="price">
                                                    <h6>{{$spGanDay[$x]->giaBan}}VND</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               @endif
                           @endfor
                       @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End related-product Area -->
    </section>
@endsection
</body>
</html>
