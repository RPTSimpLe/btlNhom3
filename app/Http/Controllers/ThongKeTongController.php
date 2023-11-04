<?php

namespace App\Http\Controllers;

use App\Models\thongKeTong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeTongController extends Controller
{
    public function index(){
        $thongKes=DB::table("thong_ke_tongs")
            ->select("thong_ke_tongs.*",
                "thong_ke_chis.soLuongNhap","thong_ke_chis.tongTienNhapHang","thong_ke_chis.tenSanPham","thong_ke_chis.giaNhap",
                "thong_ke_thus.soLuongBan","thong_ke_thus.tongTienBan","thong_ke_thus.giaBan")
            ->leftJoin("thong_ke_chis","thong_ke_chis.thongKeTong_id","=","thong_ke_tongs.id")
            ->rightJoin("thong_ke_thus","thong_ke_thus.tenSanPham","=","thong_ke_chis.tenSanPham")
            ->get();
        return view("admin.thongKe.thongKe",compact("thongKes"));
    }
    public function store($tienChi){
        $thongke=thongKeTong::create([
            "tienChi" => $tienChi,
        ]);
        $thongke->save();
        return $thongke->id;
    }
    public function updateTongChi($tongId,$tienChiMoi,$tienChiCu){
        $thongKeChi=DB::table("thong_ke_tongs")
            ->where("id","=",$tongId)->first();

        $tongTienChiCu = intval( $thongKeChi->tienChi);
        thongKeTong::find($tongId)->update([
            "tienChi" => $tongTienChiCu-$tienChiCu+$tienChiMoi,
        ]);
    }
    public function updateTongThu($tongTienGioHang){
        $thongKeTong= DB::table("thong_ke_tongs")->latest()->first();
        $tienThu=intval($thongKeTong->tienThu)+$tongTienGioHang;
        $doanhThu= $tienThu-intval($thongKeTong->tienChi);

        $thongKeTong=thongKeTong::find($thongKeTong->id);
        $thongKeTong->update([
           "tienThu" => $tienThu,
            "doanhThu" => $doanhThu,
        ]);
    }
}
