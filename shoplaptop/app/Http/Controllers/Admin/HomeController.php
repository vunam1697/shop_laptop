<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use App\Models\User;
use App\Models\Sanpham;
use App\Models\TinTuc;
use App\Models\DonHang;
class HomeController extends Controller
{

    //trang index đăng nhập
    public function index(Request $request) {
        $sanpham = Sanpham::all();
        $tintuc = TinTuc::all();
        $donhang = DonHang::all();
        $user = User::where('isAdmin', NULL)->get();
        return view('admin.home.index', compact('sanpham', 'tintuc', 'donhang', 'user'));
    }
    

}
