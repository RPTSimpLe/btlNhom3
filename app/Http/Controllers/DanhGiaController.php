<?php

namespace App\Http\Controllers;

use App\Models\danhGia;
use App\Models\sanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function chiTiet($tenSP)
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
        return view("user.sanPham.chiTiet",compact("sanPham","danhGias","form","tbc","demSoSao"));
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
        $chiTietSP= new SanPhamController();
        return $chiTietSP->chiTiet($request->idSP);
    }

    /**
     * Display the specified resource.
     */
    public function show(danhGia $danhGia)
    {
        //
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
    public function destroy(danhGia $danhGia)
    {
        //
    }
}
