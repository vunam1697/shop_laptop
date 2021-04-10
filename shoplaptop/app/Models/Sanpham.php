<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    
    protected $table = 'sanpham';
    protected $fillable = ['tensp', 'mota', 'noidung', 'hinhanh', 'thuvienanh', 'giaban', 'soluong', 'cpu', 'ram',
    'ocung', 'carddohoa', 'manhinh', 'pin', 'trongluong', 'mausac', 'kichthuoc', 'noibat', 'hienthi'];
}

// php artisan make:model Sanpham

// php artisan make:controller IndexController
