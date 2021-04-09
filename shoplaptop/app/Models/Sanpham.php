<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $fillable = ['tensp','soluong', 'anh'];
}

// php artisan make:model Sanpham

// php artisan make:controller IndexController
