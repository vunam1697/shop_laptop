<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\LoaiSp;

class HomeController extends Controller
{
    public function __construct() {
        $category = LoaiSp::all();
        view()->share(compact('category'));
    }

    // Trang chủ
    public function getHome() {
        // Lấy tất cả sản phẩm
        $data = Sanpham::all();
        return view('web.pages.home',compact('data'));
    }

    // Trang sản phẩm
    public function getProduct() {
        // Lấy tất cả sản phẩm
        $data = Sanpham::all();
        return view('web.pages.sanpham', compact('data'));
    }

    // Trang chi tiết sản phẩm
    public function getProductDetail($slug) {
        // kiểm tra sản phẩm có cùng slug
        $data = Sanpham::where('slug', $slug)->first();
        return view('web.pages.chi-tiet-sanpham', compact('data'));
    }

    // Thêm giỏ hàng
    public function postAddCart(Request $request) {
        $idSp   = $request->id_sanpham;
        // Kiểm tra sản phẩm có tồn tại không 
        $sanpham = Sanpham::findOrFail($idSp);

        session_start();

        if (!empty($_SESSION["cart"])) {
            // kiểm tra lần thứ 2 mua hàng đã có ID phần tử mảng chưa
            if (array_key_exists($idSp, $_SESSION["cart"])) {
                $_SESSION["cart"][$idSp] = array(
                    "sl" => (int)$_SESSION["cart"][$idSp]["sl"] + 1,
                    "giaban" => $sanpham->giaban,
                    "soluong" => $sanpham->soluong,
                    "tensp" => $sanpham->tensp,
                    "hinhanh" => $sanpham->hinhanh,
                );
            } else {
                // lần đầu tiên mua hàng
                $_SESSION["cart"][$idSp] = array(
                    "sl" => 1,
                    "giaban" => $sanpham->giaban,
                    "soluong" => $sanpham->soluong,
                    "tensp" => $sanpham->tensp,
                    "hinhanh" => $sanpham->hinhanh,
                );
            }
        } else {
            $_SESSION["cart"][$idSp] = array(
                "sl" => 1,
                "giaban" => $sanpham->giaban,
                "soluong" => $sanpham->soluong,
                "tensp" => $sanpham->tensp,
                "hinhanh" => $sanpham->hinhanh,
            );
        }

        return back()->with([
            'level' => 'success',
            'message' => 'Thêm vào giỏ hàng thành công.'
        ]);;
    }

    //thông tin giỏ hàng
    public function getCart() {
        
        return view('web.pages.gio-hang');
    }
}
