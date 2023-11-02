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
                        <div class="col-12">
                            <form action="/admins/admin/createTimeTable" method="post" class="form-horizontal">
                                @csrf
                                <div class="row form-group" hidden>
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">idKhoa: </label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="departmentId" class="form-control departmentId" name="departmentId" >
                                    @error('departmentId')
                                    <small class="form-text">{{ $message }}</small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row form-group" hidden>
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">idlớp: </label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="gradeId" class="form-control gradeId" name="gradeId">
                                    @error('gradeId')
                                    <small class="form-text">{{ $message }}</small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Học phí một tín: </label></div>
                                    <div class="col-12 col-md-9">
                                        @if(isset($fee_1_credit))
                                            <input type="number" id="text-input" value="{{$fee_1_credit}}" name="fee_1_credit" class="fee form-control">
                                        @else
                                            <input type="number" id="text-input" value="0" name="fee_1_credit" class="fee form-control">
                                        @endif
                                    @error('fee_1_credit')
                                    <small class="form-text">{{ $message }}</small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-3 col-md-3"><label for="select" class=" form-control-label">Môn học: </label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="idSubject" id="subject" class="form-control" required>
                                        </select>
                                    @error('idSubject')
                                    <small class="form-text">{{ $message }}</small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Giảng viên: </label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="teacherId" id="teacher" class="form-control" required>

                                        </select>
                                    @error('teacherId')
                                    <small class="form-text">{{ $message }}</small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Thứ: </label></div>
                                    <div class="col-12 col-md-9">
                                        <select id="teacher" class="form-control" name="day" required>
                                            <option value="Thứ 2">Thứ 2</option>
                                            <option value="Thứ 3">Thứ 3</option>
                                            <option value="Thứ 4">Thứ 4</option>
                                            <option value="Thứ 5">Thứ 5</option>
                                            <option value="Thứ 6">Thứ 6</option>
                                            <option value="Thứ 7">Thứ 7</option>
                                            <option value="Chủ nhật">Chủ nhật</option>
                                        </select>
                                    @error('day')
                                    <small class="form-text">{{ $message }}</small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Từ ngày: </label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="text-input"  class="form-control" name="dateStartStudy">
                                    @error('dateStartStudy')
                                    <small class="form-text">{{ $message }}</small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Đến ngày: </label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="text-input"  class="form-control" name="dateEndStudy">
                                    @error('dateEndStudy')
                                    <small class="form-text">{{ $message }}</small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Giờ học: </label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="lessonId" id="lesson" class="form-control" required>

                                        </select>
                                    @error('lessonId')
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
        @if($errors->all())
        <div><small class="form-text">Có lỗi xảy ra vui lòng thêm lại!</small></div>
        @endif
    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Khoa: </label></div>
        <div class="col-12 col-md-9 " >
            <select  id="nameDepartment" class="form-control" onchange="renderSubject(this.value)" required>
                    @if(isset($department))
                        <option value="{{$department->id}}">{{$department->name}}</option>
                    @else
                        <option value="">Chọn khoa</option>
                @endif
                    @foreach($departments as $department1)
                        <option value="{{$department1->id}}">{{$department1->name}}</option>
                    @endforeach
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Lớp: </label></div>
        <div class="col-12 col-md-9 " >
            <select  id="nameGrade" class="form-control" onchange="renderTimeTable(this.value)" required>
                @if(isset($grade))
                    <option id="back" value="{{$grade->id}}">{{$grade->name}}</option>
                @endif

            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tổng học phí: </label></div>
        <div class="col-12 col-md-9">
            <input type="number" id="totalFee" class="form-control totalFee" name="totalFee" disabled>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-1 ">
            <button type="button" class="btn btn-primary" data-toggle="modal"
                    onclick='addForm()'
                    data-target="#chitiet">
                Thêm mới
            </button>
        </div>
        <div class="col-1">
            <form action="" id="delete" method="post">
                @csrf
                @method("delete")
                <div class="row form-group" style="margin-left: 89%;" >
                    <button class="btn btn-danger" onclick="deleteee()" >Xóa toàn bộ thời khóa biểu</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-light">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Thứ 2</th>
                        <th scope="col">Thứ 3</th>
                        <th scope="col">Thứ 4</th>
                        <th scope="col">Thứ 5</th>
                        <th scope="col">Thứ 6</th>
                        <th scope="col">Thứ 7</th>
                        <th scope="col">Chủ nhật</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr start="7:15" end="10:00" id="tr1">
                        <th style="width: 70px;">7:15 10:00</th>
                        <td class="td1" day="Thứ 2"> </td>
                        <td class="td1" day="Thứ 3"></td>
                        <td class="td1" day="Thứ 4"></td>
                        <td class="td1" day="Thứ 5"></td>
                        <td class="td1" day="Thứ 6"></td>
                        <td class="td1" day="Thứ 7"></td>
                        <td class="td1" day="Chủ nhật"></td>
                    </tr>
                    <tr start="10:00" end="11:30" id="tr2">
                        <th style="width: 70px;">10:00 11:30</th>
                        <td class="td2" class="td2" day="Thứ 2"></td>
                        <td class="td2" day="Thứ 3"></td>
                        <td class="td2"  day="Thứ 4"></td>
                        <td class="td2" day="Thứ 5"></td>
                        <td class="td2" day="Thứ 6"></td>
                        <td class="td2" day="Thứ 7"></td>
                        <td class="td2"  day="Chủ nhật"></td>
                    </tr>
                    <tr start="12:30" end="3:40" id="tr3">
                        <th style="width: 70px;">12:30 3:40</th>
                        <td class="td3" day="Thứ 2"></td>
                        <td class="td3" day="Thứ 3"></td>
                        <td class="td3"  day="Thứ 4"></td>
                        <td class="td3" day="Thứ 5"></td>
                        <td class="td3" day="Thứ 6"></td>
                        <td class="td3" day="Thứ 7"></td>
                        <td class="td3"  day="Chủ nhật"></td>
                    </tr>
                    <tr start="3:40" end="5:10" id="tr4">
                        <th style="width: 70px;">3:40 5:10</th>
                        <td class="td4" day="Thứ 2"></td>
                        <td class="td4" day="Thứ 3"></td>
                        <td class="td4"  day="Thứ 4"></td>
                        <td class="td4" day="Thứ 5"></td>
                        <td class="td4" day="Thứ 6"></td>
                        <td class="td4" day="Thứ 7"></td>
                        <td class="td4"  day="Chủ nhật"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
    </div>
