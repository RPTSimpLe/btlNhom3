<link rel="apple-touch-icon" href="apple-icon.png">
<link rel="shortcut icon" href="favicon.ico">

<link rel="stylesheet" href="{{ asset('/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" type="text/css" >
<link rel="stylesheet" href="{{ asset('/admin/vendors/font-awesome/css/font-awesome.min.css') }}" type="text/css" >
<link rel="stylesheet" href="{{ asset('/admin/vendors/themify-icons/css/themify-icons.css') }}" type="text/css" >
<link rel="stylesheet" href="{{ asset('/admin/vendors/flag-icon-css/css/flag-icon.min.css') }}" type="text/css" >
<link rel="stylesheet" href="{{ asset('/admin/vendors/selectFX/css/cs-skin-elastic.css') }}" type="text/css" >
<link rel="stylesheet" href="{{ asset('/admin/vendors/jqvmap/dist/jqvmap.min.css') }}" type="text/css" >

<link rel="stylesheet" href="{{ asset('/admin/assets/css/style.css') }}" type="text/css" >

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/admins/"><h1 style="color: white; font-size: 30px">ADMIN</h1></a>
            <a class="navbar-brand hidden" href="./"><img src="https://student.hunre.edu.vn/congthongtin/logo.png" alt=""></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/admins/"> <i class="menu-icon fa fa-dashboard"></i>Trang chủ </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-address-card "></i>Tài khoản</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa  fa-plus-square-o"></i><a href="/admins/admin/create">Thêm tài khoản</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="/admins/admin/list">Danh sách tài khoản</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-address-card "></i>Danh mục</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa  fa-plus-square-o"></i><a href="/admins/admin/taoDanhMuc">Thêm danh mục</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="/admins/admin/danhSachDanhMuc">Danh sách danh mục</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-address-card "></i>Sản phẩm</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa  fa-plus-square-o"></i><a href="/admins/admin/taoSanPham">Thêm sản phẩm</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="/admins/admin/danhSachSanPham">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                <li >
                    <a href="/admins/admin/danhGia"> <i class="menu-icon fa fa-dashboard"></i>Đánh giá</a>
                </li>
                <li >
                    <a href="/admins/admin/donHang"> <i class="menu-icon fa fa-dashboard"></i>Đơn hàng</a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-address-card "></i>Thống kê</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-id-badge"></i><a href="/admins/admin/thongKeNgay">Theo ngày</a></li>
                        <li><i class="fa  fa-plus-square-o"></i><a href="/admins/admin/thongKe"">Theo tháng</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">

                    <div class="dropdown for-notification">
                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-primary">9</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    @php
                        isset(\App\Models\User::find(Auth::user()->id)->images->url)? $url=\App\Models\User::find(Auth::user()->id)->images->url:$url="";
                    @endphp
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="{{ url('/images/' . $url) }}"
                             alt="User Avatar" style="height: 32px;width: 32px; object-fit: cover">
                    </a>
                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="/admins/profile"><i class="fa fa-user"></i> Thông tin</a>
                        <form id="logout" action="/logout" method="POST">
                            @csrf
                            <a class="nav-link" href="#" onclick="logout()"><i class="fa fa-power-off"></i>Đăng xuất</a>
                        </form>
                    </div>
                </div>
                <div class="language-select dropdown" id="language-select">
                    <div class="dropdown-menu" aria-labelledby="language">
                        <div class="dropdown-item">
                            <span class="flag-icon flag-icon-fr"></span>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-es"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-us"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-it"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->
    <div class="content mt-3">

        @yield('page')

    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src=" {{asset("admin/vendors/jquery/dist/jquery.min.js")}} "></script>
<script src=" {{asset("admin/vendors/popper.js/dist/umd/popper.min.js")}} "></script>
<script src=" {{asset("admin/vendors/bootstrap/dist/js/bootstrap.min.js")}} "></script>
<script src=" {{asset("admin/assets/js/main.js")}} "></script>

<script src=" {{asset("admin/vendors/chart.js/dist/Chart.bundle.min.js")}} "></script>
<script src=" {{asset("admin/assets/js/dashboard.js")}} "></script>
<script src=" {{asset("admin/assets/js/widgets.js")}} "></script>
<script src="{{asset("admin/vendors/peity/jquery.peity.min.js")}}"></script>
<!-- scripit init-->
<script src="{{asset("admin/assets/js/init-scripts/peitychart/peitychart.init.js")}}"></script>
<!-- scripit init-->
<script src=" {{asset("mainfe.js")}} "></script>
@yield('src')
