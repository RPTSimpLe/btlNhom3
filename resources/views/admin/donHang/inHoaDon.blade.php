<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Generate PDF From View</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-header">
            Hoa don
            <strong>{{ \Carbon\Carbon::parse($hoadon->updated_at)->format('H:i:s d/m/Y') }}
            </strong>

        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <div>
                        <strong>LAPTOP N3 DH11C10</strong>
                    </div>
                    <div>So 41A duong Phu Dien, Q. Bac Tu Liem, TP. Ha Noi</div>
                    <div>Email: N3@gmail.com</div>
                    <div>Dien Thoai: 066 666 8888</div>
                </div>

                <div class="col-sm-6">
                    <div>
                        <strong>Khach hang: {{$khachHang->hoTen}}</strong>
                    </div>
                    <div>Dia chi: {{$hoadon->diaChi}}</div>
                    <div>Email: {{$khachHang->email}}</div>
                    <div>Dien Thoai: {{$khachHang->sDT}}</div>
                </div>



            </div>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="center">STT</th>
                        <th>San pham</th>

                        <th class="right">Don gia</th>
                        <th class="center">SL</th>
                        <th class="right">Tien hang</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $x=1 @endphp
                        @foreach($chiTiet as $a)
                            <tr>
                                <td class="center">{{$x++}}</td>
                                <td class="left">{{$a->tenSanPham}}</td>
                                <td class="left">{{intval($a->tienHang)/intval($a->soLuong)}}</td>

                                <td class="right">{{$a->soLuong}}</td>
                                <td class="center tienHang">{{$a->tienHang}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">

                </div>

                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left">
                                <strong>Tong tien hang</strong>
                            </td>
                            <td class="right" id="tongTienHang">{{intval($hoadon->tongTien)-intval($hoadon->ship)}}VND</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Giam gia</strong>
                            </td>
                            <td class="right">{{$hoadon->giamGia}}%</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Phi ship</strong>
                            </td>
                            <td class="right">20000VND</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Tong tien</strong>
                            </td>
                            <td class="right">
                                <strong>{{$hoadon->tongTien}}VND</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
{{--</div>--}}
</body>
</html>
