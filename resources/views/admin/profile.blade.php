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
    <div class="row">

        <div class="col col-2">
            <img style="height: 226.771px; width: 161.181px; object-fit: cover" src="{{ url('/images/' . $url) }}"
                 alt="Vui lòng thêm ảnh đại diện">
        </div>
        <div class="col-10">
            @if (session('status') !== null)
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    class="text-sm text-success"
                >{{ session('status') }}</p>
            @endif
            <h5>Thông tin cá nhân:</h5>
            <form action="/admins/admin/updateUser/{{ $user->id  }}" method="post" enctype="multipart/form-data"
                  class="form-horizontal">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên đăng nhập: </label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="newName"
                                                        value="{{ $user->name }}" class="form-control">
                        @error('newName')
                        <small class="form-text">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Họ tên: </label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="hoTen"
                                                        value="{{ $user->hoTen }}" class="form-control">
                        @error('hoTen')
                        <small class="form-text">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <input type="text" id="text-input" name="vaiTro"
                       value="{{ $user->vaiTro }}" class="form-control" hidden="">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email: </label></div>
                    <div class="col-12 col-md-9"><input type="email" id="email-input" name="email"
                                                        value="{{ $user->email }}" class="form-control">
                        @error('email')
                        <small class="form-text">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Điện thoại: </label></div>
                    <div class="col-12 col-md-9"><input type="number" id="text-input" name="sDT"
                                                        value="{{ $user->sDT }}" class="form-control">
                        @error('sDT')
                        <small class="form-text">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ngày sinh: </label></div>
                    <div class="col-12 col-md-9"><input type="date" id="text-input" name="ngaySinh"
                                                        value="{{ $user->ngaySinh }}" class="form-control">
                        @error('ngaySinh')
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
                <div class="row form-group" style="margin-left: 90%;">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
            <h5>Đổi mật khẩu</h5>
            <form method="post" action="/profile/password">
                @csrf
                @method('put')
                <div class="row form-group">
                    <div class="col col-md-3"><label for="password-input" class=" form-control-label">Mật khẩu hiện
                            tại: </label></div>
                    <div class="col-12 col-md-9"><input type="password" id="password-input current_password"
                                                        name="current_password" placeholder="Nhập mật khẩu cũ"
                                                        class="form-control">
                        @error('current_password')
                        <small class="form-text">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="password-input" class=" form-control-label">Mật khẩu
                            mới: </label></div>
                    <div class="col-12 col-md-9"><input type="password" id="password-input password" name="password"
                                                        placeholder="Nhập mật khẩu mới" class="form-control">
                        @error('password')
                        <small class="form-text">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="password-input" class=" form-control-label">Xác nhận mật khẩu
                            mới: </label></div>
                    <div class="col-12 col-md-9"><input type="password" id="password-input password_confirmation"
                                                        name="password_confirmation" placeholder="Nhập lại mật khẩu cũ"
                                                        class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-left: 90%;">Thay đổi</button>
            </form>
        </div>
@endsection
</body>
</html>
