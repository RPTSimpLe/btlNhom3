<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, sanPham-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends("admin.layout.layout")
@section("page")
    <div class="modal fade" id="chitiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <img style="height: 226.771px; width: 161.181px; object-fit: cover" src="" id="image"
                                 alt="Vui lòng thêm ảnh đại diện">
                        </div>
                        <div class="col-9">
                            <form action="" method="post" id="formEditProfile" enctype="multipart/form-data"
                                  class="form-horizontal" >
                                @csrf
                                @method('PATCH')
                                <div class="row form-group d-none">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id: </label></div>
                                    <div class="col-12 col-md-9 " id="name"><input type="text" id="text-input" name="id"
                                                                                   class="form-control id">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên: </label></div>
                                    <div class="col-12 col-md-9 " id="name"><input type="text" id="text-input" name="tenSPmoi"
                                                                                   class="form-control ten">
                                        @error('tenSPmoi')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Hãng: </label></div>
                                    <div class="col-12 col-md-9 " id="name"><input type="text" id="text-input" name="nhaSX"
                                                                                   class="form-control nhaSX">
                                        @error('nhaSX')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tồn kho: </label></div>
                                    <div class="col-12 col-md-9 " id="name"><input type="text" id="text-input" name="tonKho"
                                                                                   class="form-control tonKho">
                                        @error('tonKho')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Bảo hành: </label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" class="form-control baoHanh" name="baoHanh">
                                        @error('baoHanh')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Giá nhập: </label></div>
                                    <div class="col-12 col-md-9 " id="name"><input type="text" id="text-input" name="giaNhap"
                                                                                   class="form-control giaNhap">
                                        @error('giaNhap')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Giá bán: </label></div>
                                    <div class="col-12 col-md-9 " id="name"><input type="text" id="text-input" name="giaBan"
                                                                                   class="form-control giaBan">
                                        @error('giaBan')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Năm sản xuất: </label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" class="form-control namSX" name="namSX">
                                        @error('namSX')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô tả:</label></div>
                                    <div class="col-12 col-md-9"><textarea name="moTa" id="textarea-input" rows="9"  class="form-control moTa"></textarea>
                                        @error('moTa')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh đại diện: </label>
                                    </div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="img"
                                                                        class="form-control-file">
                                        @error('img')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group" style="margin-left: 89%;">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <strong class="col-2 card-title">Danh sách sản phẩm</strong>
                    @if (session('status') !== null)
                        <p class="col-10 text-sm text-success col-8">{{ session('status') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <form id="searchForm" action="/admins/admin/searchSanPham" method="get">
                    <div class="row form-group">
                        <div class="search-label"><label for="text-input" class=" form-control-label">Tìm kiếm: </label></div>
                        <div class="col-4 " ><input type="text" id="search" name="" class="form-control">
                        </div>
                        <div class="col-4">
                            <select id="selectSearch" onchange="selectName(this);" class="form-control" required>
                                <option id="" value="">Tìm kiếm theo:</option>
                                <option id="" value="id">Id</option>
                                <option id="" value="tenDanhMuc">Danh mục</option>
                                <option id="" value="ten">Tên</option>
                                <option id="" value="tonKho">Tồn kho</option>
                                <option id="" value="giaNhap">Giá nhập</option>
                                <option id="" value="giaBan">Giá bán</option>
                            </select>
                        </div>
                        <div class="col-2"><button type="submit" class="btn btn-primary">Tìm kiếm</button> </div>
                    </div>
                </form>
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered listTable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Danh mục</th>
                        <th >Tên</th>
                        <th>Tồn kho</th>
                        <th>Giá nhập</th>
                        <th>Giá bán</th>
                        <th>Thêm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $searchSanPhams = session('searchSanPhams') @endphp
                    @if($searchSanPhams!=null)
                        @php
                            $sanPhams =$searchSanPhams;
                        @endphp
                    @endif
                    @foreach ($sanPhams as $sanPham)
                        <tr>
                            <td style="max-width: 45px; overflow-x: ">{{ $sanPham->id }}</td>
                            <td>{{ $sanPham->tenDanhMuc }}</td>
                            <td >{{ $sanPham->ten }}</td>
                            <td >{{ $sanPham->tonKho }}</td>
                            <td >{{ $sanPham->giaNhap }}</td>
                            <td >{{ $sanPham->giaBan }}</td>
                            <td style="max-width: 195px; overflow-x: "> <button type="button" class="btn btn-primary" data-toggle="modal" onclick="detail({{ json_encode($sanPham) }})" data-target="#chitiet">
                                    Chi tiết
                                </button>
                                <form id="delete_{{ $sanPham->id }}" class="deleteForm" action="/admins/admin/deleteSanPham/{{ $sanPham->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <a class="nav-link btn btn-danger" href="#" onclick="deletee({{ $sanPham->id }})"> Xóa</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('src')
    <script>
        function detail($sanPham){
            let ten= document.querySelector(".ten")
            let nhaSX= document.querySelector(".nhaSX")
            let tonKho= document.querySelector(".tonKho")
            let baoHanh= document.querySelector(".baoHanh")
            let giaNhap= document.querySelector(".giaNhap")
            let giaBan= document.querySelector(".giaBan")
            let namSX= document.querySelector(".namSX")
            let moTa= document.querySelector(".moTa")
            let ids= document.querySelectorAll(".id")
            let image= document.getElementById("image")

            document.getElementById("formEditProfile").action = "/admins/admin/updateSanPham/"+$sanPham.id;
            for (const id of ids) {
                id.value = $sanPham.id
            }
            ten.value= $sanPham.ten
            nhaSX.value = $sanPham.nhaSX
            tonKho.value = $sanPham.tonKho
            baoHanh.value = $sanPham.baoHanh
            giaBan.value = $sanPham.giaBan
            giaNhap.value = $sanPham.giaNhap
            namSX.value = $sanPham.namSX
            moTa.value = $sanPham.moTa

            image.src=""
            getLinkImgPro($sanPham.id)
        }
    </script>
    @endsection
    </body>
    </html>
