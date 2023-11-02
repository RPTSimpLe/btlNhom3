<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Image;
use App\Models\sanPham;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
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
    public function newName(Request $request){
        return 'img_'.time().'_'.$request->vaiTro.".".$request->img->extension();

    }
    public function store(Request $request,$userId)
    {

        $newName=$this->newName($request);
        $request->img->move(public_path("images"),$newName);
        $image = Image::create([
            "url"=>$newName,
            "user_id"=>$userId,
        ]);
        $image->save();
    }

    public function storeSanPham(Request $request,$sanPhamId)
    {

        $newName=$this->newName($request);
        $request->img->move(public_path("images"),$newName);
        $image = Image::create([
            "url"=>$newName,
            "sanPham_id"=>$sanPhamId,
        ]);
        $image->save();
    }
    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $image=$this->search($id);
        $newName = $this->newName($request);
        if(is_null($image)){
            $this->store($request,$id);
        }else{
            $this->deleteImgFile($image);
            $image->update([
                "url"=>$newName,
            ]);
            $request->img->move(public_path("images"),$newName);
        }
    }
    public function updatePro(Request $request,$id)
    {
        $image=DB::table("images")->where("sanPham_id","=",$id)->first();
        $newName = $this->newName($request);
        if(is_null($image)){
            $this->storeSanPham($request,$id);
        }else{
        $image=Image::find($image->id);
            $this->deleteImgFile($image);
            $image->update([
                "url"=>$newName,
            ]);
            $request->img->move(public_path("images"),$newName);
        }
    }
    public function destroyPro($id)
    {
        $image=$this->searchPro($id);
        $img=Image::find($image->id);
        $this->deleteImgFile($img);
        $img->delete();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function deleteImgFile( $image){
        $url=$image->url;
        $path =public_path('/images/'.$url);
        if(file_exists($path)){
            unlink($path);
        }
    }
    public function destroy($id)
    {
        $image=$this->search($id);
        $this->deleteImgFile($image);
        $image->delete();
    }
    public function search($id){
        return User::find($id)->images;
    }
    public function searchPro($id){
        $url=DB::table("images")->where("sanPham_id","=",$id)->first();
        return $url;
    }
}
