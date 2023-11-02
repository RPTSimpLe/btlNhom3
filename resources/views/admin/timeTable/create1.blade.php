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
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Khoa: </label></div>
        <div class="col-12 col-md-9 " >
            <select  id="nameDepartment" class="form-control" onchange="renderSubject(this.value)" required>
                <option value="">Chọn khoa</option>
                @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Khoa: </label></div>
        <div class="col-12 col-md-9 " >
            <select  id="nameGrade" class="form-control" required>
                <option value="">Chọn lớp</option>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Học phí một tín: </label></div>
        <div class="col-12 col-md-9">
            <input type="number" id="text-input" class="form-control" name="creditUnit">
        </div>
    </div>
    <div id="layoutForm" hidden>
        <div class="row form-group " id="formTimeTable" >
            <form action="/admins/admin/createDepartmentSubject" method="post" class="form-horizontal" style="width: 50%">
                <h5>Môn 1:</h5>
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">idKhoa: </label></div>
                    <div class="col-12">
                        <input type="number" id="text-input" class="form-control departmentId" name="departmentId">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">idlớp: </label></div>
                    <div class="col-12">
                        <input type="number" id="text-input" class="form-control gradeId" name="gradeId">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Học phí một tín: </label></div>
                    <div class="col-12">
                        <input type="number" id="text-input" class="form-control" name="creditUnit">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-3 col-md-3"><label for="select" class=" form-control-label">Môn học: </label></div>
                    <div class="col-12">
                        <select name="idSubject" id="subject" class="form-control" required>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Giảng viên: </label></div>
                    <div class="col-12">
                        <select name="teacherId" id="teacher" class="form-control" required>

                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Từ ngày: </label></div>
                    <div class="col-12">
                        <input type="date" id="text-input"  class="form-control" name="dateStartStudy">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Đến ngày: </label></div>
                    <div class="col-12">
                        <input type="date" id="text-input"  class="form-control" name="dateEndStudy">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Giờ học: </label></div>
                    <div class="col-12">
                        <select name="lessonId" id="lesson" class="form-control" required>

                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="row form-group" >
            <button class="btn btn-info" onclick="renderForm()">Thêm môn</button>
        </div>
    </div>
@endsection
@section("src")
    <script>
        function renderSubject(e){
            renGrade(e)
            if(e!="") {
                document.getElementById("layoutForm").removeAttribute("hidden")
                get("/admins/admin/renderDepartmentSubjectByDeId/"+e)
                    .then(subjects=>{
                        let html = ` <option value="">Chọn môn</option>`
                        for (const subject of subjects) {
                            html += ` <option value="${subject.subjectId}">${subject.subjectName}</option>`
                        }
                        document.getElementById("subject").innerHTML=html
                    })
            }
        }
        function renGrade(e){
            get("/admins/admin/searchByDepartment/"+e)
                .then(grades=>{
                    let html = ` <option value="">Chọn lớp</option>`
                    for (const grade of grades) {
                        html += ` <option value="${grade.id}">${grade.name}</option>`
                    }
                    document.getElementById("nameGrade").innerHTML=html
                })
        }
        var x=1

        function renderForm(){
            let formx = document.getElementById(`formTimeTable`)
            x++;
            let renForm = `
                 <form action="/admins/admin/createDepartmentSubject" method="post" class="form-horizontal" style="width: 50%">
                <h5>Môn ${x}:</h5>
                @csrf
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">idKhoa: </label></div>
                <div class="col-12">
                    <input type="number" id="text-input" class="form-control departmentId" name="departmentId">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">idlớp: </label></div>
                <div class="col-12">
                    <input type="number" id="text-input" class="form-control gradeId" name="gradeId">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Học phí một tín: </label></div>
                <div class="col-12">
                    <input type="number" id="text-input" class="form-control" name="creditUnit">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-3 col-md-3"><label for="select" class=" form-control-label">Môn học: </label></div>
                <div class="col-12">
                    <select name="idSubject" id="subject" class="form-control" required>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Giảng viên: </label></div>
                <div class="col-12">
                    <select name="teacherId" id="teacher" class="form-control" required>

                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Từ ngày: </label></div>
                <div class="col-12">
                    <input type="date" id="text-input"  class="form-control" name="dateStartStudy">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Đến ngày: </label></div>
                <div class="col-12">
                    <input type="date" id="text-input"  class="form-control" name="dateEndStudy">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Giờ học: </label></div>
                <div class="col-12">
                    <select name="lessonId" id="lesson" class="form-control" required>

                    </select>
                </div>
            </div>
        </form>
`
            formx.insertAdjacentHTML("beforeend",renForm);
        }
    </script>
@endsection
</body>
</html>
