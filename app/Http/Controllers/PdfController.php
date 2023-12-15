<?php

namespace App\Http\Controllers;

use App\Models\hoaDon;
use App\Models\thongKeTong;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
class PdfController extends Controller
{
    public function hoaDonPDF($hoaDonId){
        $hoaDon = hoaDon::find($hoaDonId);
        $data= [
            "hoadon" => $hoaDon,
            "khachHang" => User::find($hoaDon->user_id),
            "chiTiet" => DB::table("chi_tiet_hoa_dons")->where("hoaDon_id","=",$hoaDon->id)->get()
        ];
        $pdf = Pdf::loadView('admin.donHang.inHoaDon', $data);

        return $pdf->stream();
    }
    public function thongKePDF($tKTongId){
        $tKTong = thongKeTong::find($tKTongId);
        $chitiet= DB::table("thong_ke_thus")
            ->select("thong_ke_thus.*","thong_ke_chis.soLuongNhap","thong_ke_chis.giaNhap","thong_ke_chis.tongTienNhapHang")
            ->join("thong_ke_chis","thong_ke_chis.tenSanPham","=","thong_ke_thus.tenSanPham")
            ->where("thong_ke_thus.thongKeTong_id","=",$tKTongId)
            ->get();
        $data= [
            "tKTong" => $tKTong,
            "chitiet" => $chitiet,
        ];
        $pdf = Pdf::loadView('admin.thongKe.inThongKe', $data)->setPaper('legal', 'landscape');;

        return $pdf->stream();
    }
}
