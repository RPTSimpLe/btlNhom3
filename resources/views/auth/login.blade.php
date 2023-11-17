<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <title>Login</title>
</head>
<body>
@extends("user.layout.layout")
@section("page")

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Login/Register</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Login/Register</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="https://th.bing.com/th/id/OIP.ed-29-ckMum--DpdlJRKHgHaFW?pid=ImgDet&rs=1" style="width: 600px; height: 471px" alt="">
                    <div class="hover">
                        <h4>Bạn mới sử dụng trang web của chúng tôi??</h4>
                        <p>Mỗi ngày, khoa học và công nghệ đang có những tiến bộ đáng kể. Điều này thể hiện rõ ràng sự phát triển liên tục của chúng.</p>
                        <a class="primary-btn" href="/register">Tạo tài khoản</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Đăng nhập</h3>
                    <form class="row login_form" action="{{ route('login') }}" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên tài khoản" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập tên tài khoản'">
                            @error('name')
                            <small class="form-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="name" name="password" placeholder="Nhập mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập mật khẩu'">
                            @error('password')
                            <small class="form-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="selector">
                                <label for="f-option2">Lưu mật khẩu</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Đăng nhập</button>
                            <a href="">Quên mật khẩu?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->
@endsection
</body>
