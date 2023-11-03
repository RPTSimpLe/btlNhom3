<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gioHang extends Model
{
    use HasFactory;

    protected $fillable=[
        "soLuong",
        "sanPham_id",
        "user_id",
        "tongTien"
    ];
}
