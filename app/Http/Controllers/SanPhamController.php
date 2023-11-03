<?php

namespace App\Http\Controllers;

use App\Models\danhMuc;
use App\Models\sanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhMucs= danhMuc::all();
        return view("admin.sanPham.taoSanPham",compact("danhMucs"));
    }
    public function timKiemSP($ten){
        $sanPhams = DB::table("san_phams")
            ->where("ten","like","%".$ten."%")
            ->get();
        return $sanPhams;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sanPham = sanPham::create([
            "ten" => $request->ten,
            "nhaSX" => $request->nhaSX,
            "namSX" => $request->namSX,
            "tonKho" => $request->tonKho,
            "moTa" => $request->moTa,
            "baoHanh" => $request->baoHanh,
            "giaNhap" => $request->giaNhap,
            "giaBan" => $request->giaBan,
            "danhMuc_id" => $request->danhMuc,
        ]);
        $sanPham->save();
        $img = new ImageController();
        $img->storeSanPham($request,$sanPham->id);
        return redirect("/admins/admin/danhSachSanPham");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $sanPhams = DB::table("san_phams")
            ->select("san_phams.*","danh_mucs.ten as tenDanhMuc")
            ->leftJoin("danh_mucs","danhMuc_id","=","danh_mucs.id")
            ->get();
        return view("admin.sanPham.danhSachSanPham",compact("sanPhams"));
    }

    public function showAll()
    {
        $sanPhams = DB::table("san_phams")
            ->select("san_phams.*","images.url")
            ->join("images","images.sanPham_id","=","san_phams.id")
            ->get();
        return $sanPhams;
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sanPham $sanPham)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sanPham= sanPham::find($id);
        $sanPham->update([
            'ten' => $request->ten,
            "nhaSX" => $request->nhaSX,
            "namSX" => $request->namSX,
            "tonKho" => $request->tonKho,
            "moTa" => $request->moTa,
            "baoHanh" => $request->baoHanh,
            "giaNhap" => $request->giaNhap,
            "giaBan" => $request->giaBan,
        ]);

        if(isset($request->img)){
            $img = new ImageController();
            $img->updatePro($request,$id);
        }
        return back()->with('status','Cập nhật thông tin thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        $sanPham= sanPham::find($id);
        $img=DB::table("images")->where("sanPham_id","=",$id)->first();
        if(isset($img)) {
            $img = new ImageController();
            $img->destroyPro($id);
        }

        $sanPham->delete();

        return back();
    }
    public function search(Request $request)
    {
        $value= $request->keys();
        $x=$value[0];
        if($x=="ten"){
            $searchSanPhams = DB::table("san_phams")
                ->select("san_phams.*","danh_mucs.ten as tenDanhMuc")
                ->leftJoin("danh_mucs","danhMuc_id","=","danh_mucs.id")
                ->where("san_phams.".$x,"like","%".$request->$x."%")
                ->get();
        }elseif ($x=="tenDanhMuc"){
            $searchSanPhams = DB::table("san_phams")
                ->select("san_phams.*","danh_mucs.ten as tenDanhMuc")
                ->leftJoin("danh_mucs","danhMuc_id","=","danh_mucs.id")
                ->where("danh_mucs.ten","=",$request->$x)
                ->get();
        }else{
            $searchSanPhams = DB::table("san_phams")
                ->select("san_phams.*","danh_mucs.ten as tenDanhMuc")
                ->leftJoin("danh_mucs","danhMuc_id","=","danh_mucs.id")
                ->where("san_phams.".$x,"=",$request->$x)
                ->get();
        }
        return back()->with("searchSanPhams",$searchSanPhams);
    }

    public function timKiemBangIdDanhMuc($id){
        $searchSanPhams = DB::table("san_phams")
            ->select("san_phams.*","danh_mucs.ten as tenDanhMuc","danh_mucs.id as idDanhMuc","images.url")
            ->leftJoin("danh_mucs","danhMuc_id","=","danh_mucs.id")
            ->rightJoin("images","images.sanPham_id","=","san_phams.id")
            ->where("danh_mucs.id","=",$id)
            ->get();
        return $searchSanPhams;
    }
    public function chiTiet($id){
        $sanPham = DB::table("san_phams")
            ->select("san_phams.*","images.url","danh_mucs.ten as tenDanhMuc")
            ->leftJoin("danh_mucs","danhMuc_id","=","danh_mucs.id")
            ->rightJoin("images","images.sanPham_id","=","san_phams.id")
            ->where("san_phams.id","=",$id)
            ->first();
//        return $sanPham;
        return view("user.sanPham.chiTiet",compact("sanPham"));
    }
}
