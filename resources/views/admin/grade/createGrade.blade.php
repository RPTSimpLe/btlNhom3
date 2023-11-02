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
    <form action="/admins/admin/createGrade" method="post" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <div class="row form-group">
            <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Tên lớp: </label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" placeholder="Nhập tên lớp" class="form-control" name="nameGrade">
                @error('nameGrade')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Khoa:</label></div>
            <div class="col-12 col-md-9">
                <select name="departmentId" id="idGrade" onchange="renderTeacher(this)" class="form-control">
                    <option value="">Chọn khoa</option>
                    @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->code}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Giáo viên chủ nhiệm:</label></div>
            <div class="col-12 col-md-9">
                <select name="gvcn" id="selectTeacher" class="form-control" required>
                    <option value="">Chọn giảng viên</option>
                </select>
            </div>
        </div>
        <div class="row form-group" style="margin-left: 93%;">
            <button type="submit" class="btn btn-primary">Tạo lớp</button>
        </div>
    </form>
@endsection
@section("src")
    <script>
        function renderTeacher(e) {
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
