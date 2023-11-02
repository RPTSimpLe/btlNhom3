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
    <form action="/admins/admin/createStudent" method="post" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <div class="row form-group">
            <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Họ tên: </label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" placeholder="Nhập họ tên" class="form-control" name="name">
                @error('name')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Địa chỉ: </label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" placeholder="Nhập địa chỉ" class="form-control" name="address">
                @error('address')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Tuổi: </label></div>
            <div class="col-12 col-md-9">
                <input type="number" id="text-input" placeholder="Nhập tuổi" class="form-control" name="age">
                @error('age')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Ngày sinh: </label></div>
            <div class="col-12 col-md-9">
                <input type="date" id="text-input" placeholder="Nhập ngày sinh" class="form-control" name="dateOfBirth">
                @error('dateOfBirth')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Số điên thoại: </label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" placeholder="Nhập số điện thoại" class="form-control" name="phone">
                @error('phone')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email: </label></div>
            <div class="col-12 col-md-9">
                <input type="email" id="email-input" name="newEmail" placeholder="Nhập email" class="form-control">
                @error('newEmail')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Giới tính: </label></div>
            <div class="col-12 col-md-9">
                <select name="gender" id="select" class="form-control" required>
                    <option value="">Chọn giới tính</option>
                    <option id="1" value="nam">nam</option>
                    <option id="2" value="nữ">nữ</option>
                </select>
                @error('gender')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Khoa:</label></div>
            <div class="col-12 col-md-9">
                <select name="departmentId" onchange="renderSelectGrade(this)" class="form-control" required>
                    <option value="">Chọn khoa</option>
                    @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
                @error('departmentId')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Lớp:</label></div>
            <div class="col-12 col-md-9">
                <select name="gradeId" id="selectGrade" class="form-control" required>
                    <option value="">Chọn lớp</option>
                </select>
                @error('gradeId')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Mật khẩu: </label></div>
            <div class="col-12 col-md-9"><input type="password" id="password-input" name="password" placeholder="Nhập mật khẩu" class="form-control">
                @error('password')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Nhập lại mật khẩu: </label></div>
            <div class="col-12 col-md-9"><input type="password" id="password-input" name="password_confirmation" placeholder="Nhập lại mật khẩu" class="form-control">
            </div>
        </div>
        <div class="row form-group d-none">
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" name="role" value="student" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
            <div class="col-12 col-md-9"><input type="file" id="file-input" name="img" class="form-control-file">
                @error('img')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group" style="margin-left: 89%;">
            <button type="submit" class="btn btn-primary">Thêm sinh viên</button>
        </div>
    </form>
@endsection
@section("src")
    <script>

    </script>
@endsection
</body>
</html>
