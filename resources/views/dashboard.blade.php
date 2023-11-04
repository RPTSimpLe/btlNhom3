<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

    </style>
</head>
<body>
@extends("user.layout.layout")
@section("page")
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="active-banner-slider owl-carousel">
                        <!-- single-slide -->
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h2>Laptop Asus TUF Gaming FX506HF-HN017W <br></h2>
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
                                    <h2>Laptop HP Pavilion <br> 14-dv2073TU <br></h2>
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
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img style="width: 100%;height: 250px;" class="img-fluid w-100" src="{{asset("user/img/category/4Asus.png")}}" alt="">
                                <a href="user/img/category/4Asus.png" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Laptop Gamming</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{asset("user/img/category/3Hp.png")}}" alt="">
                                <a href="user/img/category/3Hp.png" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Laptop HP</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{asset("user/img/category/4Dell.png")}}" alt="">
                                <a href="user/img/category/4Dell.png" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Laptop</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" style="width: 378px;
    padding-left: 150px;" src="{{asset("user/img/category/4Asus.png")}}" alt="">
                                <a href="user/img/category/c4.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Laptop</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-deal">
                        <div class="overlay"></div>
                        <img class="img-fluid w-100" src="{{asset("user/img/category/6MSigaming.jpg")}}" alt="">
                        <a href="user/img/category/6MSigaming.jpg" class="img-pop-up" target="_blank">
                            <div class="deal-details">
                                <h6 class="deal-title">Laptop</h6>
                            </div>
                        </a>
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
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img  style="width: 90px;" src="{{asset("user/img/acer1.jpg")}}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Laptop</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img style="width: 90px;" src="{{asset("user/img/asus1.jpg")}}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Laptop</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img style="width: 90px;" src="{{asset("user/img/asus2.jpg")}}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Laptop</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img style="width: 90px;" src="{{asset("user/img/dell1.jpg")}}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Laptop</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img style="width: 90px;" src="{{asset("user/img/dell2.jpg")}}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Laptop</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img style="width: 90px;" src="{{asset("user/img/dell3.jpg")}}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Laptop</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img style="width: 90px;" src="{{asset("user/img/hp1.jpg")}}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">BLaptop</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img style="width: 90px;" src="{{asset("user/img/hp2.jpg")}}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Laptop</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img style="width: 90px;" src="{{asset("user/img/asus3.jpg")}}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Laptop</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ctg-right">
                        <a href="#" target="_blank">
                            <img class="img-fluid d-block mx-auto" src="{{asset("user/img/category/3LG.png")}}" alt="">
                        </a>
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
