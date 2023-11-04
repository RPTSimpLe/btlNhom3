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
                    <h1>Danh mục sản phẩm</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/dashboard">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="/user/category">Danh mục</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Theo nhu cầu</div>
                    <ul class="main-categories">

                    </ul>
                </div>
                <div class="sidebar-filter mt-50">
                    <div class="top-filter-head"></div>
                    <div class="common-filter">
                    </div>
                    <div class="common-filter">

                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->

                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row " id="showProduct">
                        <!-- single product -->
                    </div>
                </section>
                <!-- End Best Seller -->

                <!-- phân trang -->
                <div id="phanTrang"></div>
            </div>
        </div>
    </div>

@endsection
@section("src")
    <script>
        get("/danhSachDanhMuc")
            .then(danhMucs =>{
                    let html=``
                for (const danhMuc of danhMucs) {
                    html+= `  <li class="main-nav-list child"><a href="#" id="${danhMuc.id}" onclick="hienSP(this.id)">${danhMuc.ten}</a></li>`
                }
                document.querySelector(".main-categories").innerHTML=html
                huySuKienTheA()
            })
        function hienSP(e){
            get("/timKiemBangIdDanhMuc/"+e)
                .then(sanPhams=>{
                    render(sanPhams)
                })
        }
        function huySuKienTheA(){
            const sections = document.querySelectorAll('section');
            sections.forEach(section => {
                const links = section.querySelectorAll('a');
                links.forEach(link => {
                    // Hủy sự kiện reload khi click vào thẻ a
                    link.addEventListener('click', (event) => {
                        event.preventDefault();
                    });
                });
            });
        }
        function render(sanPhams){
            let html=``
            for (const sanPham of sanPhams) {
                html+= `
                            <div class="col-lg-4 col-md-6" xmlns="http://www.w3.org/1999/html">
                            <div class="single-product">
                                <img class="img-fluid" src="/images/${sanPham.url}" alt="">
                                <div class="product-details">
                                    <h6>${sanPham.ten}</h6>
                                    <div class="price">
                                        <h6>${sanPham.giaBan}đ</h6>
                                    </div>
                                    <div class="">
                                        <p>Số lượng: ${sanPham.tonKho}</p>
                                    </div>
                                    <div class="prd-bottom">
                                            <a href="/user/themVaoGio?sanPhamId=${sanPham.id}&soLuong=1&gia=${sanPham.giaBan}" class="social-info" onclick="themGio(${sanPham.id})">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Thêm </p>
                                        </a>
                                        <a href="/chiTietSanPham/${sanPham.id}" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Chi tiết</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        `
            }
            document.getElementById("showProduct").innerHTML=html
        }
        const limit = 6
        const _$ = $;
        function showPagination({
                                    totalItems,
                                    limit,
                                    currentPage,
                                    onPageClick
                                }) {
            _$("#phanTrang").pagination({
                items: totalItems,
                itemsOnPage: limit,
                currentPage,
                prevText: "&laquo;",
                nextText: "&raquo;",
                onPageClick: onPageClick
            });
        }
        function phanTrangSp({page, limit}) {
            get(`/showAllSP?page=${page}&limit=${limit}`)
                .then(sPs => {
                    render(sPs[0])
                    _$("#phanTrang").pagination("destroy");

                    showPagination({
                        totalItems: sPs[1],
                        limit,
                        currentPage: page,
                        onPageClick: function (pageNumber) {
                            phanTrangSp({page: pageNumber, limit})

                        }
                    })
                })
        }

        phanTrangSp({
            page: 1,
            limit: limit
        })
    </script>
@endsection
</body>
</html>
