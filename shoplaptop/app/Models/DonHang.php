<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'donhang';
    protected $fillable = ['tenkh', 'email', 'sdt', 'diachi','tongsoluong','tongtien','status'];

    public function TrangThai()
    {
        return $this->belongsTo('App\Models\TrangThaiDonHang', 'status', 'id');
    }
}
