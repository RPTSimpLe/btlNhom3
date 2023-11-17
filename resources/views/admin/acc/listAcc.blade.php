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
@php
    $adminId=\Illuminate\Support\Facades\Auth::user()->id;
 @endphp
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
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id: </label></div>
                                    <div class="col-12 col-md-9 "><input type="text" id="text-input" name="id"
                                                                                   class="form-control id">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên đăng nhập: </label></div>
                                    <div class="col-12 col-md-9 "><input type="text" id="text-input" name="newName"
                                                                                   class="form-control name">
                                        @error('newName')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Họ Tên: </label></div>
                                    <div class="col-12 col-md-9 "><input type="text" id="text-input" name="hoTen"
                                                                                   class="form-control hoTen">
                                        @error('hoTen')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Vai trò: </label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="vaiTro" class="form-control vaiTro">
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
                                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email: </label></div>
                                    <div class="col-12 col-md-9"><input type="email" id="text-input" name="email"
                                                                        class="form-control email">
                                        @error('email')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Điện thoại: </label></div>
                                    <div class="col-12 col-md-9 "><input type="number" id="text-input" name="sDT"
                                                                                   class="form-control sDT">
                                        @error('sDT')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ngày sinh: </label></div>
                                    <div class="col-12 col-md-9 "><input type="date" id="text-input" name="ngaySinh"
                                                                                   class="form-control ngaySinh">
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
                                <div class="row form-group" style="margin-left: 89%;">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </form>
                            <form method="post" id="formResetPass" action="">
                                @csrf
                                @method('patch')
                                <div class="row form-group d-none" >
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id: </label></div>
                                    <div class="col-12 col-md-9 "><input type="text" id="text-input" name="id"
                                                                                   class="form-control id">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="password-input" class=" form-control-label">Mật khẩu
                                            mới: </label></div>
                                    <div class="col-12 col-md-9"><input type="password" id="password-input password" name="resetPass"
                                                                        placeholder="Nhập mật khẩu mới" class="form-control">
                                        @error('resetPass')
                                        <small class="form-text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group"  style="margin-left: 83%;">
                                    <button type="submit" class="btn btn-primary">Đặt lại mật khẩu</button>
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
                    <strong class="col-2 card-title">Danh sách tài khoản</strong>
                    @if (session('status') !== null)
                        <p class="col-10 text-sm text-success col-8">{{ session('status') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <form id="searchForm" action="/admins/admin/searchUser" method="get">
                    <div class="row form-group">
                        <div class="search-label"><label for="text-input" class=" form-control-label">Tìm kiếm: </label></div>
                        <div class="col-4 " ><input type="text" id="search" name="" class="form-control">
                        </div>
                        <div class="col-4">
                            <select id="selectSearch" onchange="selectName(this);" class="form-control" required>
                                <option id="" value="">Tìm kiếm theo:</option>
                                <option id="" value="id">Id</option>
                                <option id="" value="name">Tên đăng nhập</option>
                                <option id="" value="hoTen">Họ tên</option>
                                <option id="" value="vaiTro">Vai trò</option>
                            </select>
                        </div>
                        <div class="col-2"><button type="submit" class="btn btn-primary">Tìm kiếm</button> </div>
                    </div>
                </form>
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered listTable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th >Tên đăng nhập</th>
                        <th >Họ tên</th>
                        <th>Vai trò</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Thêm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $searchUsers = session('searchUsers') @endphp
                    @if($searchUsers!=null)
                        @php
                            $users =$searchUsers;
                        @endphp
                    @endif
                    @foreach ($users as $user)
                        @if($searchUsers!=null)
                            @php
                                $user->created_at=\Carbon\Carbon::parse($user->created_at)->format("d/m/Y");
                                $user->updated_at=\Carbon\Carbon::parse($user->updated_at)->format("d/m/Y");
                            @endphp
                        @endif
                        <tr>
                            <td style="max-width: 45px; overflow-x: ">{{ $user->id }}</td>
                            <td style="max-width: 151px; overflow-x: <?php echo strlen($user->name) > 16 ? 'scroll' : 'hidden'; ?>">{{ $user->name }}</td>
                            <td >{{ $user->hoTen }}</td>
                            <td >{{ $user->vaiTro }}</td>
                            <td style="max-width: 114px; overflow-x: ">{{ $user->created_at }}</td>
                            <td style="max-width: 114px; overflow-x: ">{{ $user->updated_at}}</td>
                            <td style="max-width: 195px; overflow-x: "> <button type="button" class="btn btn-primary" data-toggle="modal" onclick="detail({{ json_encode($user) }})" data-target="#chitiet">
                                    Chi tiết
                                </button>
                                @if($adminId!=$user->id)
                                    <form id="delete_{{ $user->id }}" class="deleteForm" action="/admins/admin/deleteUser/{{ $user->id }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <a class="nav-link btn btn-danger" href="#" onclick="deletee({{ $user->id }})"> Xóa</a>
                                    </form>
                                @endif
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
        function detail($user){
            let name= document.querySelector(".name")
            let vaiTro= document.querySelector(".vaiTro")
            let image= document.getElementById("image")
            let ngaySinh= document.querySelector(".ngaySinh")
            let hoTen= document.querySelector(".hoTen")
            let sDT= document.querySelector(".sDT")
            let email= document.querySelector(".email")
            let ids= document.querySelectorAll(".id")
            document.getElementById("formResetPass").action = "/admins/admin/resetpass/"+$user.id;
            document.getElementById("formEditProfile").action = "/admins/admin/updateUser/"+$user.id;
            for (const id of ids) {
                id.value = $user.id
            }
            hoTen.value= $user.hoTen
            sDT.value= $user.sDT
            vaiTro.value= $user.vaiTro
            ngaySinh.value= $user.ngaySinh
            name.value = $user.name;
            email.value = $user.email;
            image.src=""
           getLinkImg($user.id)
        }
    </script>
@endsection
</body>
</html>
