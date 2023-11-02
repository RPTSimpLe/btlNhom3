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
                            <form action="" method="post" id="formEdit" enctype="multipart/form-data"
                                  class="form-horizontal" >
                                @csrf
                                @method('PATCH')
                                <div class="d-none">
                                    <input type="text" id="text-input" name="deId" class="form-control deId">
                                    <input type="text" id="text-input" name="gradeId" class="form-control gradeId">
                                    <input type="text" id="text-input" name="subId" class="form-control subId">
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên: </label></div>
                                    <div class="col-12 col-md-9 " ><input type="text" id="text-input" name="name"
                                                                          class="form-control name">
                                        @error('name')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Điểm KT1: </label></div>
                                    <div class="col-12 col-md-9 " ><input type="text" id="text-input" name="diemKT1"
                                                                          class="form-control diemKT1">
                                        @error('diemKT1')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Điểm KT2: </label></div>
                                    <div class="col-12 col-md-9 " ><input type="text" id="text-input" name="diemKT2"
                                                                          class="form-control diemKT2">
                                        @error('diemKT2')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Điểm thi: </label></div>
                                    <div class="col-12 col-md-9 " ><input type="text" id="text-input" name="diemThi"
                                                                          class="form-control diemThi">
                                        @error('diemKT2')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Hệ 4: </label></div>
                                    <div class="col-12 col-md-9 " ><input type="text" id="text-input"
                                                                          class="form-control he4"  disabled>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Hệ 10: </label></div>
                                    <div class="col-12 col-md-9 " ><input type="text" id="text-input" name="he10"
                                                                          class="form-control he10"  disabled>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Điểm chữ: </label></div>
                                    <div class="col-12 col-md-9 " ><input type="text" id="text-input" name="diemChu"
                                                                          class="form-control diemChu"  disabled>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Đánh giá: </label></div>
                                    <div class="col-12 col-md-9 " ><input type="text" id="text-input" name="danhGia"
                                                                          class="form-control danhGia"  disabled>
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
    <div class="row form-group">
        <div class="col-1"><label for="select" class=" form-control-label">Khoa:</label></div>
        <div class="col-3 ">
            <select onchange="renderGrade(this)" id="deId" class="form-control">
                @if(session('department')!=null)
                    <option value="{{session('department.id')}}">{{session('department.name')}}</option>
                @else
                    <option value="">Chọn khoa</option>
                @endif
                @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-1"><label for="select" class=" form-control-label">Lớp:</label></div>
        <div class="col-3">
            <select id="selectGrade" onchange="renderSubject(this.value)" class="form-control">
                @if(session('grade'))
                    <option value="{{session('grade.id')}}">{{session('grade.name')}}</option>
                @endif
            </select>
        </div>
        <div class="col-1"><label for="select" class=" form-control-label">Môn học:</label></div>
        <div class="col-3">
            <select id="subject" onchange="renderPoint(this.value)" class="form-control">
                @if(session('subject'))
                    <option value="{{session('subject.id')}}">{{session('subject.name')}}</option>
                @endif
            </select>
        </div>
        <div class="col-2" style="margin-top: 5px"><label for="text-input" class=" form-control-label">Giảng viên: </label></div>
        <div class="col-10 " style="margin-top: 5px; margin-left: -103px"><input type="text" id="teacher" name="" class="form-control" disabled>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <strong class="col-2 card-title">Danh sách điểm</strong>
                    @if (session('status') !== null)
                        <p class="col-10 text-sm text-success col-8">{{ session('status') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered listTable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Họ tên</th>
                        <th>Hệ 4</th>
                        <th>Hệ 10</th>
                        <th>Điểm chữ</th>
                        <th>Đánh giá</th>
                        <th>Chi tiết</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section("src")
    <script>
        let subjectSelect = document.getElementById("subject")
        let gradeSelect = document.getElementById("selectGrade")
        function renderSubject(e){
            get("/admins/admin/renderSubjecByGradeId/"+e)
                .then(subjects=>{
                    let html = ` <option value="">Chọn môn</option>`
                    for (const subject of subjects) {
                        html += ` <option value="${subject.id}">${subject.name}</option>`
                    }
                    subjectSelect.innerHTML+=html
                })
        }
        function renderGrade(e) {
            let selectGrade=document.getElementById("selectGrade")
            if(e.value != ""){
                get("/admins/admin/searchByDepartment/"+e.value).
                then(grades=>
                {
                    let html = `<option value="">Chọn lớp</option>`
                    for (const grade of grades) {
                        html+=`<option value="${grade.id}">${grade.name}</option>`
                    }
                        selectGrade.innerHTML+= html;
                })
            }
        }
        function renderPoint(e){
            get(`/admins/admin/showPoint/${e}/${gradeSelect.value}`)
                .then(points =>{
                    let html=``
                    for (const point of points) {
                        if (document.getElementById("teacher").value ==""){
                            document.getElementById("teacher").value = point[0].teacherName
                        }
                        point[0].DateOfBirth = formatDate(point[0].DateOfBirth)
                        html+=`
                        <tr>
                            <td>${point[0].studentId }</td>
                            <td>${point[0].studentName }</td>
                            <td>${point[0].he4!=null ? point[0].he4.toFixed(2): null }</td>
                            <td>${point[0].he10!=null ? point[0].he10.toFixed(2): null  }</td>
                            <td>${point[0].diemChu }</td>
                            <td>${point[0].danhGia }</td>
                            <td>
                                 <button type="button" class="btn btn-primary" data-toggle="modal"
                                       onclick='detail(${JSON.stringify(point[0])})'
                                        data-target="#chitiet">Chi tiết</button>
                            </td>
                        </tr>
                        `
                    }
                    document.querySelector("tbody").innerHTML= html
                })
        }
        function detail(student){
            let name= document.querySelector(".name")
            let deId= document.querySelector(".deId")
            let subId= document.querySelector(".subId")
            let gradeId= document.querySelector(".gradeId")
            let diemKT1 = document.querySelector(".diemKT1")
            let diemKT2 = document.querySelector(".diemKT2")
            let diemThi = document.querySelector(".diemThi")
            let he4 = document.querySelector(".he4")
            let he10 = document.querySelector(".he10")
            let diemChu = document.querySelector(".diemChu")
            let danhGia = document.querySelector(".danhGia")

            document.getElementById("formEdit").action = "/admins/admin/updatePoint/"+student.id;
            deId.value = document.getElementById("deId").value
            subId.value=subjectSelect.value
            gradeId.value=gradeSelect.value
            name.value = student.studentName;
            diemThi.value=student.diemThi
            diemKT1.value=student.diemKT1
            diemKT2.value=student.diemKT2
            he4.value = student.he4
            he10.value = student.he10
            diemChu.value = student.diemChu
            danhGia.value = student.danhGia
        }
        function formatDate(olddate){
            const date = new Date(olddate);
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();

            return `${day}/${month}/${year}`;
        }
    </script>
@endsection
</body>
</html>
