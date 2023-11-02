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
                                    <div class="col-12 col-md-9 " ><input type="text" id="text-input" name="namegrade"
                                                                          class="form-control name">
                                        @error('namegrade')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Khoa:</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="departmentId" id="department" class="form-control" onchange="renderTeacher(this)" required>

                                        </select>
                                        @error('departmentId')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Giáo viên chủ nhiêm:</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="gvcn" id="selectTeacher" class="form-control" required>

                                        </select>
                                        @error('gvcn')
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
                    <strong class="col-2 card-title">Danh sách lớp</strong>
                    @if (session('status') !== null)
                        <p class="col-10 text-sm text-success col-8">{{ session('status') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <form id="searchForm" action="/admins/admin/searchGrade" method="get">
                    <div class="row form-group">
                        <div class="search-label"><label for="text-input" class=" form-control-label">Tìm kiếm: </label></div>
                        <div class="col-4 " ><input type="text" id="search" name="" class="form-control">
                        </div>
                        <div class="col-4">
                            <select id="selectSearch" onchange="selectName(this);" class="form-control" required>
                                <option id="" value="">Tìm kiếm theo:</option>
                                <option id="" value="id">Id</option>
                                <option id="" value="name">Lớp</option>
                                <option id="" value="gvcn">Giáo viên chủ nhiệm</option>
                            </select>
                        </div>
                        <div class="col-2"><button type="submit" class="btn btn-primary">Tìm kiếm</button> </div>
                    </div>
                </form>
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered listTable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Khoa</th>
                        <th>Tên Lớp</th>
                        <th>Chủ nhiệm</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Thêm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $searchGrades = session('searchGrades') @endphp
                    @if($searchGrades!=null)
                        @php
                            $grades =$searchGrades;
                        @endphp
                    @endif
                    @foreach ($grades as $grade)
                        @if($searchGrades!=null)
                            @php
                                $grade->created_at=\Carbon\Carbon::parse($grade->created_at)->format("d/m/Y");
                                $grade->updated_at=\Carbon\Carbon::parse($grade->updated_at)->format("d/m/Y");
                            @endphp
                        @endif
                        @php $department = \App\Models\Grade::find($grade->id)->departments @endphp
                        <tr>
                            <td>{{ $grade->id }}</td>
                            <td>{{ $department->code }}</td>
                            <td>{{ $grade->name }}</td>
                            <td>{{ $grade->gvcn }}</td>
                            <td>{{ $grade->created_at }}</td>
                            <td>{{ $grade->updated_at}}</td>
                            <td style="max-width: 175px;"> <button type="button" class="btn btn-primary" data-toggle="modal"
                                                                   onclick='detail({{ json_encode($grade) }},{{ json_encode($department) }},"{{$grade->gvcn}}")'
                                                                   data-target="#chitiet">
                                    Cập nhật
                                </button>
                                <form id="delete_{{ $grade->id }}" class="deleteForm" action="/admins/admin/deleteGrade/{{ $grade->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <a class="nav-link btn btn-danger" href="#" onclick="deletee({{ $grade->id }})"> Xóa</a>
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
        function detail(grade,department,gvcn){
            let name= document.querySelector(".name")
            let id= document.querySelector(".id")
            document.getElementById("formEditProfile").action = "/admins/admin/updateGrade/"+grade.id;
            id.value = grade.id
            name.value = grade.name;

            renderDepartment(department,grade,gvcn)
        }
        function renderDepartment(department,grade,gvcn){
            let departmentElement = document.getElementById("department")
            let html = `<option value="${department.id}">${department.name}</option>`
            get("/admins/admin/getAllDepartment")
                .then(departments=> {
                    for (const department1 of departments) {
                        if (department1.id!=department.id) {
                            html += `<option value="${department1.id}">${department1.name}</option>`
                        }
                    }
                    departmentElement.innerHTML= html
                })

            let selectTeacher=document.getElementById("selectTeacher")
            get("/admins/admin/searchTeacherByDepartment/"+department.id).
            then(teachers=>
            {
                let html = `<option value= "${gvcn}" >${gvcn}</option>`
                for (const teacher of teachers) {
                    html+=`<option value="${teacher.code} - ${teacher.name}">${teacher.code} - ${teacher.name}</option>`
                    selectTeacher.innerHTML= html;
                }
            })
        }
        function renderTeacher(e) {
            console.log(e.value)
            let selectTeacher=document.getElementById("selectTeacher")
            if(e.value != ""){
                get("/admins/admin/searchTeacherByDepartment/"+e.value).
                then(teachers=>
                {
                    let html = `<option value="">Chọn giảng viên</option>`
                    for (const teacher of teachers) {
                        html+=`<option value="${teacher.code} - ${teacher.name}">${teacher.code} - ${teacher.name}</option>`
                        selectTeacher.innerHTML= html;
                    }
                })
            }
        }
    </script>
@endsection
</body>
</html>
