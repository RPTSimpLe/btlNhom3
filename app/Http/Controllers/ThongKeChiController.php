<?php

namespace App\Http\Controllers;

use App\Models\thongKeChi;
use App\Models\thongKeTong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeChiController extends Controller
{
    public function store(Request $request,$date){
        $id=$this->taoThongKeTong($request,$date);
        $tienChi = $this->tinhTienChi($request);

        $chi=thongKeChi::create([
            "tenSanPham"=>$request->tenSP,
            "soLuongNhap"=>$request->tonKho,
            "giaNhap"=>$request->giaNhap,
            "thongKeTong_id" =>$id,
            "tongTienNhapHang"=>$tienChi,
        ]);
        $chi->save();
        $thu = new ThongKeThuController();
        $thu->store($request->tenSP,$request->giaBan);
    }
    public function taoThongKeTong($request,$date){
        $tienChi = $this->tinhTienChi($request);

        $thongke = new ThongKeTongController();
        $thongKeTongs= thongKeTong::all();
        foreach ($thongKeTongs as $thongKeTong) {
            if ($thongKeTong->updated_at==$date){
                $thongKeTong->update([
                    "tienChi" => intval($thongKeTong->tienChi)+$tienChi,
                ]);
                return $thongKeTong->id;
            }
        }
        $id=$thongke->store($tienChi);
        return $id;
    }

    public function update($tenCu,$request,$ngayMoi){
        $thongKeChi=DB::table("thong_ke_chis")
            ->where("tenSanPham","=",$tenCu)
            ->latest()->first();
        $thongKeChi = thongKeChi::find($thongKeChi->id);
        $tienChiCu = $thongKeChi->tongTienNhapHang;

        $tienChiMoi = $this->tinhTienChi($request);
        if ($thongKeChi->updated_at==$ngayMoi){
            $thongKeChi->update([
                "tenSanPham" =>$request->tenSPmoi,
                "giaNhap" => $request->giaNhap,
                "tongTienNhapHang"=>$tienChiMoi,
                "soLuongNhap" => $request->tonKho,
            ]);
            $tongId = $thongKeChi->thongKeTong_id;

            $thongKeTong = new ThongKeTongController();
            $thongKeTong->updateTongChi($tongId,$tienChiMoi,$tienChiCu);

            $thu = new ThongKeThuController();

            $thu->update($tenCu,$request->ten,$request->giaNhap);
        }else{
            $this->store($request,$ngayMoi);
        }
    }

    public function tinhTienChi($request){
       return intval($request->giaNhap)*intval($request->tonKho);
    }
}
