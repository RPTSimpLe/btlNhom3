<?php

namespace App\Http\Controllers;

use App\Models\chiTietHoaDon;
use App\Models\gioHang;
use App\Models\sanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChiTietHoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request,$hoaDonId)
    {
        $gioHangs=DB::table("gio_hangs")
            ->select("gio_hangs.*","san_phams.ten")
            ->join("san_phams","san_phams.id","=","sanPham_id")
            ->where("user_id","=",Auth::user()->id)->get();
        foreach ($gioHangs as $gioHang){
            $chiTiet=chiTietHoaDon::create([
                "soLuong"=> $gioHang->soLuong,
                "tenSanPham"=> $gioHang->ten,
                "tienHang"=> $gioHang->tongTien,
                "hoaDon_id" => $hoaDonId,
            ]);

            $sanPham= DB::table("san_phams")
                ->where("id","=",$gioHang->sanPham_id)->first();
            $tonKho= intval($sanPham->tonKho)-intval($gioHang->soLuong);
            $sanPham=sanPham::find($sanPham->id);
            $sanPham->update([
                "tonKho" => $tonKho,
            ]);

            $chiTiet->save();
            gioHang::find($gioHang->id)->delete();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(chiTietHoaDon $chiTietHoaDon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(chiTietHoaDon $chiTietHoaDon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, chiTietHoaDon $chiTietHoaDon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(chiTietHoaDon $chiTietHoaDon)
    {
        //
    }
}
