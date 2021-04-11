<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use App\Models\Sanpham;

class ProductController extends Controller
{
    //khởi tạo các sản phẩm được share
    // public function __construct() {
    //     $site_info = '1111';
    //     view()->share(compact('site_info'));
    // }

    //trang danh sách sản phẩm
    public function index(Request $request) {
        $datas=Sanpham::orderBy('created_at', 'DESC')->get();//Lấy tất cả sản phẩm từ db
        return view('admin.product.list',compact('datas'));
    }

}
