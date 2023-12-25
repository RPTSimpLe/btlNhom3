<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\chiTietHoaDon;
use App\Models\gioHang;
use App\Models\hoaDon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gioHangs=DB::table("gio_hangs")
            ->select("gio_hangs.*","san_phams.ten")
            ->join("san_phams","san_phams.id","=","sanPham_id")
            ->where("gio_hangs.user_id","=",Auth::user()->id)
            ->get();
        return view("user.thanhToan.datHang",compact("gioHangs"));
    }

    public function hoaDon($id ){
        $hoaDon=hoaDon::find($id);
        $user=DB::table("users")->select("sDT")->where("id","=",$hoaDon->user_id)->first();
        $chiTiets=DB::table("chi_tiet_hoa_dons")
            ->where("hoaDon_id","=",$id)->get();
        return view("user.thanhToan.hoaDon",compact("hoaDon","chiTiets","user"));
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
        $validate =$request->validated();
        $hoaDon= hoaDon::create([
            "diaChi" => $request->diaChi,
            "ghiChu" => $request->ghiChu,
            "tongTien" => $request ->tongTien,
            "giamGia" => $request->giamGia==10 ? 10:0,
            "hinhThucThanhToan" => $request->hinhThucThanhToan,
            "user_id" => Auth::user()->id
        ]);
        $hoaDon->save();
        $chitiet= new ChiTietHoaDonController();
        $chitiet->store($request,$hoaDon->id);
        //khtt
        $hoaDonUsers = DB::table("hoa_dons")->where("user_id","=",Auth::user()->id)->get();
        $y=0;
        foreach ($hoaDonUsers as $hoaDonUser) {
            $soMayDaMua = DB::table("chi_tiet_hoa_dons")->where("hoaDon_id","=",$hoaDonUser->id)->get();
            foreach ($soMayDaMua as $x) {
                $y+= intval($x->soLuong);
            }
        }
        if($y >= 5){
            $user = User::find(Auth::user()->id);
            $user->update([
               "KHTT" =>1,
            ]);
        }

        return redirect("/user/chiTietDon/$hoaDon->id");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $hoaDons= DB::table("hoa_dons")->where("user_id","=",Auth::user()->id)->get();
        return view("user.donHang.donHangDaDat",compact("hoaDons"));
    }
    public function adminShow()
    {
        $hoaDons= hoaDon::all();
        return view("admin.donHang.donHang",compact("hoaDons"));
    }
    public function chiTietHoaDonAD($id ){
        $hoaDon=hoaDon::find($id);
        $user=DB::table("users")->select("sDT","hoTen")->where("id","=",$hoaDon->user_id)->first();
        $chiTiets=DB::table("chi_tiet_hoa_dons")
            ->where("hoaDon_id","=",$id)->get();
        return view("admin.donHang.chiTietDon",compact("hoaDon","chiTiets","user"));
    }
    public function search(Request $request)
    {
        $value= $request->keys();
        $x=$value[0];
        if ($x=="tenSP"){
            $serchHoaDons= DB::table("chi_tiet_hoa_dons")
                ->select("chi_tiet_hoa_dons.tienHang","chi_tiet_hoa_dons.soLuong","chi_tiet_hoa_dons.tenSanPham","hoa_dons.*","users.hoTen")
                ->join("hoa_dons","hoa_dons.id","=","hoaDon_id")
                ->join("users","hoa_dons.user_id","=","users.id")
                ->where("tenSanPham","=",$request->$x)->get();
        }else{
            $serchHoaDons= DB::table("users")
                ->select("chi_tiet_hoa_dons.tienHang","chi_tiet_hoa_dons.soLuong","chi_tiet_hoa_dons.tenSanPham","hoa_dons.*","users.hoTen")
                ->join("hoa_dons","hoa_dons.user_id","=","users.id")
                ->join("chi_tiet_hoa_dons","hoa_dons.id","=","hoaDon_id")
                ->where("hoTen","=",$request->$x)->get();
        }
        return view("admin.donHang.donHang",compact("serchHoaDons"));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hoaDon $hoaDon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,$trangThai)
    {
        $hoaDon = hoaDon::find($id);
        if ($trangThai==1){
            $trangThai="Chờ giao hàng";
        }else{
            $trangThai="Đã giao";
        }
        $hoaDon->update([
           "TrangThai" => $trangThai,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        hoaDon::find($id)->delete();
        return back();
    }
    public function locDon($tt){
        if($tt == 0){
            $tt= "chờ xác nhận";
        }elseif($tt == 1 ){
            $tt = "chờ giao hàng";
        }else{
            $tt = "đã giao";
        }

        $hoaDons= DB::table("hoa_dons")
            ->where("user_id","=",Auth::user()->id)
            ->where("TrangThai","=",$tt)->get();
        return view("user.donHang.donHangDaDat",compact("hoaDons"));
    }
}
