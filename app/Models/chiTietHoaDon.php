<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chiTietHoaDon extends Model
{
    use HasFactory;
    protected $fillable=[
        "soLuong",
        "tenSanPham",
        "tienHang",
        "hoaDon_id",
    ];
}
