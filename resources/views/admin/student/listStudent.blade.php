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
                        <div class="col-3">
                            <img style="height: 226.771px; width: 161.181px; object-fit: cover" src="" id="image"
                                 alt="Vui lòng thêm ảnh đại diện">
                        </div>
                        <div class="col-9">
                            <form action="" method="post" id="formEditProfile" enctype="multipart/form-data"
                                  class="form-horizontal" >
                                @csrf
                                @method('PATCH')
                                <div class="row form-group d-none">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">userId: </label></div>
                                    <div class="col-12 col-md-9 " ><input type="text" id="text-input" name="id"
                                                                                   class="form-control id">
                                    </div>
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
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mã: </label></div>
                                    <div class="col-12 col-md-9"><input type="number" id="text-input" name="code"
                                                                        class="form-control code" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Giới tính: </label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="gender" id="select" class="form-control" required>
                                            <option id="1" value="nam">nam</option>
                                            <option id="2" value="nữ">nữ</option>
                                        </select>
                                        @error('gender')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">Ngày sinh: </label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="text-input" name="dateOfBirth"
                                                                        class="form-control dateOfBirth">
                                        @error('dateOfBirth')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số điện thoại: </label></div>
                                    <div class="col-12 col-md-9 " ><input type="number" id="text-input" name="phone"
                                                                                   class="form-control phone">
                                        @error('phone')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Khoa:</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="departmentId" id="department" onchange="renderSelectGrade(this)" class="form-control" required>

                                        </select>
                                        @error('departmentId')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Lớp:</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="gradeId" id="selectGrade" class="form-control" required>\
                                        </select>
                                        @error('gradeId')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">Địa chỉ: </label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="address"
                                                                        class="form-control address">
                                        @error('address')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email: </label></div>
                                    <div class="col-12 col-md-9"><input type="email" id="text-input" name="email"
                                                                        class="form-control email">
                                        @error('email')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh đại diện: </label>
                                    </div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="img"
                                                                        class="form-control-file">
                                        @error('img')
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
                    <strong class="col-2 card-title">Danh sách sinh viên</strong>
                    @if (session('status') !== null)
                        <p class="col-10 text-sm text-success col-8">{{ session('status') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <form id="searchForm" action="/admins/admin/searchStudent" method="get">
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
                                <option id="" value="gender">Giới tính</option>
                                <option id="" value="phone">Số điện thoại</option>
                                <option id="" value="grade">Lớp</option>
                                <option id="" value="department">Khoa</option>
                                <option id="" value="fee">Học phí</option>
                                <option id="" value="DateOfBirth">Ngày sinh</option>
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
                        <th>Tên</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Lớp</th>
                        <th>Khoa</th>
                        <th>Học phí</th>
                        <th>Ngày sinh</th>
                        <th>Ngày tạo/sửa</th>
                        <th>Thêm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $searchStudents = session('searchStudents') @endphp
                    @if($searchStudents!=null)
                        @php
                            $students =$searchStudents;
                        @endphp
                    @endif
                    @foreach ($students as $student)
                        @if($searchStudents!=null)
                            @php
                                $student->created_at=\Carbon\Carbon::parse($student->created_at)->format("d/m/Y");
                                $student->updated_at=\Carbon\Carbon::parse($student->updated_at)->format("d/m/Y");
                                $user=[
                                    "id" => $student->user_id,
                                    "code" => $student->code,
                                    "email" => $student->email,
                                    "role" => $student->role,
                                    ];
                                $grade= [
                                    "id" => isset($student->grade_id)? $student->grade_id : "",
                                    "name" => isset($student->gradeName)? $student->gradeName : "",
                                    ];
                                $department=[
                                    "id" => isset($student->departmentId)? $student->departmentId : "",
                                    "name" => isset($student->departmentName)? $student->departmentName : "",
                                    "code" => isset($student->departmentCode)? $student->departmentCode : "",
                                    ];
                                $department= (object) $department;
                                $user = (object) $user;
                                $grade = (object) $grade;
                            @endphp
                        @else
                            @php $user=\App\Models\Student::find($student->id)->users;
                            if ($student->grade_id==null){
                                $grade= [
                                    "id" => "",
                                    "name" => "",
                                    ];
                                $department=[
                                    "id" => "",
                                    "name" => "",
                                    "code" => "",
                                    ];
                                $department= (object) $department;
                                $grade = (object) $grade;
                            }else{
                                $grade=\App\Models\Student::find($student->id)->grades;
                                $department=\App\Models\Grade::find($grade ->id)->departments;
                            }
                            @endphp
                        @endif
                        @php
                            $convert=\Carbon\Carbon::parse($student->DateOfBirth)->format("d/m/Y");
                        @endphp
                        <tr>
                            <td style="max-width: 45px;">{{ $student->id }}</td>
                            <td style="max-width: 120px; overflow-x: <?php echo strlen($user->code) > 10 ? 'scroll' : 'hidden'; ?>">{{ $user->code }}</td>
                            <td style="max-width: 151px; overflow-x: <?php echo strlen($student->name) > 18 ? 'scroll' : 'hidden'; ?>">{{ $student->name }}</td>
                            <td>{{ $student->gender }}</td>
                            <td style="max-width: 98px; overflow-x: <?php echo strlen($student->phone) > 10 ? 'scroll' : 'hidden'; ?>">{{ $student->phone }}</td>
                            <td style="max-width: 100px;">{{ isset($grade->name) ? $grade->name : "" }}</td>
                            <td style="max-width: 100px;">{{ $department->code }}</td>
                            <td style="max-width: 114px;">{{ $student->fee }}</td>
                            <td>{{$convert}}</td>
                            <td style="max-width: 114px;">{{ $student->updated_at}}</td>
                            <td style="max-width: 175px;"> <button type="button" class="btn btn-primary" data-toggle="modal" onclick="detail({{ json_encode($student) }},{{ json_encode($user) }},{{ json_encode($department)}},{{ json_encode($grade) }})" data-target="#chitiet">
                                    Chi tiết
                                </button>
                                <form id="delete_{{ $student->id }}" class="deleteForm" action="/admins/admin/deleteUser/{{ $user->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <a class="nav-link btn btn-danger" href="#" onclick="deletee({{ $student->id }})"> Xóa</a>
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
        function detail(student,user,department,grade){
            let name= document.querySelector(".name")
            let image= document.getElementById("image")
            let gender1= document.getElementById("1")
            let gender2= document.getElementById("2")
            let code= document.querySelector(".code")
            let email= document.querySelector(".email")
            let address= document.querySelector(".address")
            let id= document.querySelector(".id")
            let phone= document.querySelector(".phone")
            let gender= document.querySelector(".gender")
            let dateOfBirth= document.querySelector(".dateOfBirth")
            document.getElementById("formEditProfile").action = "/admins/admin/updateUser/"+user.id;
            id.value = user.id
            name.value = student.name;
            code.value = user.code;
            email.value = user.email;
            address.value = student.address;
            phone.value = student.phone;
            dateOfBirth.value = student.DateOfBirth;
            if(student.gender!="nam"){
                gender1.value = "nữ"; gender1.innerHTML= "nữ";
                gender2.value = 'nam'; gender2.innerHTML="nam";
            }else {
                gender1.value = "nam"; gender1.innerHTML= "nam";
                gender2.value = 'nữ'; gender2.innerHTML="nữ";
            }
            dateOfBirth.value=student.DateOfBirth;
            renderDepartment(department,grade);
            getLinkImg(user.id);
        }
        function renderDepartment(department,grade){
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
            renderGrade(grade,department.id)
        }
        function renderGrade(grade, departmentId){
            let gradeElement = document.getElementById("selectGrade")
            let html = `<option value="${grade.id}">${grade.name}</option>`
            get('/admins/admin/searchByDepartment/'+departmentId)
                .then(grades=> {
                    for (const grade1 of grades) {
                        if (grade1.id!=grade.id) {
                            html += `<option value="${grade1.id}">${grade1.name}</option>`
                        }
                    }
                    gradeElement.innerHTML= html
                })
        }

    </script>
@endsection
</body>
</html>
