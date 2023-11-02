<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Image extends Model
{
    use HasFactory;
    public function getCreatedAtAttribute($value)
    {
        return \Illuminate\Support\Carbon::parse($value)->format('d/m/Y');
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
    protected $fillable = [
        'url',
        "user_id",
        "sanPham_id",
    ];
    public function users(){
        return $this->belongsTo(User::class,"user_id");
    }
    public function sanPhams(){
        return $this->belongsTo(sanPham::class,"sanPham_id");
    }
}
