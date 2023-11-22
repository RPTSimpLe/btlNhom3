<?php

namespace App\Http\Controllers;

use App\Models\thongKeThu;
use App\Models\thongKeTong;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeThuController extends Controller
{
    public function store($tenSP,$giaBan){
        $thongKeTong= DB::table("thong_ke_tongs")->latest()->first();
        $thongKeThu=thongKeThu::create([
            "tenSanPham" => $tenSP,
            "soLuongBan"=>0,
            "giaBan" => $giaBan,
            "tongTienBan"=>0,
            "thongKeTong_id"=> $thongKeTong->id,
        ]);

        $thongKeTong=thongKeTong::find($thongKeTong->id)->update([
            "doanhThu" => intval($thongKeTong->tienThu)-intval($thongKeTong->tienChi),
        ]);
    }
    public function update($tenSP,$soLuong,$tienHang){
        $thongKeTong= DB::table("thong_ke_tongs")->latest()->first();
        $thongKeThu= DB::table("thong_ke_thus")
            ->where("thongKeTong_id","=",$thongKeTong->id)
            ->where("tenSanPham","=",$tenSP)
            ->first();

        $soLuongMoi = intval($thongKeThu->soLuongBan)+$soLuong;
        $tongTienBanMoi = intval($thongKeThu->tongTienBan)+$tienHang;
        $thongKeThu=thongKeThu::find($thongKeThu->id);

        $thongKeThu->update([
            "soLuongBan"=>$soLuongMoi,
            "tongTienBan"=>$tienHang,
            "doanhThu"=>  $tienHang-intval($thongKeTong->tienChi)
        ]);
    }

    public function updateSP($tenSPcu,$tenSPmoi,$giaBan){
        $thongKeTong= DB::table("thong_ke_tongs")->latest()->first();
        $thongKeThu= DB::table("thong_ke_thus")
            ->where("thongKeTong_id","=",$thongKeTong->id)
            ->where("tenSanPham","=",$tenSPcu)
            ->distinct()
            ->first();

        $thongKeThu=thongKeThu::find($thongKeThu->id);

        $thongKeThu->update([
            "tenSanPham" => $tenSPmoi,
            "giaBan" => $giaBan,
        ]);
    }
}
