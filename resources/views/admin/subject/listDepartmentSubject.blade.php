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
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Môn học: </label></div>
                                    <div class="col-12 col-md-9 " >
                                        <select name="idSubject" id="nameSubject" class="form-control"  onchange="renderDepartmentWhenChoose(this.value)" required>

                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Khoa: </label></div>
                                    <div class="col-12 col-md-9 " >
                                        <select name="departmentId" id="nameDepartment" class="form-control" required>

                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tín chỉ: </label></div>
                                    <div class="col-12 col-md-9 " ><input type="number" id="text-input" name="creditUnit"
                                                                          class="form-control creditUnit">
                                        @error('creditUnit')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số buổi: </label></div>
                                    <div class="col-12 col-md-9 " ><input type="text" id="text-input" name="lessonCount"
                                                                          class="form-control lessonCount">
                                        @error('lessonCount')
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
                    <strong class="col-2 card-title">Danh sách môn theo khoa</strong>
                    @if (session('status') !== null)
                        <p class="col-10 text-sm text-success col-8">{{ session('status') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <form id="searchForm" action="/admins/admin/searchdepartmentSubject" method="get">
                    <div class="row form-group">
                        <div class="search-label"><label for="text-input" class=" form-control-label">Tìm kiếm: </label></div>
                        <div class="col-4 " ><input type="text" id="search" name="" class="form-control">
                        </div>
                        <div class="col-4">
                            <select id="selectSearch" onchange="selectName(this);" class="form-control" required>
                                <option id="" value="">Tìm kiếm theo:</option>
                                <option id="" value="id">Id</option>
                                <option id="" value="name">Tên</option>
                            </select>
                        </div>
                        <div class="col-2"><button type="submit" class="btn btn-primary">Tìm kiếm</button> </div>
                    </div>
                </form>
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered listTable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên môn</th>
                        <th>Khoa</th>
                        <th>Tín chỉ</th>
                        <th>Số buổi</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Thêm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $searchdepartmentSubjectss = session('searchdepartmentSubjectss') @endphp
                    @if($searchdepartmentSubjectss!=null)
                        @php
                            $departmentSubjects =$searchdepartmentSubjectss;
                        @endphp
                    @endif
                    @foreach ($departmentSubjects as $departmentSubject)
                        @php
                            $departmentSubject->created_at=\Carbon\Carbon::parse($departmentSubject->created_at)->format("d/m/Y");
                            $departmentSubject->updated_at=\Carbon\Carbon::parse($departmentSubject->updated_at)->format("d/m/Y");
                        @endphp
                        <tr>
                            <td>{{ $departmentSubject->id }}</td>
                            <td>{{ $departmentSubject->subjectName }}</td>
                            <td>{{ $departmentSubject->departmentName }}</td>
                            <td>{{ $departmentSubject->creditUnit }}</td>
                            <td>{{ $departmentSubject->lessonCount }}</td>
                            <td>{{ $departmentSubject->created_at }}</td>
                            <td>{{ $departmentSubject->updated_at}}</td>
                            <td style="max-width: 175px;"> <button type="button" class="btn btn-primary" data-toggle="modal"
                                                                   onclick='detail({{ json_encode($departmentSubject) }})'
                                                                   data-target="#chitiet">
                                    Cập nhật
                                </button>
                                <form id="delete_{{ $departmentSubject->id }}" class="deleteForm" action="/admins/admin/deleteDeSubject/{{ $departmentSubject->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <a class="nav-link btn btn-danger" href="#" onclick="deletee({{ $departmentSubject->id }})"> Xóa</a>
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
            let nameSubject= document.getElementById("nameSubject")
            let nameDepartment= document.getElementById("nameDepartment")
            let creditUnit= document.querySelector(".creditUnit")
            let lessonCount=document.querySelector(".lessonCount")
        function detail(departmentSubject){
            document.getElementById("formEditProfile").action = "/admins/admin/updateDepartmentSubject/"+departmentSubject.id;
            creditUnit.value = departmentSubject.creditUnit
            lessonCount.value = departmentSubject.lessonCount

            get("/admins/admin/renderSubject")
                .then(subjects=>{
                    let html=`<option value="${departmentSubject.subjectId}">${departmentSubject.subjectName}</option>`
                    for (const subject of subjects) {
                        if (subject.id!=departmentSubject.subjectId){
                            html += `<option value="${subject.id}">${subject.name}</option>`
                        }
                    }
                    nameSubject.innerHTML=html
                })

            get("/admins/admin/renderDepartment")
                .then(departments=>{
                    let html=`<option value="${departmentSubject.departmentId}">${departmentSubject.departmentName}</option>`
                    for (const department of departments) {
                        if (department.id!=departmentSubject.departmentId){
                            html += `<option value="${department.id}">${department.name}</option>`
                        }
                    }
                    nameDepartment.innerHTML=html
                })
        }
        function renderDepartmentWhenChoose(e){
            get("/admins/admin/renderDepartmentSubject/"+e)
                .then(departments => {
                    let html=`<option value="">Chọn khoa</option>`
                    for (const department of departments) {
                        html += `<option value="${department.id}">${department.name}</option>`
                    }
                    nameDepartment.innerHTML=html
                })
        }
    </script>
@endsection
</body>
</html>
