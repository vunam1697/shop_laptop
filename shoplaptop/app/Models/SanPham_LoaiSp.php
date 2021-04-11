<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham_LoaiSp extends Model
{
    use HasFactory;

    protected $table = 'sanpham_loaisp';
    protected $fillable = [
        'id_loaisp', 'id_sanpham'
    ];
}
