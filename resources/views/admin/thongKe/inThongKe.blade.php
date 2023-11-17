<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Generate PDF From View</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<style>
    .tong{ text-align: right;}
</style>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Thong ke thang {{ $tKTong->updated_at}}</strong>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th scope="col">Ten san Pham</th>
                        <th scope="col">So luong nhap</th>
                        <th scope="col">So luong ban</th>
                        <th scope="col">Gia nhap</th>
                        <th scope="col">Gia ban</th>
                        <th scope="col">Tong tien nhap</th>
                        <th scope="col">Tong tien ban</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $a=1 @endphp
                    @foreach($chitiet as $x)
                        <tr>
                            <td>{{$a++}}</td>
                            <td scope="row">{{$x->tenSanPham}}</td>
                            <td>{{$x->soLuongNhap}}</td>
                            <td>{{$x->soLuongBan}}</td>
                            <td>{{$x->giaNhap}}</td>
                            <td>{{$x->giaBan}}</td>
                            <td>{{$x->tongTienNhapHang}}</td>
                            <td>{{$x->tongTienBan}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th scope="row">Tong chi</th>
                        <td class="tong" colspan="7">{{$tKTong->tienChi}}VND</td>
                    </tr>
                    <tr>
                        <th scope="row">Tong thu</th>
                        <td class="tong" colspan="7">{{$tKTong->tienThu}}VND</td>
                    </tr>
                    <tr>
                        <th scope="row">Doanh thu</th>
                        <td class="tong" colspan="7">{{$tKTong->doanhThu}}VND</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

