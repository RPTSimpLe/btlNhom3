<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class thongKeChi extends Model
{
    use HasFactory;
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m/Y');
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m/Y');
    }
    protected $fillable=[
      "tenSanPham",
      "soLuongNhap",
      "giaNhap",
        "tongTienNhapHang",
        "thongKeTong_id",
    ];
}
