<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, danhGia-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends("admin.layout.layout")
@section("page")
    <style>
        .listTable td{
            white-space: normal;
        }
    </style>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <strong class="col-2 card-title">Danh sách đánh giá</strong>
                    @if (session('status') !== null)
                        <p class="col-10 text-sm text-success col-8">{{ session('status') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <form id="searchForm" action="/admins/admin/searchDanhGia" method="get">
                    <div class="row form-group">
                        <div class="search-label"><label for="text-input" class=" form-control-label">Tìm kiếm: </label></div>
                        <div class="col-4 " ><input type="text" id="search" name="" class="form-control">
                        </div>
                        <div class="col-4">
                            <select id="selectSearch" onchange="selectName(this);" class="form-control" required>
                                <option id="" value="">Tìm kiếm theo:</option>
                                <option id="" value="name">Khách hàng</option>
                                <option id="" value="ten">Sản phẩm</option>
                                <option id="" value="soSao">Sao</option>
                                <option id="" value="danhGia">Đánh giá</option>
                            </select>
                        </div>
                        <div class="col-2"><button type="submit" class="btn btn-primary">Tìm kiếm</button> </div>
                    </div>
                </form>
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered listTable">
                    <thead>
                    <tr>
                        <th class="col-2">Người dùng</th>
                        <th class="col-4">Sản phẩm</th>
                        <th class="col-1">Sao</th>
                        <th class="col-4">Đánh giá</th>
                        <th class="col-1">Thêm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $searchDanhGias = session('searchDanhGias') @endphp
                    @if($searchDanhGias!=null)
                        @php
                            $danhGias =$searchDanhGias;
                        @endphp
                    @endif
                    @foreach ($danhGias as $danhGia)
                        <tr>
                            <td>{{ \App\Models\User::find($danhGia->user_id)->name }}</td>
                            <td  >{{ \App\Models\sanPham::find($danhGia->sanPham_id)->ten }}</td>
                            <td >{{ $danhGia->soSao }}</td>
                            <td >{{ $danhGia->danhGia }}</td>
                            <td>
                                <form id="delete_{{ $danhGia->id }}" class="deleteForm" action="/admins/admin/deleteDanhGia/{{ $danhGia->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <a class="nav-link btn btn-danger" href="#" onclick="deletee({{ $danhGia->id }})"> Xóa</a>
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
@endsection
</body>
</html>
