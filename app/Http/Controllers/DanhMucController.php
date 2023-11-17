<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\danhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        $validate = $request->validated();
        $danhMuc= danhMuc::create([
           "ten" => $request->danhMuc,
        ]);
        $danhMuc->save();
        return redirect("/admins/admin/danhSachDanhMuc");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $danhMucs= danhMuc::all();
        return view("admin.danhMuc.danhSachDanhMuc",compact("danhMucs"));
    }
    public function showall()
    {
        return danhMuc::all();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(danhMuc $danhMuc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        $validate = $request->validated();

        $danhMuc = danhMuc::find($id);
        $danhMuc->update([
           "ten" => $request->danhMucMoi,
        ]);
        return back()->with("status", "Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $danhMuc = danhMuc::find($id);
        $sanPhams= DB::table("san_phams")->where("danhMuc_id","=",$id)->get();
        if (isset($sanPhams)){
            $x = new SanPhamController();
            foreach ($sanPhams as $sanPham){
                $x->destroy($sanPham->id);
            }
        }
        $danhMuc->delete();
        return back();
    }
    public function search(Request $request)
    {
        $value= $request->keys();
        $x=$value[0];
        if($x=="id"){
            $searchDanhMucs = DB::table("danh_mucs")->where($x,"=",$request->$x) ->get();
        }else{
            $searchDanhMucs = DB::table("danh_mucs")->where($x,"like","%".$request->$x."%")->get();
        }
        return back()->with("searchDanhMucs",$searchDanhMucs);
    }
}
