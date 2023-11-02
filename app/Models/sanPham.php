<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class sanPham extends Model
{
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
    use HasFactory;

    protected $fillable=[
        "ten",
        "nhaSX",
        "namSX",
        "tonKho",
        "moTa",
        "baoHanh",
        "giaNhap",
        "giaBan",
        "danhMuc_id"
    ];
    public function images(){
        $this->hasOne(Image::class,"sanPham_id","id");
    }
}
