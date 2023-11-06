<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhGia extends Model
{
    use HasFactory;
    protected $fillable=[
        'soSao',
        "danhGia",
        "user_id",
        "sanPham_id",
    ];
}
