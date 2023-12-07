<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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
            ->take(6)
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
    public function store(UserRequest $request)
    {
        $validates = $request->validated();

        $sanPham = sanPham::create([
            "ten" => $request->tenSP,
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
       if(isset($request->img)){
           $img = new ImageController();
           $img->storeSanPham($request,$sanPham->id);
       }

        $thongKeChi=new ThongKeChiController();
        $thongKeChi->store($request,$sanPham->updated_at);
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

    public function showAll(Request $request)
    {
        $firstItems = (intval($request->page)-1)*intval($request->limit);
        if($request->idDanhMuc!=""){
            $idDanhMuc=$request->idDanhMuc;
            $sanPhams = DB::table("san_phams")
                ->select("san_phams.*","images.url")
                ->leftJoin("danh_mucs","danhMuc_id","=","danh_mucs.id")
                ->rightJoin("images","images.sanPham_id","=","san_phams.id")
                ->where("danh_mucs.id","=",$request->idDanhMuc)
                ->skip($firstItems)
                ->take($request->limit)
                ->get();

            $count =  DB::table("san_phams")
                ->select("san_phams.*","images.url")
                ->leftJoin("danh_mucs","danhMuc_id","=","danh_mucs.id")
                ->rightJoin("images","images.sanPham_id","=","san_phams.id")
                ->where("danh_mucs.id","=",$request->idDanhMuc)
                ->get()->count();
            return  [$sanPhams,$count,$idDanhMuc,"",""];
        }elseif($request->tu!="" && $request->den!=""){
            $tu=$request->tu;
            $den=substr($request->den,0, strlen($request->den) - 1);

            $sanPhams = DB::table("san_phams")
                ->select("san_phams.*","images.url")
                ->join("images","images.sanPham_id","=","san_phams.id")
                ->where("giaBan",">=",$request->tu)
                ->where("giaBan","<=",$request->den)
                ->skip($firstItems)
                ->take($request->limit)
                ->get();

            $count =  DB::table("san_phams")
                ->select("san_phams.*","images.url")
                ->join("images","images.sanPham_id","=","san_phams.id")
                ->where("giaBan",">=",$request->tu)
                ->where("giaBan","<=",$request->den)
                ->get()->count();
            return  [$sanPhams,$count,"",$tu,$den];
        }
        $sanPhams = DB::table("san_phams")
            ->select("san_phams.*","images.url")
            ->join("images","images.sanPham_id","=","san_phams.id")
            ->skip($firstItems)
            ->take($request->limit)
            ->get();
        $count = DB::table("san_phams")
            ->select("san_phams.*","images.url")
            ->join("images","images.sanPham_id","=","san_phams.id")
            ->get()->count();
        return  [$sanPhams,$count,"","",""];
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
    public function update(UserRequest $request, $id)
    {
        $validates = $request->validated();
        $sanPham= sanPham::find($id);
        $tenCu=$sanPham->ten;

        $sanPham->update([
            'ten' => $request->tenSPmoi,
            "nhaSX" => $request->nhaSX,
            "namSX" => $request->namSX,
            "tonKho" => $request->tonKho,
            "moTa" => $request->moTa,
            "baoHanh" => $request->baoHanh,
            "giaNhap" => $request->giaNhap,
            "giaBan" => $request->giaBan,
        ]);
        $ngayMoi=$sanPham->updated_at;

        $thongKeChi=DB::table("thong_ke_chis")
            ->where("tenSanPham","=",$tenCu)
            ->latest()->first();
        if ($thongKeChi!=null){
            $thongKeChi=new ThongKeChiController();
            $thongKeChi->update($tenCu,$request,$ngayMoi);
        }

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
        $danhGias = DB::table("danh_gias")
            ->select("users.*","danh_gias.*")
            ->leftJoin("users","users.id","=","danh_gias.user_id")
            ->where("danh_gias.sanPham_id","=",$id)->get();
        $tbc=0;
        $demSoSao=[0,0,0,0,0];
        if (count($danhGias)>0){
            foreach ($danhGias as $danhGia) {
                $tbc+=floatval($danhGia->soSao);
            }
            $tbc= floatval($tbc/count($danhGias));

            $demSoSao=[];
            for ($i = 1; $i <= 5; $i++) {
                $demSao = DB::table("danh_gias")
                    ->where("soSao","=",$i)
                    ->where("danh_gias.sanPham_id","=",$id)
                    ->count();
                $demSoSao[]=$demSao;
            }
        }
        return view("user.sanPham.chiTiet",compact("sanPham","danhGias","tbc","demSoSao"));
    }
}
