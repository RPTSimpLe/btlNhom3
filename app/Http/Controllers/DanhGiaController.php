<?php

namespace App\Http\Controllers;

use App\Models\danhGia;
use App\Models\hoaDon;
use App\Models\sanPham;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function chiTiet($tenSP, Request $request)
    {
        $sanPham = DB::table("san_phams")
            ->select("san_phams.*","images.url","danh_mucs.ten as tenDanhMuc")
            ->leftJoin("danh_mucs","danhMuc_id","=","danh_mucs.id")
            ->rightJoin("images","images.sanPham_id","=","san_phams.id")
            ->where("san_phams.ten","=",$tenSP)
            ->first();
        $danhGias = DB::table("danh_gias")
            ->select("users.*","danh_gias.*")
            ->leftJoin("users","users.id","=","danh_gias.user_id")
            ->where("danh_gias.sanPham_id","=",$sanPham->id)->get();
        $form="";

        $tbc=0;
        $demSoSao=[0,0,0,0,0];
        if (count($danhGias)>0){
            foreach ($danhGias as $danhGia) {
                $tbc+=intval($danhGia->soSao);
            }
            $tbc= number_format(floatval($tbc/count($danhGias)),2);

                $demSoSao=[];
            for ($i = 1; $i <= 5; $i++) {
                $demSao = DB::table("danh_gias")
                    ->where("soSao","=",$i)
                    ->where("danh_gias.sanPham_id","=",$sanPham->id)
                    ->count();
                $demSoSao[]=$demSao;
            }
        }
        $idHD =  $request->idHD;
        return view("user.sanPham.chiTiet",compact("sanPham","danhGias","form","tbc","demSoSao","idHD"));
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
        $danhGia = danhGia::create([
            "soSao"=> $request->soSao,
            "danhGia"=> $request->danhGia,
            "user_id"=> Auth::user()->id,
            "sanPham_id"=> $request->idSP,
        ]);
        $danhGia->save();
        $hoaDon = hoaDon::find($request->idHD);
        $hoaDon->update([
            "danhGia" => "đã đánh giá"
        ]);

        $chiTietSP= new SanPhamController();
        return $chiTietSP->chiTiet($request->idSP);
    }

    /**
     * Display the specified resource.
     */
    public function showALL()
    {
        $danhGias= danhGia::all();
        return view("admin.danhGia.danhGia",compact("danhGias"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(danhGia $danhGia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, danhGia $danhGia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $danhGia = danhGia::find($id);
        $danhGia->delete();
        return redirect("/admins/admin/danhGia");
    }
    public function search(Request $request){
        $value= $request->keys();
        $x=$value[0];
        if ($x=="name"){
            $searchDanhGias="";
            if (DB::table("users")->where("name","=",$request->$x)->first()!=null) {
                $uID = DB::table("users")->where("name", "=", $request->$x)->first();
                $searchDanhGias = DB::table("danh_gias")->where("user_id", "=", $uID->id)->get();
            }
        }else if($x=="ten") {
            $searchDanhGias="";
                if (DB::table("san_phams")->where("ten","like","%".$request->$x."%")->first()!=null) {
                $pID = DB::table("san_phams")->where("ten","like","%".$request->$x."%")->first();
                $searchDanhGias = DB::table("danh_gias")->where("sanPham_id", "=", $pID->id)->get();
            }
        }else {
            $searchDanhGias = DB::table("danh_gias")->where($x,"=",$request->$x)->get();
        }
        return back()->with("searchDanhGias",$searchDanhGias);
    }
}