@endsection
@section("src")
    <script>
        let departmentSelect = document.getElementById("nameDepartment")
        let subjectSelect = document.getElementById("subject")
        let gradeSelect = document.getElementById("nameGrade")
        function renderSubject(e){
            renGrade(e)
            if(e!="") {
                get("/admins/admin/renderDepartmentSubjectByDeId/"+e)
                    .then(subjects=>{
                        let html = ` <option value="">Chọn môn</option>`
                        for (const subject of subjects) {
                            html += ` <option value="${subject.subjectId}">${subject.subjectName}</option>`
                        }
                        subjectSelect.innerHTML=html
                    })
            }
        }
        function renGrade(e){
            get("/admins/admin/searchByDepartment/"+e)
                .then(grades=>{
                    let html = `<option value="">Chọn lớp</option>`
                    for (const grade of grades) {
                        html += ` <option value="${grade.id}">${grade.name}</option>`
                    }
                    if(document.getElementById("back")!=null){
                        gradeSelect.innerHTML+=html
                        document.getElementById("back").removeAttribute("id")
                    }
                    else {
                        gradeSelect.innerHTML=html
                    }
                })
        }
        function addForm(){
            document.getElementById("gradeId").value = gradeSelect.value
            document.getElementById("departmentId").value = departmentSelect.value
            get("/admins/admin/renderDepartmentSubjectByDeId/"+ document.getElementById("departmentId").value )
                .then(subjects =>{
                    let html = ` <option value="">Chọn môn</option>`
                    for (const subject of subjects) {
                        html += ` <option value="${subject.id}">${subject.name}</option>`
                    }
                    document.getElementById("subject").innerHTML=html
                })

            get("/admins/admin/searchTeacherByDepartment/"+ document.getElementById("departmentId").value )
                .then(teachers =>{
                    let html = ` <option value="">Chọn giảng viên</option>`
                    for (const teacher of teachers) {
                        html += ` <option value="${teacher.id}">${teacher.name}</option>`
                    }
                    document.getElementById("teacher").innerHTML=html
                })
            get("/admins/admin/showLesson")
                .then(lessons =>{
                    let html = ` <option value="">Chọn tiết</option>`
                    for (const lesson of lessons) {
                        html += ` <option value="${lesson.id}">${lesson.startTime} - ${lesson.endTime}</option>`
                    }
                    document.getElementById("lesson").innerHTML=html
                })
        }
        function renderTimeTable(e){
            resetTd()
            get("/admins/admin/showTimeTable/"+e)
                .then(timeTables =>{
                        let total = 0
                    for (const timeTable of timeTables) {
                        for (let x=1; x<=4;x++){
                            let trElement = document.getElementById('tr'+x);
                            let startValue = trElement.getAttribute('start');
                            let endValue = trElement.getAttribute('end');
                            if (startValue === timeTable.startTime && endValue === timeTable.endTime) {
                                let tdElements = document.querySelectorAll(".td"+x);
                                for (const tdElement of tdElements) {
                                    let dayValue = tdElement.getAttribute('day');
                                    timeTable.teacherName == null ? timeTable.teacherName= "Vui lòng thêm giảng viên" : timeTable.teacherName=timeTable.teacherName
                                    if (dayValue === timeTable.day) {
                                        timeTable.dateStartStudy= formatDate(timeTable.dateStartStudy)
                                        timeTable.dateEndStudy = formatDate(timeTable.dateEndStudy)
                                        let html = `  <div>
                                                            <form action="/admins/admin/detailTimeTable/${timeTable.id}" id="timeTable_${timeTable.id}" method="get">
                                                                <a href="#" onclick="detail(${timeTable.id})">
                                                                    <p>${timeTable.lessonName}</p>
                                                                    <p>${timeTable.teacherName}</p>
                                                                    <p>${timeTable.dateStartStudy} - ${timeTable.dateEndStudy}</p>
                                                                </a>
                                                            </form>
                                                        </div>`
                                        tdElement.innerHTML += html;
                                    }
                                }
                            }
                        }
                        total+=timeTable.total_fee;
                    }
                    document.getElementById("totalFee").value= total
                })
        }
        function resetTd(){
            for (let i=1; i<=4;i++){
                tds= document.querySelectorAll(".td"+i)
                for (const td of tds) {
                    td.innerHTML=""
                }
            }
        }
        function detail(id) {
            document.getElementById('timeTable_'+id).submit();
        }
        function deleteee() {
            event.preventDefault()
            if (gradeSelect!=""){
                document.getElementById("delete").action = "/admins/admin/destroyAllTimetableByGrade/"+gradeSelect.value;
            }
            const isconfirm = confirm("Xác nhận xóa!");
            if (isconfirm) {
                document.getElementById("delete").submit();
            }
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
