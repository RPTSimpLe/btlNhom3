<link rel="stylesheet" href="{{asset("user/css/linearicons.css")}} ">
<link rel="stylesheet" href="{{asset("user/css/font-awesome.min.css")}} ">
<link rel="stylesheet" href="{{asset("user/css/themify-icons.css")}} ">
<link rel="stylesheet" href="{{asset("user/css/bootstrap.css")}} ">
<link rel="stylesheet" href="{{asset("user/css/owl.carousel.css")}} ">
<link rel="stylesheet" href="{{asset("user/css/nice-select.css")}} ">
<link rel="stylesheet" href="{{asset("user/css/nouislider.min.css")}} ">
<link rel="stylesheet" href="{{asset("user/css/ion.rangeSlider.css")}} " />
<link rel="stylesheet" href="{{asset("user/css/ion.rangeSlider.skinFlat.css")}} "/>
<link rel="stylesheet" href="{{asset("user/css/magnific-popup.css")}} ">
<link rel="stylesheet" href="{{asset("simplePagination.min.css")}}"
      crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset("user/css/main.css")}} ">
<style>
    .searchhien{
        background-color: white;
        text-align: left;
        border-radius: 4px;
        margin-bottom: 10px;
        padding: 3px 3px 3px 8px;
    }
    .searchhien a{ color: black}
    .searchhien:hover{
        background-color: aqua;
    }
    .ti-bag{
        position: relative;
    }
    .ti-bag span{
        position: absolute;
        top: 7px;
        font-size: 10px;
        right: -7px;
        background: #ffa500;
        height: 12px;
        width: 12px;
        border-radius: 50%;
        text-align: center;
    }
    .header_area .navbar .nav.navbar-nav.navbar-right li .ti-bag span{
        line-height: normal;
        color: white;
    }
</style>
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="/dashboard"><img  src="https://th.bing.com/th/id/OIP.hXshohTp7T6Nse9m8hX8nwHaFw?pid=ImgDet&rs=1" style="object-fit: cover;width: 137px; height: 50px;" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="/dashboard" style="color: #222222;">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="/danhMuc">Danh mục sản phẩm</a></li>
                       @if(\Illuminate\Support\Facades\Auth::user()==null)
                            <li class="nav-item"><a class="nav-link" href="/login">Đăng nhập</a></li>
                        @else
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">Về bạn</a>
                            <ul class="dropdown-menu">

                                <li class="nav-item"><a class="nav-link" href="/user/thongTin">Thông tin</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/gioHang">Giỏ hàng</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/donHangDaDat">Tất cả đơn hàng</a></li>
                                <li class="nav-item">  <form id="logout" action="/logout" method="POST">
                                        @csrf
                                        <a class="nav-link" href="#" onclick="logout()">Đăng xuất</a>
                                    </form></li>
                            </ul>
                        </li>
                       @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                                    @if(\Illuminate\Support\Facades\Auth::user()!=null)
                                        @php
                                                $user=\Illuminate\Support\Facades\Auth::user();
                                                $count= \Illuminate\Support\Facades\DB::table("gio_hangs")->where("user_id","=",$user->id)->count();
                                        @endphp
                                    @endif
                        <li class="nav-item"><a href="/user/gioHang" class="cart"><span class="ti-bag"><span>{{isset($count) ? $count : 0 }}</span></span></a></li>
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Tên sản phẩm" name="tenSP" onkeyup="timKiem(this.value)">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
        <div class="container " id="renderSP">
        </div>
    </div>
</header>
@yield("page")
<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Về chúng tôi</h6>
                    <p>
                    <p> Chúng tôi là một cửa hàng chuyên bán laptop chất lượng cao với đa dạng mẫu mã và thương hiệu. Với nhiều năm kinh nghiệm trong ngành, chúng tôi cam kết cung cấp những sản phẩm chất lượng, đáng tin cậy và đáp ứng được nhu cầu của khách hàng.</p>
                    </p>
                </div>
            </div>
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Bản tin</h6>
                    <p>Luôn cập nhật những thông tin mới nhất của chúng tôi</p>
                    <div class="" id="mc_embed_signup">

                        <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                              method="get" class="form-inline">

                            <div class="d-flex flex-row">

                                <input class="form-control" name="EMAIL" placeholder="Nhập Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập Email '"
                                       required="" type="email">


                                <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                </div>
                            </div>
                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">Instagram</h6>
                    <ul class="instafeed d-flex flex-wrap">
                        <li><img style="height: 58px;width: 58px" src="{{asset("user/img/i1.jpg")}}" alt=""></li>
                        <li><img style="height: 58px;width: 58px" src="{{asset("user/img/i2.jpg")}}" alt=""></li>
                        <li><img style="height: 58px;width: 58px" src="{{asset("user/img/i3.jpg")}}" alt=""></li>
                        <li><img style="height: 58px;width: 58px" src="{{asset("user/img/i4.jpg")}}" alt=""></li>
                        <li><img style="height: 58px;width: 58px" src="{{asset("user/img/i5.jpg")}}" alt=""></li>
                        <li><img style="height: 58px;width: 58px" src="{{asset("user/img/i6.jpg")}}" alt=""></li>
                        <li><img style="height: 58px;width: 58px" src="{{asset("user/img/i7.jpg")}}" alt=""></li>
                        <li><img style="height: 58px;width: 58px" src="{{asset("user/img/i8.jpg")}}" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Theo dõi</h6>
                    <p></p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
        </div>
    </div>
</footer>
<script src="{{asset("user/js/vendor/jquery-2.2.4.min.js")}} "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="{{asset("user/js/vendor/bootstrap.min.js")}} "></script>
<script src="{{asset("user/js/jquery.ajaxchimp.min.js")}} "></script>
<script src="{{asset("user/js/jquery.nice-select.min.js")}} "></script>
<script src="{{asset("user/js/jquery.sticky.js")}} "></script>
<script src="{{asset("user/js/nouislider.min.js")}} "></script>
<script src="{{asset("user/js/countdown.js")}} "></script>
<script src="{{asset("user/js/jquery.magnific-popup.min.js")}} "></script>
<script src="{{asset("user/js/owl.carousel.min.js")}} "></script>
<!--gmaps Js-->
<script src="{{asset("https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE")}} "></script>
<script src="{{asset("user/js/gmaps.min.js")}} "></script>
<script src="{{asset("user/js/main.js")}} "></script>
<script src="{{asset("jquery.simplePagination.min.js")}}"></script>
<script src="{{asset("mainfe.js")}} "></script>
<script>
    function timKiem(ten){
        get("/timKiemSP/"+ten)
            .then(sanPhams=>{
                let html=""
                for (const sanPham of sanPhams) {
                    html+=`<div class="searchhien"> <a href="/chiTietSanPham/${sanPham.id}">${sanPham.ten} </a></div>`
                }
                document.getElementById("renderSP").innerHTML=html
            })
    }
</script>
@yield("src")
