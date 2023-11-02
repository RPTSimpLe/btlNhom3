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
            <input type="text" id="text-input" class="form-control" name="ten">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Hãng: </label></div>
        <div class="col-12 col-md-9">
            <input type="text" id="text-input" class="form-control" name="nhaSX">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Số lượng nhập: </label></div>
        <div class="col-12 col-md-9">
            <input type="number" id="text-input" class="form-control" name="tonKho">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Giá nhập: </label></div>
        <div class="col-12 col-md-9">
            <input type="number" id="text-input" class="form-control" name="giaNhap">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Giá bán: </label></div>
        <div class="col-12 col-md-9">
            <input type="number" id="text-input" class="form-control" name="giaBan">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Năm sản xuất: </label></div>
        <div class="col-12 col-md-9">
            <input type="text" id="text-input" class="form-control" name="namSX">
        </div>
    </div><div class="row form-group">
        <div class="col-3 col-md-3"><label for="text-input" class=" form-control-label">Bảo hành: </label></div>
        <div class="col-12 col-md-9">
            <input type="text" id="text-input" class="form-control" name="baoHanh">
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
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô tả:</label></div>
        <div class="col-12 col-md-9"><textarea name="moTa" id="textarea-input" rows="9"  class="form-control"></textarea></div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh sản phẩm: </label>
        </div>
        <div class="col-12 col-md-9"><input type="file" id="file-input" name="img"
                                            class="form-control-file">
        </div>
    </div>
    <div class="row form-group" style="margin-left: 93%;">
        <button type="submit" class="btn btn-primary">Tạo lớp</button>
    </div>
</form>
@endsection
@section("src")
<script>
    function renderTeacher(e) {
        let selectTeacher=document.getElementById("selectTeacher")
        if(e.value != ""){
            get("/admins/admin/searchTeacherByDepartment/"+e.value).
            then(teachers=>
            {
                let html = `<option value="">Chọn giảng viên</option>`
                for (const teacher of teachers) {
                    html+=`<option value="${teacher.code} - ${teacher.name}">${teacher.code} - ${teacher.name}</option>`
                    selectTeacher.innerHTML= html;
                }
            })
        }
    }
</script>
@endsection
</body>
</html>
