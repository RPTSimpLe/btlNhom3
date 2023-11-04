<?php

namespace App\Http\Controllers;

use App\Models\gioHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GioHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = DB::table("gio_hangs")
                ->select("gio_hangs.*","images.url","san_phams.giaBan","san_phams.ten")
                ->join("san_phams","san_phams.id","=","sanPham_id")
                ->join("images","images.sanPham_id","=","gio_hangs.sanPham_id")
                ->get();
        return view("user.gioHang.gioHang",compact("carts"));
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
        $tongTien= $request->soLuong*$request->gia;
        $gioHang = gioHang::create([
            "soLuong" => $request->soLuong,
            "sanPham_id" => $request->sanPhamId,
            "user_id" => Auth::user()->id,
            "tongTien" => $tongTien,
        ]);
        $gioHang->save();
        return back();
    }

    public function hienThiGioHang(){

    }
    /**
     * Display the specified resource.
     */
    public function show(gioHang $gioHang)
    {
//        $carts = gioHang::all();
//        re
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(gioHang $gioHang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, gioHang $gioHang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gioHang=gioHang::find($id)->delete();
        return back();
    }
}