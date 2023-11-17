<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, danhMuc-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên danh mục: </label></div>
                                    <div class="col-12 col-md-9 " id="name"><input type="text" id="text-input" name="danhMucMoi"
                                                                                   class="form-control ten">
                                        @error('danhMucMoi')
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
                    <strong class="col-2 card-title">Danh sách danh mục</strong>
                    @if (session('status') !== null)
                        <p class="col-10 text-sm text-success col-8">{{ session('status') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <form id="searchForm" action="/admins/admin/searchDanhMuc" method="get">
                    <div class="row form-group">
                        <div class="search-label"><label for="text-input" class=" form-control-label">Tìm kiếm: </label></div>
                        <div class="col-4 " ><input type="text" id="search" name="" class="form-control">
                        </div>
                        <div class="col-4">
                            <select id="selectSearch" onchange="selectName(this);" class="form-control" required>
                                <option id="" value="">Tìm kiếm theo:</option>
                                <option id="" value="id">Id</option>
                                <option id="" value="ten">Tên danh mục</option>
                            </select>
                        </div>
                        <div class="col-2"><button type="submit" class="btn btn-primary">Tìm kiếm</button> </div>
                    </div>
                </form>
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered listTable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th >Tên danh mục</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Thêm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $searchDanhMucs = session('searchDanhMucs') @endphp
                    @if($searchDanhMucs!=null)
                        @php
                            $danhMucs =$searchDanhMucs;
                        @endphp
                    @endif
                    @foreach ($danhMucs as $danhMuc)
                        @if($searchDanhMucs!=null)
                            @php
                                $danhMuc->created_at=\Carbon\Carbon::parse($danhMuc->created_at)->format("d/m/Y");
                                $danhMuc->updated_at=\Carbon\Carbon::parse($danhMuc->updated_at)->format("d/m/Y");
                            @endphp
                        @endif
                        <tr>
                            <td style="max-width: 45px; overflow-x: ">{{ $danhMuc->id }}</td>
                            <td >{{ $danhMuc->ten }}</td>
                            <td style="max-width: 114px; overflow-x: ">{{ $danhMuc->created_at }}</td>
                            <td style="max-width: 114px; overflow-x: ">{{ $danhMuc->updated_at}}</td>
                            <td style="max-width: 195px; overflow-x: "> <button type="button" class="btn btn-primary" data-toggle="modal" onclick="detail({{ json_encode($danhMuc) }})" data-target="#chitiet">
                                    Chi tiết
                                </button>
                                <form id="delete_{{ $danhMuc->id }}" class="deleteForm" action="/admins/admin/deleteDanhMuc/{{ $danhMuc->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <a class="nav-link btn btn-danger" href="#" onclick="deletee({{ $danhMuc->id }})"> Xóa</a>
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
        function detail($danhMuc){
            let ten= document.querySelector(".ten")
            let ids= document.querySelectorAll(".id")
            document.getElementById("formEditProfile").action = "/admins/admin/updateDanhMuc/"+$danhMuc.id;
            for (const id of ids) {
                id.value = $danhMuc.id
            }
            ten.value= $danhMuc.ten
        }
    </script>
@endsection
</body>
</html>
