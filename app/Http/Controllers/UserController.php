<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ImageController;
use App\Http\Requests\PassRequest;
use App\Http\Requests\UserRequest;
use App\Models\Image;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Ramsey\Uuid\Type\Integer;
use function Laravel\Prompts\search;
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function profile(){
        $user= Auth::user();
        isset(User::find($user->id)->images->url)? $url=User::find($user->id)->images->url:$url="";
        return view("admin.profile",compact("user","url"));
    }
    public function profileKhach(){
        $user= Auth::user();
        isset(User::find($user->id)->images->url)? $url=User::find($user->id)->images->url:$url="";
        return view("user.thongTin.thongTin",compact("user","url"));
    }
    public function adminStore(UserRequest $request){
        $validation = $request->validated();
        $matkhau= $request->password;
        $user=User::create([
            "name" => $request->name,
            "hoTen" => $request->hoTen,
            "password" => $matkhau,
            "vaiTro" => $request->vaiTro,
            "sDT" => $request->sDT,
            "email" => $request->newEmail,
            "ngaySinh" => $request->ngaySinh,
        ]);
        $user->save();
            $img = new ImageController();
            $img->store($request,$user->id);
            return redirect("/admins/admin/list");
    }

    public function store(UserRequest $request){
        $validation = $request->validated();
        $matkhau= $request->password;
        $user=User::create([
            "name" => $request->name,
            "hoTen" => $request->hoTen,
            "password" => $matkhau,
            "vaiTro" => $request->vaiTro,
            "sDT" => $request->sDT,
            "email" => $request->newEmail,
            "ngaySinh" => $request->ngaySinh,
        ]);
        $user->save();
        return redirect("/login");
    }

    public function show(Request $request)
    {
        $users=User::all();
        return view("admin.acc.listAcc", compact("users"));
    }

    public function update(UserRequest $request,$id)
    {
        $validation = $request->validated();

        $user= User::find($id);
        $user->update([
            'newName' => $request->name,
            'email' => $request->email,
            "hoTen" => $request->hoTen,
            "sDT"  => $request->sDT,
            "ngaySinh" => $request->ngaySinh,
        ]);

        if(isset($request->img)){
            $img = new ImageController();
            $img->update($request,$id);
        }
        return back()->with('status','Cập nhật thông tin thành công');
    }
    public function updatePass(UserRequest $request)
    {
        $validated = $request->validated();

        $user = Auth::user();
        $user->update([
            'password' => Hash::make($request->password),
        ]);
        return back()->with('status', 'Đổi mật khẩu thành công');
    }

    public function resetPass(UserRequest $request,$id){
        $request->validated();
        $user= User::find($id);
        $user->update([
            'password' => Hash::make($request->resetPass),
        ]);
        return back()->with("status","Đặt lại mật khẩu thành công");
    }
    public function search(Request $request){
        $value= $request->keys();
        $x=$value[0];
        if( $x=="id"){
            $searchUsers = DB::table("users")->where($x,"=",$request->$x) ->get() ;
        }else{
            $searchUsers = DB::table("users")->where($x,"like","%".$request->$x."%") ->get() ;
        }
        return back() ->with("searchUsers",$searchUsers);
    }
    public function destroy($id){
        $user= User::find($id);
        if(isset(User::find($id)->images)) {
            $img = new ImageController();
            $img->destroy($id);
        }

        $user->delete();

        return back();
    }
}
