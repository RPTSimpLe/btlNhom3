<?php

namespace App\Http\Controllers;

use App\Models\ThongKeNgay;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeNgayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::now()->copy()->subDays(6);
        $ngays = [];
        $thongKeNgay=[];
        for ($i = 0; $i < 7; $i++) {
            $ngay= $today->copy()->addDays($i)->format('Y-m-d');
            if (DB::table("thong_ke_ngays")->whereDate("updated_at", '=',$ngay)->get()==null){
                $day=[
                  "soLuong" =>0,
                  "doanhThu" =>0,
                  "tienBan" =>0,
                ];
            }else{
                $tks = DB::table("thong_ke_ngays")->whereDate("updated_at", '=', $ngay)->get();
                $soLuong=0;
                $doanhThu=0;
                $tienBan=0;
                foreach ($tks as $tk) {
                    $soLuong+=intval($tk->soLuong);
                    $doanhThu+=intval($tk->doanhThu);
                    $tienBan+=intval($tk->tienBan);
                }
                $day=[
                    "soLuong" =>$soLuong,
                    "doanhThu" =>$doanhThu,
                    "tienBan" =>$tienBan,
                ];
            }
            $ngays[]=$ngay;
            $thongKeNgay[] =$day;
        }

        return view("admin.thongKe.thongKeTheoNgay",compact("thongKeNgay","ngays"));
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
    public function store($tenSP,$soLuong,$tienThu)
    {
        $tienNhap= DB::table("thong_ke_chis")->where("tenSanPham","=",$tenSP)->first();
        $doanhThu = intval($tienThu)-(intval($tienNhap->giaNhap)*intval($soLuong));

        if (DB::table("thong_ke_ngays")->where("tenSP","=","Laptop HP TUF Gaming F15 FX506L")->latest()->first()!=null){
            $thoiGianHienTai = (new \DateTime())->format("d/m/Y");
            $kiemTra = DB::table("thong_ke_ngays")->where("tenSP","=","Laptop HP TUF Gaming F15 FX506L")->latest()->first();
            $ngayCapNhat = \DateTime::createFromFormat('Y-m-d H:i:s', $kiemTra->updated_at)->format('d/m/Y');
            if ($ngayCapNhat==$thoiGianHienTai){
                $soLuong =intval($kiemTra->soLuong)+$soLuong;
                $doanhThu= intval($kiemTra->doanhThu)+$doanhThu;
                $tienThu= intval($kiemTra->tienBan)+$tienThu;

                $kiemTra=ThongKeNgay::find($kiemTra->id);
                $kiemTra->update([
                   "soLuong" => $soLuong,
                    "tienBan" => $tienThu,
                    "doanhThu" => $doanhThu
                ]);
            }else{
                $thongKeNgay= ThongKeNgay::create([
                    "tenSP" => $tenSP,
                    "soLuong"=> $soLuong,
                    "tienBan" => $tienThu,
                    "doanhThu" => $doanhThu
                ]);
            }
        }else{
            $thongKeNgay= ThongKeNgay::create([
                "tenSP" => $tenSP,
                "soLuong"=> $soLuong,
                "tienBan" => $tienThu,
                "doanhThu" => $doanhThu
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(ThongKeNgay $thongKeNgay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ThongKeNgay $thongKeNgay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ThongKeNgay $thongKeNgay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ThongKeNgay $thongKeNgay)
    {
        //
    }
}
