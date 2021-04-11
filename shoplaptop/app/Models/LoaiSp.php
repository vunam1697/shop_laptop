<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSp extends Model
{
    use HasFactory;

    protected $table = 'loaisp';
    protected $fillable = ['tenloaisp', 'slug', 'mota', 'hienthi'];

    public function SanPhams()
    {
        return $this->belongsToMany('App\Models\Sanpham', 'sanpham_loaisp', 'id_loaisp', 'id_sanpham');
    }
}
