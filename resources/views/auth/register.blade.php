<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="dangky_css.php">
    <style>
        .container {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 600px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
            border-radius: 5px;
            backdrop-filter: blur(20px);
        }
        small{
            color: red;
        }
        button{
            margin-top: 20px;
            width:570px;
        }
        form{
            width: 600px;
        }
        .form-group{
            margin-top: 20px;

        }
        label{
            margin-bottom: 10px;
            font-weight: 600;
        }
        h1{
            text-align: center;
            opacity: 0.7;
            padding-top: 20px;
        }
        .content{
            text-align: center;
        }
        .link{
            text-decoration: none;
        }
        section{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            /* background: url("https://img6.thuthuatphanmem.vn/uploads/2022/03/04/background-quang-cao-thoi-trang-quan-ao_025656570.jpg"); */
            background-position: center;
            background-size: cover;
        }
    </style>
</head>
<body>
<section>
    <div class="container">

        <form method="POST" action="/registerr">
            @csrf
            <h1>Đăng ký tài khoản</h1>
            <div class="form-group">
                <label>Tên đăng nhập</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                @error('name')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
            <input name="vaiTro" value="user" hidden>
            <div class="form-group">
                <label>Họ và tên</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="hoTen">
                @error('hoTen')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" name="newEmail">
                @error('newEmail')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Điện thoại</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="sDT">
                @error('sDT')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Ngày sinh</label>
                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ngaySinh">
                @error('ngaySinh')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                @error('password')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="exampleInputPassword1"  name="password_confirmation">
                @error('password_confirmation')
                <small class="form-text">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Đăng ký</button>
            <div class="content">
                <hr>
                    <p>Bạn đã có tài khoản ?
                        <a href="/login">Đăng nhập</a>

            </div>
        </form>
    </div>
</section>

</body>
</html>
