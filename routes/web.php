<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\DanhGiaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//trang chu
Route::get('/', function () {
    return redirect("/dashboard");
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post("/registerr",[UserController::class,"store"]);

Route::get("/danhSachDanhMuc",[DanhMucController::class,"showall"]);
Route::get("/danhMuc",function (){return view("user.danhMuc.danhMuc");});

Route::get("/showAllSP",[\App\Http\Controllers\SanPhamController::class,"showAll"]);
Route::get("/chiTietSanPham/{id}",[\App\Http\Controllers\SanPhamController::class, "chiTiet"]);
Route::get("/timKiemSP/{ten}",[\App\Http\Controllers\SanPhamController::class,"timKiemSP"]);

Route::middleware(['auth', 'verified'])->group(function () {
    // các route chỉ được truy cập bởi user có quyền admin
    Route::middleware(['can:admin'])->prefix("admins")->group(function () {
        //profile
        Route::get("/",function (){return view("admin.homepage");});
        Route::get("/profile",[UserController::class,"profile"]);

        //tai khoan
        Route::get("/admin/create",function (){return view("admin.acc.create");});
        Route::post("/admin/create",[UserController::class,"adminStore"]);
        Route::get("/admin/list",[UserController::class,"show"]);
        Route::get("/admin/searchUser", [UserController::class,"search"]);
        Route::patch("/admin/resetpass/{id}",[UserController::class,"resetPass"]);
        Route::delete("/admin/deleteUser/{id}",[UserController::class,"destroy"]);
        Route::patch("/admin/updateUser/{id}",[UserController::class,"update"]);

        Route::get("/admin/taoDanhMuc",function (){return view("admin.danhMuc.taoDanhMuc");});
        Route::post("/admin/taoDanhMuc",[DanhMucController::class,"store"]);
        Route::get("/admin/danhSachDanhMuc",[DanhMucController::class,"show"]);
        Route::patch("/admin/updateDanhMuc/{id}",[DanhMucController::class,"update"]);
        Route::delete("/admin/deleteDanhMuc/{id}",[DanhMucController::class,"destroy"]);
        Route::get("/admin/searchDanhMuc",[DanhMucController::class,"search"]);

        Route::get("/admin/taoSanPham",[\App\Http\Controllers\SanPhamController::class,"index"]);
        Route::post("/admin/taoSanPham",[\App\Http\Controllers\SanPhamController::class,"store"]);
        Route::get("/admin/danhSachSanPham",[\App\Http\Controllers\SanPhamController::class,"show"]);
        Route::patch("/admin/updateSanPham/{id}",[\App\Http\Controllers\SanPhamController::class,"update"]);
        Route::delete("/admin/deleteSanPham/{id}",[\App\Http\Controllers\SanPhamController::class,"destroy"]);
        Route::get("/admin/searchSanPham",[\App\Http\Controllers\SanPhamController::class,"search"]);

        Route::get("/admin/donHang",[HoaDonController::class,"adminShow"]);
        Route::get("/admin/chiTietDon/{id}",[HoaDonController::class,"chiTietHoaDonAD"]);
        Route::get("/admin/searchHoaDon",[HoaDonController::class,"search"]);

        Route::get("/admin/thongKe",[\App\Http\Controllers\ThongKeTongController::class,"index"]);

    });

    // các route chỉ được truy cập bởi user
    Route::middleware(['can:user'])->prefix("user")->group(function () {
        Route::get("/thongTin",[UserController::class,"profileKhach"]);
        Route::post("/capNhat/{id}",[UserController::class,"update"]);

        Route::get("/hoaDon",function (){return view("user.thanhToan.hoaDon");});

        Route::get("/gioHang",[GioHangController::class,"index"]);
        Route::get("/themVaoGio",[GioHangController::class,"store"]);
        Route::delete("/xoaGioHang/{id}",[GioHangController::class,"destroy"]);

        Route::get("/datHang",[HoaDonController::class,"index"]);

        Route::get("/chiTietDon/{id}",[\App\Http\Controllers\HoaDonController::class,"hoaDon"]);
        Route::post("/themHoaDon",[\App\Http\Controllers\HoaDonController::class,"store"]);

        Route::get("/donHangDaDat",[HoaDonController::class,"show"]);

        Route::get("/danhGia/{tenSP}",[DanhGiaController::class,"chiTiet"]);
        Route::post("/themDanhGia",[DanhGiaController::class,"store"]);

    });

    Route::put("/profile/password",[UserController::class,"updatePass"]);
    Route::get("/getLink/{id}",[ImageController::class,"search"]);
    Route::get("/delete",[ImageController::class,"destroy"]);
    Route::get("/getLinkPro/{id}",[ImageController::class,"searchPro"]);

});

require __DIR__.'/auth.php';
