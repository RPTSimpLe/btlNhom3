<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoaDon extends Model
{
    use HasFactory;
    protected $fillable=[
        "diaChi",
        "ghiChu",
        "tongTien",
        "ship",
        "user_id",
        "giamGia",
        "danhGia",
        "TrangThai",
        "hinhThucThanhToan"
    ];
    public function users(){
        $this->belongsTo(User::class);
    }
}
