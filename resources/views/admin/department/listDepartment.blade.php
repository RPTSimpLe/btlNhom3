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
@extends("admin.layout.layout")
@section("page")
    <div class="modal fade" id="chitiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                    <div class="col-12 col-md-9 " ><input type="text" id="text-input" name="id"
                                                                          class="form-control id">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên: </label></div>
                                    <div class="col-12 col-md-9 " ><input type="text" id="text-input" name="nameDepartment"
                                                                          class="form-control name">
                                        @error('nameDepartment')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mã: </label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="codeDepartment"
                                                                        class="form-control code">
                                        @error('codeDepartment')
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
                    <strong class="col-2 card-title">Danh sách khoa</strong>
                    @if (session('status') !== null)
                        <p class="col-10 text-sm text-success col-8">{{ session('status') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <form id="searchForm" action="/admins/admin/searchDepartment" method="get">
                    <div class="row form-group">
                        <div class="search-label"><label for="text-input" class=" form-control-label">Tìm kiếm: </label></div>
                        <div class="col-4 " ><input type="text" id="search" name="" class="form-control">
                        </div>
                        <div class="col-4">
                            <select id="selectSearch" onchange="selectName(this);" class="form-control" required>
                                <option id="" value="">Tìm kiếm theo:</option>
                                <option id="" value="id">Id</option>
                                <option id="" value="name">Tên</option>
                                <option id="" value="code">Mã</option>
                            </select>
                        </div>
                        <div class="col-2"><button type="submit" class="btn btn-primary">Tìm kiếm</button> </div>
                    </div>
                </form>
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered listTable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Mã</th>
                        <th>Tên Khoa</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Thêm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $searchDepartments = session('searchDepartments') @endphp
                    @if($searchDepartments!=null)
                        @php
                            $departments =$searchDepartments;
                        @endphp
                    @endif
                    @foreach ($departments as $department)
                        @if($searchDepartments!=null)
                            @php
                                $department->created_at=\Carbon\Carbon::parse($department->created_at)->format("d/m/Y");
                                $department->updated_at=\Carbon\Carbon::parse($department->updated_at)->format("d/m/Y");
                            @endphp
                        @endif
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{ $department->code }}</td>
                            <td>{{ $department->name }}</td>
                            <td>{{ $department->created_at }}</td>
                            <td>{{ $department->updated_at}}</td>
                            <td style="max-width: 175px;"> <button type="button" class="btn btn-primary" data-toggle="modal" onclick="detail({{ json_encode($department) }})" data-target="#chitiet">
                                    Cập nhật
                                </button>
                                <form id="delete_{{ $department->id }}" class="deleteForm" action="/admins/admin/deleteDepartment/{{ $department->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <a class="nav-link btn btn-danger" href="#" onclick="deletee({{ $department->id }})"> Xóa</a>
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
        function detail(department){
            let name= document.querySelector(".name")
            let code= document.querySelector(".code")
            let id= document.querySelector(".id")
            document.getElementById("formEditProfile").action = "/admins/admin/updateDepartment/"+department.id;
            id.value = department.id
            name.value = department.name;
            code.value = department.code;
        }
    </script>
@endsection
</body>
</html>
