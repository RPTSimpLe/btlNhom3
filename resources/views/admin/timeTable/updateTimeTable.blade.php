<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
</style>
<body>
    @extends("admin.layout.layout")
    @section("page")
        <form action="/admins/admin/updateTimeTable/{{$timetable->id}}" method="post" class="form-horizontal">
            @csrf
            @method('patch')
            <div class="row form-group">
                <div class="col-3 col-md-3"><label for="select" class=" form-control-label">Môn học: </label></div>
                <div class="col-12 col-md-9">
                    <select name="idSubject" id="subject" class="form-control" required>
                        <option value="{{$timetable->subject_id}}">{{$timetable->lessonName}}</option>
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
                        <option value="{{$timetable->teacher_id}}">{{$timetable->teacherName}}</option>
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
                        <option value="{{$timetable->day}}">{{$timetable->day}}</option>
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
                    <input type="date" id="text-input" value="{{$timetable->dateStartStudy}}"  class="form-control" name="dateStartStudy">
                    @error('dateStartStudy')
                    <small class="form-text">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Đến ngày: </label></div>
                <div class="col-12 col-md-9">
                    <input type="date" id="text-input" value="{{$timetable->dateEndStudy}}" class="form-control" name="dateEndStudy">
                    @error('dateEndStudy')
                    <small class="form-text">{{ $message }}</small>
                    @enderror                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Giờ học: </label></div>
                <div class="col-12 col-md-9">
                    <select name="lessonId" id="lesson" class="form-control" required>
                        <option value="{{$timetable->lessonId}}">{{$timetable->startTime}} - {{$timetable->endTime}}</option>
                    </select>
                    @error('lessonId')
                    <small class="form-text">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Học phí một tín: </label></div>
                <div class="col-12 col-md-9">
                        <input type="number" id="text-input" name="fee_1_credit" value="{{$timetable->fee_1_credit}}" class="fee form-control">
                </div>
            </div>
            <div class="row form-group" style="margin-left: 89%;">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
        <form action="/admins/admin/destroyTimetable/{{$timetable->id}}" id="delete" method="post">
            @csrf
            @method("delete")
            <div class="row form-group" style="margin-left: 89%;" >
                <button class="btn btn-danger" onclick="deleteee(event)" style=" width: 87px;">Xóa</button>
            </div>
        </form>
    @endsection
    @section("src")
        <script>
            function deleteee() {
                event.preventDefault()
                const isconfirm = confirm("Xác nhận xóa!");
                if (isconfirm) {
                    document.getElementById("delete").submit();
                }
            }
            let subjectSelect = document.getElementById("subject")
                    get("/admins/admin/renderDepartmentSubjectByDeId/"+{{$departmentId}})
                        .then(subjects=>{
                            let html = ` <option value="">Chọn môn</option>`
                            for (const subject of subjects) {
                                html += ` <option value="${subject.subjectId}">${subject.subjectName}</option>`
                            }
                            subjectSelect.innerHTML+=html
                        })

                get("/admins/admin/searchTeacherByDepartment/"+{{$departmentId}})
                    .then(teachers =>{
                        let html = ` <option value="">Chọn giảng viên</option>`
                        for (const teacher of teachers) {
                            html += ` <option value="${teacher.id}">${teacher.name}</option>`
                        }
                        document.getElementById("teacher").innerHTML+=html
                    })

            get("/admins/admin/showLesson")
                .then(lessons =>{
                    let html = ` <option value="">Chọn tiết</option>`
                    for (const lesson of lessons) {
                        html += ` <option value="${lesson.id}">${lesson.startTime} - ${lesson.endTime}</option>`
                    }
                    document.getElementById("lesson").innerHTML+=html
                })
        </script>
    @endsection
</body>
</html>
