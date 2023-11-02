<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DepartmentSubjectController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SubjectsStudentsController;
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

Route::get('/', function () {
    return redirect("/dashboard");
});

Route::get('/dashboard', function () {

    return view('dashboard');
})->name('dashboard');

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


        Route::get("admin/createDepartment",function (){return view("admin.department.createDepartment");});
        Route::post("admin/createDepartment",[DepartmentController::class,"store"]);
        Route::get("admin/listDepartment",[DepartmentController::class,"show"]);
        Route::patch("admin/updateDepartment/{id}",[DepartmentController::class,"update"]);
        Route::delete("/admin/deleteDepartment/{id}",[DepartmentController::class,"destroy"]);
        Route::get("/admin/searchDepartment", [DepartmentController::class,"search"]);
        Route::get("admin/searchTeacherByDepartment/{departmentId}", [TeacherController::class,"searchByDepartment"]);

        Route::get("admin/createGrade",[GradeController::class,"index"]);
        Route::post("admin/createGrade",[GradeController::class,"store"]);
        Route::get("admin/listGrade",[GradeController::class,"show"]);
        Route::get("admin/searchByDepartment/{departmentId}", [GradeController::class,"searchByDepartment"]);
        Route::patch("/admin/updateGrade/{id}",[GradeController::class,"update"]);
        Route::get("/admin/searchGrade",[GradeController::class,"search"]);
        Route::delete("/admin/deleteGrade/{id}",[GradeController::class,"destroy"]);

        Route::get("/admin/createSubject", [SubjectController::class,"index"]);
        Route::post("/admin/createSubject", [SubjectController::class,"store"]);
        Route::post("/admin/createDepartmentSubject", [DepartmentSubjectController::class,"store"]);
        Route::patch("/admin/updateSubject/{id}", [SubjectController::class,"update"]);
        Route::get("/admin/renderDepartmentSubject/{id}",[DepartmentSubjectController::class,"renderDepartmentBySubject"]);
        Route::get("/admin/listSubject",[SubjectController::class,"show"]);
        Route::get("/admin/listDepartmentSubject",[DepartmentSubjectController::class,"show"]);
        Route::delete("/admin/deleteSubject/{id}",[SubjectController::class,"destroy"]);
        Route::get("/admin/searchSubject",[SubjectController::class,"search"]);
        Route::get("/admin/renderSubject",[SubjectController::class,"renderSubject"]);
        Route::get("/admin/renderDepartment",[DepartmentController::class,"renderDepartment"]);
        Route::patch("/admin/updateDepartmentSubject/{id}",[DepartmentSubjectController::class,"update"]);
        Route::delete("/admin/deleteSubject/{id}",[SubjectController::class,"destroy"]);
        Route::delete("/admin/deleteDeSubject/{id}",[DepartmentSubjectController::class,"destroy"]);


        Route::get("/admin/createTimeTable", [TimetableController::class,'index']);
        Route::post("/admin/createTimeTable", [TimetableController::class,'store']);
        Route::get("/admin/renderDepartmentSubjectByDeId/{id}",[DepartmentSubjectController::class,"renderDepartmentSubjectByDeId"]);
        Route::get("/admin/showLesson",[LessonController::class,"show"]);
        Route::get("/admin/showTimeTable/{id}",[TimetableController::class,"show"]);
        Route::get("/admin/detailTimeTable/{id}",[TimetableController::class,"detail"]);
        Route::patch("/admin/updateTimeTable/{id}", [TimetableController::class,'update']);
        Route::delete("/admin/destroyTimetable/{id}", [TimetableController::class,'destroy']);
        Route::delete("/admin/destroyAllTimetableByGrade/{id}", [TimetableController::class,'destroyAll']);
//        Route::get("/admin/find/{gradeId}", [TimetableController::class,'studentFee']);

        Route::get("admin/checkPoint",[SubjectsStudentsController::class,"index"]);
        Route::get("/admin/renderSubjecByGradeId/{gradeId}",[SubjectsStudentsController::class,"renderSubjecByGradeId"]);
        Route::get("/admin/showPoint/{subjectId}/{gradeId}",[SubjectsStudentsController::class,"show"]);
        Route::patch("/admin/updatePoint/{id}",[SubjectsStudentsController::class,"updatePoint"]);
        Route::get("/admin/searchPoint",[SubjectsStudentsController::class,"search"]);
    });

    // các route chỉ được truy cập bởi user
    Route::middleware(['can:user'])->prefix("user")->group(function () {
        Route::get("/category",function (){return view("user.category.category");});
        Route::get("/danhSachDanhMuc",[DanhMucController::class,"showall"]);

        Route::get("/cart",function (){return view("user.cart.cart");});
        Route::get("/datHang",function (){return view("user.delivery.datHang");});
        Route::get("/bill",function (){return view("user.delivery.bill");});
        Route::get("/donHangDaDat",function (){return view("user.bill.donHangDaDat");});
    });

    Route::put("/profile/password",[UserController::class,"updatePass"]);
    Route::get("/getLink/{id}",[ImageController::class,"search"]);
    Route::get("/delete",[ImageController::class,"destroy"]);

});
 Route::post("/registerr",[UserController::class,"store"]);
require __DIR__.'/auth.php';
