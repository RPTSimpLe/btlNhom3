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
    <div class="row form-group">
        <div class="col-12"><label for="select" class=" form-control-label">Bạn muốn thêm môn học mới hay thêm môn học đã có vào khoa? </label>
            @error('nameSubject')
            <small class="form-text">{{ $message }}</small>
            @enderror
            @if (session('status') !== null)
                <p class="col-10 text-sm text-success col-8">{{ session('status') }}</p>
            @endif
        </div>
        <div class="col-6">
            <select onchange="renderSubjectForm(this)" class="form-control" required>
                <option value="">Chọn</option>
                <option value="1">Thêm mới</option>
                <option value="2">Đã có</option>
            </select>
        </div>
    </div>
    <div id="new" hidden>
        <h4>Thêm môn học mới </h4>
        <form action="/admins/admin/createSubject" method="post" class="form-horizontal" style="width: 50%">
            @csrf
            <div class="row form-group">
                <div class="col-3 "><label for="text-input" class=" form-control-label">Tên môn học: </label></div>
                <div class="col-12">
                    <input type="text" id="text-input" placeholder="Nhập tên môn" class="form-control" name="nameSubject">
                </div>
            </div>
            <div class="row form-group" style="margin-left: 80%;">
                <button type="submit" class="btn btn-primary">Tạo môn học</button>
            </div>
        </form>
    </div>
    <div id="builtIn" hidden>
        <form action="/admins/admin/createDepartmentSubject" method="post" class="form-horizontal" style="width: 50%">
            @csrf
            <div class="row form-group">
                <div class="col-3"><label for="select" class=" form-control-label">Môn học: </label></div>
                <div class="col-12">
                    <select name="idSubject" id="subject" class="form-control" onchange="renderDepartment(this.value)" required>
                        <option value="">Chọn môn</option>
                        @foreach($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-3 "><label for="text-input" class=" form-control-label">Số tín chỉ: </label></div>
                <div class="col-12">
                    <input type="number" id="text-input" placeholder="Nhập số tín chỉ" class="form-control" name="creditUnit">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-3 "><label for="text-input" class=" form-control-label">Số buổi: </label></div>
                <div class="col-12">
                    <input type="text" id="text-input" placeholder="Nhập số buổi" class="form-control" name="lessonCount">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Khoa: </label></div>
                <div class="col-12">
                    <select name="departmentId" id="department" class="form-control" required>

                    </select>
                </div>
            </div>
            <div class="row form-group" style="margin-left: 80%;">
                <button type="submit" class="btn btn-primary">Thêm môn học</button>
            </div>
        </form>
    </div>
@endsection
@section("src")
    <script>
        function renderSubjectForm(e){
            if(e.value == "1"){
                document.getElementById("new").removeAttribute("hidden")
                document.getElementById("builtIn").setAttribute("hidden","true")
            }else if(e.value == "2") {
                document.getElementById("builtIn").removeAttribute("hidden")
                document.getElementById("new").setAttribute("hidden","true")
            }
        }
        function renderDepartment(e){
            departmentElement =document.getElementById("department")
            get("/admins/admin/renderDepartmentSubject/"+e)
                .then(departments=> {
                    let html=``
                    for (const department1 of departments) {
                            html += `<option value="${department1.id}">${department1.name}</option>`
                    }
                    departmentElement.innerHTML= html
                })
        }
    </script>
@endsection
</body>
</html>
