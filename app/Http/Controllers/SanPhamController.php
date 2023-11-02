<?php

namespace App\Http\Controllers;

use App\Models\danhMuc;
use App\Models\sanPham;
use Illuminate\Http\Request;

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
        $sanPham = sanPham::create([
            "ten" => $request->ten,
            "nhaSX" => $request->nhaSX,
            "namSX" => $request->namSX,
            "tonKho" => $request->tonKho,
            "moTa" => $request->moTa,
            "baoHanh" => $request->baoHanh,
            "giaNhap" => $request->giaNhap,
            "giaBan" => $request->giaBan,
            "danhMuc_id" => $request->danhMuc,
        ]);
        $img = new ImageController();
        $img->storeSanPham($request,$sanPham->id);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(sanPham $sanPham)
    {
        $sanPhams = sanPham::all();
        return view("admin.sanPham.danhSachSanPham",compact("sanPhams"));
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
    public function update(Request $request, sanPham $sanPham)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sanPham $sanPham)
    {
        //
    }
}
