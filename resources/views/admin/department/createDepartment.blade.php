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
    <form action="/admins/admin/createDepartment" method="post" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <div class="row form-group">
            <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Tên khoa: </label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" placeholder="Nhập tên khoa" class="form-control" name="nameDepartment">
                @error('nameDepartment')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Mã khoa: </label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" placeholder="Nhập mã khoa" class="form-control" name="codeDepartment">
                @error('codeDepartment')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row form-group" style="margin-left: 93%;">
            <button type="submit" class="btn btn-primary">Tạo khoa</button>
        </div>
    </form>
@endsection
</body>
</html>
