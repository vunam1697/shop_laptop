<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;

    protected $table = 'chitietdonhang';
    protected $fillable = ['iddonhang', 'soluong', 'giaban', 'tongtien','idsanpham'];

    public function SanPham()
    {
        return $this->belongsTo('App\Models\Sanpham', 'idsanpham', 'id');
    }

    public function DonHang()
    {
        return $this->belongsTo('App\Models\DonHang', 'iddonhang', 'id');
    }
}
