<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\LoaiSp;
use App\Models\SanPham_LoaiSp;
use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use App\Models\TinTuc;
use App\Http\Requests\CheckCustomRequest;

class HomeController extends Controller
{
    public function __construct() {
        // Lấy dữ liệu loại sản phẩm
        // sử dụng tất cả các trang
        $categories = LoaiSp::all();
        view()->share(compact('categories'));
    }

    // Trang chủ
    public function getHome() {
        // Lấy tất cả sản phẩm
        $data = Sanpham::all();
        $tintuc = TinTuc::orderBy('created_at', 'DESC')->take(4)->get();
        return view('web.pages.home',compact('data', 'tintuc'));
    }

    // Hàm tìm kiếm
    public function getSearch(Request $request) {
        $q = $request->q;
        $data = Sanpham::where(function ($query) use ($request) {
            return $query->where('tensp', 'like', '%' . $request->q . '%');
        })->orderBy('created_at', 'DESC')->paginate(6);
        return view('web.pages.sanpham', compact('data', 'q'));
    }

    // Trang sản phẩm
    public function getProduct() {
        // Lấy tất cả sản phẩm
        $data = Sanpham::paginate(6);
        return view('web.pages.sanpham', compact('data'));
    }

    // Trang chi tiết sản phẩm
    public function getProductDetail($slug) {
        // kiểm tra sản phẩm có cùng slug
        $data = Sanpham::where('slug', $slug)->first();
        $list_category = $data->Loaisp->pluck('id')->toArray();
        $list_sp_related = SanPham_LoaiSp::whereIn('id_loaisp', $list_category)->get()->pluck('id_sanpham')->toArray();
        $product_same_category = Sanpham::where('id', '!=', $data->id)->whereIn('id', $list_sp_related)->orderBy('created_at', 'DESC')->get();
        return view('web.pages.chi-tiet-sanpham', compact('data', 'product_same_category'));
    }

    public function getProductCategory($slug) {
        $category = LoaiSp::where('slug', $slug)->first();
        if (!empty($category)) {
            $list_id = [];
            $list_id[] = $category->id;
            $list_id_product = SanPham_LoaiSp::whereIn('id_loaisp', $list_id)->get()->pluck('id_sanpham')->toArray();
            $data = Sanpham::whereIn('id', $list_id_product)->orderBy('created_at', 'DESC')->paginate(6);

            return view('web.pages.sanpham', compact('slug', 'data', 'category'));
        } 
    }

    public function getNews() {
        $data = TinTuc::paginate(9);
        return view('web.pages.tin-tuc', compact('data'));
    }

    public function getNewsDetail($slug) {
        $data = TinTuc::where('slug', $slug)->first();
        return view('web.pages.chi-tiet-tin-tuc', compact('data'));
    }

    // Thêm giỏ hàng
    public function postAddCart(Request $request) {
        session_start();
        $idSp   = $request->id_sanpham;
        // Lấy dữ liệu sản phẩm đã chọn
        $sanpham = Sanpham::findOrFail($idSp);
        // Kiểm tra số lượng sản phẩm còn không
        if ($sanpham->soluong > 0) {
            if (!empty($_SESSION["cart"])) {
                // kiểm tra lần thứ 2 mua hàng đã có ID phần tử mảng chưa
                if (array_key_exists($idSp, $_SESSION["cart"])) {
                    $_SESSION["cart"][$idSp] = array(
                        "sl" => (int)$_SESSION["cart"][$idSp]["sl"] + 1,
                        "giaban" => $sanpham->giaban,
                        "soluong" => $sanpham->soluong,
                        "tensp" => $sanpham->tensp,
                        "hinhanh" => $sanpham->hinhanh,
                        "slug" => $sanpham->slug,
                    );
                } else {
                    // lần đầu tiên mua hàng
                    $_SESSION["cart"][$idSp] = array(
                        "sl" => 1,
                        "giaban" => $sanpham->giaban,
                        "soluong" => $sanpham->soluong,
                        "tensp" => $sanpham->tensp,
                        "hinhanh" => $sanpham->hinhanh,
                        "slug" => $sanpham->slug,
                    );
                }
            } else {
                $_SESSION["cart"][$idSp] = array(
                    "sl" => 1,
                    "giaban" => $sanpham->giaban,
                    "soluong" => $sanpham->soluong,
                    "tensp" => $sanpham->tensp,
                    "hinhanh" => $sanpham->hinhanh,
                    "slug" => $sanpham->slug,
                );
            }
    
            return back()->with([
                'level' => 'success',
                'message' => 'Thêm vào giỏ hàng thành công.'
            ]);
        }
        return back()->with([
            'level' => 'warning',
            'message' => 'Sản phẩm đã hết hàng.'
        ]);
        
    }

    // danh sách sản phẩm trong giỏ hàng
    public function getCart() {
        
        return view('web.pages.gio-hang');
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function updateCart(Request $request) {
        session_start();
        $result = [];
        $id = $request->id;
        $sl = $request->sl;
        $action = $request->action;
        $sanpham = Sanpham::where('id', $id)->first();
        if (!empty($id) && !empty($sl)) {
            // Kiểm tra số lượng nhập so với số lượng sản phẩm trong DB
            if ($sl > $sanpham->soluong) {
                $result['error'] = "Sản phẩm không đủ số lượng yêu cầu";
                return $result;
            } else if ($sl > 0) {
                $_SESSION["cart"][$id] = array(
                    "sl" => $sl,
                    "giaban" => $sanpham->giaban,
                    "soluong" => $sanpham->soluong - $sl,
                    "tensp" => $sanpham->tensp,
                    "hinhanh" => $sanpham->hinhanh,
                    "slug" => $sanpham->slug,
                );

                $result['success'] = "Cập nhật số lượng thành công";
                return $result;
            } 
            $result['error'] = "Số lượng phải lớn hơn 0";
            return $result;
        } else if (!empty($id) && !empty($action)) {
            unset($_SESSION["cart"][$id]);
            $result['success'] = "Xóa sản phẩm thành công";
            return $result;
        }
        
        
    }

    // Xử lý đặt hàng
    public function postCheckOut(CheckCustomRequest $request) {
        session_start();
        // Dữ liệu lấy từ form 
        $data = [
            'tenkh' => $request->hovaten,
            'sdt' => $request->sodienthoai,
            'email' => $request->email,
            'diachi' => $request->diachi,
            'tongtien' => $request->tongtien,
            'tongsoluong' => $request->tongsoluong,
            'status' => 1,
        ];
        // Lưu dữ liệu vào bảng đơn hàng
        $donhang = DonHang::create($data);
        if (!empty($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $key => $item) {
                // Lưu dữ liệu vào bảng chi tiết đơn hàng
                $chitietdonghang = new ChiTietDonHang();
                $chitietdonghang->iddonhang = $donhang->id;
                $chitietdonghang->idsanpham = $key;
                $chitietdonghang->soluong = $item['sl'];
                $chitietdonghang->giaban = $item['giaban'];
                $chitietdonghang->tongtien = $item['sl'] * $item['giaban'];
                $chitietdonghang->save();

                // cập nhật lại số lượng sản phẩm khi đã đặt sản phẩm đó
                Sanpham::where('id', $key)->update([
                    'soluong' => $item['soluong'],
                ]);
            }
            
        }
        // Đặt hàng xong sẽ xóa sản phẩm trong giỏ hàng
        unset($_SESSION["cart"]);

        return redirect()->back()->with([
            'level' => 'success',
            'message' => 'Đặt hàng sản phẩm thành công.'
        ]);
    }
}
