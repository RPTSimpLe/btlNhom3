<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongKeNgay extends Model
{
    use HasFactory;
    protected $fillable=[
        "tenSP",
	    "soLuong",
		"tienBan",
		"doanhThu"
    ];
}
