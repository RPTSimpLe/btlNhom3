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
    <form action="/admins/admin/create" method="post" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <div class="row form-group">
            <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Tên đăng nhập: </label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" placeholder="Nhập tên đăng nhập" class="form-control" name="name">
                @error('name')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Họ tên: </label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" placeholder="Nhập họ tên" class="form-control" name="hoTen">
                @error('hoTen')
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
            <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Điện thoại: </label></div>
            <div class="col-12 col-md-9">
                <input type="number" id="text-input" placeholder="Nhập điện thoại" class="form-control" name="sDT">
                @error('sDT')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Ngày sinh: </label></div>
            <div class="col-12 col-md-9">
                <input type="date" id="text-input" placeholder="Nhập ngày sinh" class="form-control" name="ngaySinh">
                @error('ngaySinh')
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
        <div class="row form-group">
            <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Vai trò: </label></div>
            <div class="col-12 col-md-9">
                <select name="vaiTro" class="form-control">
                    <option value="">Chọn vai trò</option>
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                </select>
                @error('vaiTro')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh</label></div>
            <div class="col-12 col-md-9"><input type="file" id="file-input" name="img" class="form-control-file">
                @error('img')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group" style="float: right">
            <button type="submit" class="btn btn-primary">Tạo tài khoản</button>
        </div>
    </form>
@endsection
</body>
</html>
