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
    <div>
        <h3>7 ngày gần đây</h3>
        <canvas id="myChart"></canvas>
    </div>
    @foreach($ngays as $ngay)
        <div class="date" hidden="">{{ date('d/m/Y', strtotime($ngay)) }}</div>
    @endforeach
    @foreach($thongKeNgay as $thongKe)
        <div class="soLuong" hidden="">{{$thongKe["soLuong"]}}</div>
        <div class="doanhThu" hidden>{{$thongKe["doanhThu"]}}</div>
        <div class="tienBan" hidden>{{$thongKe["tienBan"]}}</div>
    @endforeach
@endsection
@section("src")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var dates = document.querySelectorAll(".date")
        var doanhThus = document.querySelectorAll(".doanhThu")
        var tienBans = document.querySelectorAll(".tienBan")
        var soLuongs = document.querySelectorAll(".soLuong")

        let ngays = [];
        let doanhThu = [];
        let tienBan = [];
        let soLuong = [];
        for (const date of dates) {
            ngays.push(date.innerHTML);
        }
        for (const x of doanhThus) {
            doanhThu.push(x.innerHTML);
        }
        for (const y of tienBans) {
            tienBan.push(y.innerHTML);
        }
        for (const z of soLuongs) {
            soLuong.push(z.innerHTML);
        }

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ngays,
                datasets: [
                    {
                        label: ["Số lượng"],
                        data: soLuong,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Tiền bán',
                        data: tienBan,
                        backgroundColor: 'rgba(0, 123, 255, 0.5)',
                        borderColor: 'rgba(0, 123, 255, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Doanh thu',
                        data: doanhThu,
                        backgroundColor: 'rgba(0, 255, 0, 0.5)',
                        borderColor: 'rgba(0, 255, 0, 1)',
                        borderWidth: 1
                    },
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                }
            }
        });

    </script>
@endsection
</body>
</html>

