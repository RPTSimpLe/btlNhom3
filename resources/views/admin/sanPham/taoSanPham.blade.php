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
<form action="/admins/admin/taoSanPham" method="post" enctype="multipart/form-data" class="form-horizontal">
    @csrf

    <div class="row form-group">
        <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Tên: </label></div>
        <div class="col-12 col-md-9">
            <input type="text" id="text-input" class="form-control" name="tenSP">
              @error('tenSP')
                <small class="form-text">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class="row form-group">
        <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Hãng: </label></div>
        <div class="col-12 col-md-9">
            <input type="text" id="text-input" class="form-control" name="nhaSX">
              @error('nhaSX')
                <small class="form-text">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class="row form-group">
        <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Số lượng nhập: </label></div>
        <div class="col-12 col-md-9">
            <input type="number" id="text-input" class="form-control" name="tonKho">
              @error('tonKho')
                <small class="form-text">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class="row form-group">
        <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Giá nhập: </label></div>
        <div class="col-12 col-md-9">
            <input type="number" id="text-input" class="form-control" name="giaNhap">
              @error('giaNhap')
                <small class="form-text">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class="row form-group">
        <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Giá bán: </label></div>
        <div class="col-12 col-md-9">
            <input type="number" id="text-input" class="form-control" name="giaBan">
              @error('giaBan')
                <small class="form-text">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class="row form-group">
        <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Năm sản xuất: </label></div>
        <div class="col-12 col-md-9">
            <input type="text" id="text-input" class="form-control" name="namSX">
              @error('namSX')
                <small class="form-text">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class="row form-group">
        <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Bảo hành: </label></div>
        <div class="col-12 col-md-9">
            <input type="text" id="text-input" class="form-control" name="baoHanh">
              @error('baoHanh')
                <small class="form-text">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="select" class=" form-control-label">Danh mục:</label></div>
        <div class="col-12 col-md-9">
            <select name="danhMuc"  class="form-control">
                <option value="">Chọn danh mục</option>
                @foreach($danhMucs as $danhMuc)
                <option value="{{$danhMuc->id}}">{{$danhMuc->ten}}</option>
                @endforeach
            </select>
              @error('danhMuc')
                <small class="form-text">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô tả:</label></div>
        <div class="col-12 col-md-9"><textarea name="moTa" id="textarea-input" rows="9"  class="form-control"></textarea>
            @error('moTa')
            <small class="form-text">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh sản phẩm: </label>
        </div>
        <div class="col-12 col-md-9"><input type="file" id="file-input" name="img"
                                            class="form-control-file">
              @error('img')
                <small class="form-text">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class="row form-group" style="margin-left: 93%;">
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </div>
</form>
@endsection
@section("src")
@endsection
</body>
</html>
