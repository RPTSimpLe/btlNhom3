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
                    <div class="top-filter-head">Sản phẩm</div>
                    <div class="common-filter">
                        <div class="head">Hãng sản xuất</div>
                        <ul>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Apple<span>(29)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Asus<span>(29)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Gionee<span>(19)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Micromax<span>(19)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
                        </ul>
                        </form>
                    </div>
                    <div class="common-filter">
                        <div class="head">Mức giá</div>
                        <div class="price-range-area">
                            <div id="price-range"></div>
                            <div class="value-wrapper d-flex">
                                <div class="price">Mức giá:</div>
                                <span>$</span>
                                <div id="lower-value"></div>
                                <div class="to">to</div>
                                <span>$</span>
                                <div id="upper-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->

                <!-- phân trang -->
                <div  class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="pagination">
                        <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                        <a href="#">6</a>
                        <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>

                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row " id="showProduct">
                        <!-- single product -->
                    </div>
                </section>
                <!-- End Best Seller -->
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="pagination">
                        <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                        <a href="#">6</a>
                        <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!-- End Filter Bar -->
            </div>
        </div>
    </div>


    <!-- Modal Quick Product View -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="container relative">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="product-quick-view">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="quick-view-carousel">
                                <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                </div>
                                <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                </div>
                                <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="quick-view-content">
                                <div class="top">
                                    <h3 class="head">Mill Oil 1000W Heater, White</h3>
                                    <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
                                    <div class="category">Category: <span>Household</span></div>
                                    <div class="available">Availibility: <span>In Stock</span></div>
                                </div>
                                <div class="middle">
                                    <p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
                                        looking for something that can make your interior look awesome, and at the same time give you the pleasant
                                        warm feeling during the winter.</p>
                                    <a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
                                </div>
                                <div class="bottom">
                                    <div class="color-picker d-flex align-items-center">Color:
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                    </div>
                                    <div class="quantity-container d-flex align-items-center mt-15">
                                        Quantity:
                                        <input type="text" class="quantity-amount ml-15" value="1" />
                                        <div class="arrow-btn d-inline-flex flex-column">
                                            <button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
                                            <button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
                                        </div>

                                    </div>
                                    <div class="d-flex mt-20">
                                        <a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
                                        <a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
                                        <a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        function showAll(){
            get("/showAllSP")
                .then(sanphams=>{
                    render(sanphams)
                })
        }
        showAll()
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
    </script>
    <script>
        var paginationLinks = document.querySelectorAll('.pagination a');

        paginationLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                paginationLinks.forEach(function(link) {
                    link.classList.remove('active');
                });
                this.classList.add('active');
                var pageNumber = parseInt(this.textContent);
                paginate(pageNumber);
            });
        });

        function paginate(pageNumber) {
            var itemsPerPage = 10;
            var startIndex = (pageNumber - 1) * itemsPerPage;
            var endIndex = startIndex + itemsPerPage;

            var items = document.getElementsByClassName('item');

            for (var i = 0; i < items.length; i++) {
                if (i >= startIndex && i < endIndex) {
                    items[i].style.display = 'block';
                } else {
                    items[i].style.display = 'none';
                }
            }
        }

    </script>
@endsection
</body>
</html>
