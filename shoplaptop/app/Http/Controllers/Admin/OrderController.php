<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use App\Models\User;
use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use App\Models\Sanpham;
use App\Models\TrangThaiDonHang;
use Exception;
use PHPUnit\Framework\Constraint\Count;

class OrderController extends Controller
{

    //trang danh sách người dùng
    public function index(Request $request)
    {
        $datas = DonHang::orderBy('created_at', 'DESC')->get(); //Lấy tất cả đơn hàng từ db
        $request->session()->forget('cart');
        $request->session()->forget('customer');
        return view('admin.order.list', compact('datas'));
    }

    //Trang thêm và sửa người dùng
    public function saveOrder(Request $request)
    {
        $order = new DonHang();
        $sanpham = Sanpham::where('soluong', '>', 0)->get();
        $trangthaidonhang = TrangThaiDonHang::all();
        return view('admin.order.save', compact('order', 'sanpham','trangthaidonhang'));
    }

    //Thêm và sửa người dùng
    public function save(Request $request)
    {
        $success = false; //Khởi tạo biến check bằng false
        $message = ""; //Khởi tạo biến message bằng rỗng
        //khởi tạo mảng lưu dữ liệu được đẩy từ giao diện lên
        //gán dữ liệu thêm vào mảng đơn hàng       

        $orderNew = [];
        $order = new DonHang($orderNew);
        $tongsoluong = 0;
        $tongtien = 0;
        $trangthaidonhang = TrangThaiDonHang::all();

        try {
            $sanpham = Sanpham::where('soluong', '>', 0)->get();
            $customer = $request->session()->get('customer'); //Lấy dữ liệu từ giỏ hàng
            $cart = $request->session()->get('cart'); //Lấy dữ liệu khách hàng
            if (empty($customer) && $request->id == 0) {
                $message = "Thông tin khách hàng không tồn tại.Vui lòng quay lại bước nhập thông tin khách hàng.";
            } else if ((empty($cart) || Count($cart) == 0) && $request->id == 0) {
                $message = "Bạn chưa chọn sản phẩm nào.";
            } else {
                if ($request->id == 0) {
                    $orderNew = $customer;
                    foreach ($cart as $item) {
                        $tongsoluong += $item->soluong;
                        $tongtien += $item->giaban;
                    }
                    $orderNew["tongsoluong"] = $tongsoluong;
                    $orderNew["tongtien"] = $tongtien;
                    $orderNew["status"] = "1";
                    $save = DonHang::create($orderNew); //insert bản ghi vào bảng đơn hàng
                    foreach ($cart as $item) {
                        $ctdh = [
                            "iddonhang" => $save->id,
                            "soluong" => $item->soluong,
                            "giaban" => $item->giaban,
                            "tongtien" => $item->soluong * $item->giaban,
                            "idsanpham" => $item->id,
                        ];
                        ChiTietDonHang::create($ctdh); //insert bản ghi vào bảng chi tiết đơn hàng
                    }
                    $success = true;
                    $message = "Thêm đơn hàng thành công";
                    $request->session()->forget('cart');
                    $request->session()->forget('customer');
                } else {
                    if (empty($cart) || Count($cart) == 0) {
                        $order = DonHang::where('id', $request->id)->first();
                        if ($order->status == 1) {
                            //Xóa bảng chi tiết đơn hàng
                            ChiTietDonHang::where('iddonhang', $request->id)->delete();
                            //Xóa đơn hàng
                            DonHang::where('id', $request->id)->delete();
                            $datas = DonHang::orderBy('created_at', 'DESC')->get(); //Lấy tất cả đơn hàng từ db
                            $success = true;
                            $message = "Xóa đơn hàng thành công";
                        } else {
                            $success = false;
                            $message = "Đơn hàng có trạng thái " . $order->TrangThai()->first()->tentrangthai . "không thể xóa";
                        }
                    } else {
                        $orderNew["tenkh"] = $request->tenkh;
                        $orderNew["email"] = $request->email;
                        $orderNew["sdt"] = $request->sdt;
                        $orderNew["diachi"] = $request->diachi;
                        $orderNew["status"] = $request->status;
                        //Xóa bảng chi tiết đơn hàng
                        ChiTietDonHang::where('iddonhang', $request->id)->delete();
                        //thêm lại chi tiết đơn hàng
                        foreach ($cart as $item) {
                            $tongsoluong += $item->soluong;
                            $tongtien += $item->giaban;
                            $ctdh = [
                                "iddonhang" => $request->id,
                                "soluong" => $item->soluong,
                                "giaban" => $item->giaban,
                                "tongtien" => $item->soluong * $item->giaban,
                                "idsanpham" => $item->id,
                            ];
                            ChiTietDonHang::create($ctdh); //insert bản ghi vào bảng chi tiết đơn hàng
                            if($request->status==3){
                                $updateSoLuongSP=Sanpham::where('id',$item->id)->first();
                                $dataUpdate=[
                                    "soluong"=>$updateSoLuongSP->soluong - $item->soluong
                                ];
                                Sanpham::where('id', $item->id)->update($dataUpdate);
                            }
                        }
                        $orderNew["tongsoluong"] = $tongsoluong;
                        $orderNew["tongtien"] = $tongtien;
                        DonHang::where('id', $request->id)->update($orderNew);
                        $success = true;
                        $message = "Cập nhật đơn hàng thành công.";
                        $request->session()->forget('cart');
                        $request->session()->forget('customer');
                    }
                }

                $datas = DonHang::orderBy('created_at', 'DESC')->get(); //Lấy tất cả đơn hàng từ db
                return view('admin.order.list', compact('datas', 'success', 'message','trangthaidonhang'));
            }
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        return view('admin.order.save', compact('order', 'success', 'message', 'cart', 'sanpham','trangthaidonhang'));
    }

    //Lấy người dùng và return về trang saveUser
    public function editOrder(Request $request, $id)
    {
        $sanpham = Sanpham::where('soluong', '>', 0)->get();
        $order = DonHang::where('id', $id)->first();
        $trangthaidonhang = TrangThaiDonHang::all();

        $cart = [];
        if (!empty($order)) {
            $ctdh = ChiTietDonHang::where("iddonhang", $id)->get();
            if (!empty($ctdh)) {
                foreach ($ctdh as $item) {
                    $sp = Sanpham::where('id', $item->idsanpham)->first();
                    $sp->giaban = $item->giaban;
                    $sp->soluong = $item->soluong;
                    array_push($cart, $sp);
                }
            }
            $request->session()->put('cart', $cart); //Đẩy giỏ vào session
        }
        return view('admin.order.save', compact('order', 'sanpham', 'cart','trangthaidonhang'));
    }

    //Xóa người dùng
    public function delete(Request $request)
    {
        $success = false; //Khởi tạo biến check bằng false
        $message = ""; //Khởi tạo biến message bằng rỗng
        try {
            $order = DonHang::where('id', $request->id)->first();
            if ($order->status != 1) {
                $message = "Đơn hàng có trạng thái " . $order->TrangThai()->first()->tentrangthai . " không thể xóa";
            } 
            else{
                //Xóa bảng chi tiết đơn hàng
                ChiTietDonHang::where('iddonhang', $request->id)->delete();
                //Xóa đơn hàng
                DonHang::where('id', $request->id)->delete();
                $success = true;
                $message = "Xóa đơn hàng thành công";
            }
           
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        $datas = DonHang::orderBy('created_at', 'DESC')->get(); //Lấy tất cả đơn hàng từ db
        return view('admin.order.list', compact('datas', 'success', 'message'));
    }

    public function addProductToCard(Request $request, $id, $type, $iddonhang)
    {
        $success = false; //Khởi tạo biến check bằng false
        $message = ""; //Khởi tạo biến message bằng rỗng
        $trangthaidonhang = TrangThaiDonHang::all();
        try {

            $sanpham = Sanpham::where('soluong', '>', 0)->get(); //Lấy toàn bộ sản phẩm có số lượng lớn hơn không
            $order = new DonHang(); //Khởi tạo đơn hàng
            $order->id = $iddonhang;
            if (!empty($iddonhang) && $iddonhang != 0) {
                $order = DonHang::where('id', $iddonhang)->first();
            }
            $sanphamFilter = Sanpham::where('id', $id)->first(); //Lấy sản phẩm được đặt
            $cart = []; //Khởi tạo giỏ hàng 
            $value = $request->session()->get('cart'); //Lấy dữ liệu từ giỏ hàng

            if (!empty($value) && Count($value) > 0) { //Nếu giỏ hàng đã tồn tại trong session
                $cart = $value; //Gán dữ liệu từ session vào giỏ hàng
                $check = false; //Biến check xem sản phẩm có trong giỏ chưa
                foreach ($value as $item) {
                    if (!empty($item) && $item->id == $id) {
                        if ($type == 'add') {
                            if ($sanphamFilter->soluong <= $item->soluong) { //Nếu số lượng trong sản phẩm lớn hơn hoặc bằng số lượng trong giỏ thì báo lỗi

                                $message = "Sản phẩm này chỉ còn " . $sanphamFilter->soluong;
                                return view('admin.order.save', compact('success', 'message', 'sanpham', 'order', 'cart','trangthaidonhang'));
                            }

                            $item->soluong += 1; //Cộng số lượng lên 1
                            $check = true;

                            break;
                        } else if ($type == 'minus') {
                            $item->soluong = $item->soluong - 1; //Cộng số lượng lên 1
                            $check = true;
                            break;
                        }
                    }
                }

                if (!$check) { //Nếu sản phẩm chưa có trong giỏ thì thêm vào giỏ
                    if ($type == 'add') {
                        $sanphamFilter->soluong = 1;
                        array_push($cart, $sanphamFilter);
                    }
                }
            } else { //Nếu giỏ hàng chưa tồn tại thì đẩy sản phẩm vào trong giỏ

                if ($type == 'add') {
                    $sanphamFilter->soluong = 1;
                    array_push($cart, $sanphamFilter);
                }
            }

            $cart = collect($cart)->where('soluong', '>', 0)->all();
            $request->session()->put('cart', $cart); //Đẩy giỏ vào session
            $success = true;
            return view('admin.order.save', compact('success', 'message', 'sanpham', 'order', 'cart','trangthaidonhang'));
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        return view('admin.order.save', compact('success', 'message', 'order','trangthaidonhang'));
    }

    public function addSessionCustomer(Request $request)
    {
        //gán dữ liệu đẩy từ giao diện
        $orderNew = [
            'tenkh' => $request->tenkh,
            'email'  => $request->email,
            'sdt'  => $request->sdt,
            'diachi'  => $request->diachi,
        ];

        $order = new DonHang($orderNew);
        $order = new DonHang();
        $trangthaidonhang = TrangThaiDonHang::all();
        $sanpham = Sanpham::all(); //Lấy toàn bộ sản phẩm
        $request->session()->put('customer', $orderNew);
        $order->id = 0;
        return view('admin.order.save', compact('order', 'sanpham','trangthaidonhang'));
    }

    //Xóa sản phẩm khỏi giỏ hàng
    public function deleteProductOnCart(Request $request, $id, $iddonhang)
    {
        $success = false; //Khởi tạo biến check bằng false
        $message = ""; //Khởi tạo biến message bằng rỗng
        try {
            $trangthaidonhang = TrangThaiDonHang::all();
            $sanpham = Sanpham::where('soluong', '>', 0)->get(); //Lấy toàn bộ sản phẩm có số lượng lớn hơn không
            $order = new DonHang(); //Khởi tạo đơn hàng
            $order->id = 0;
            if (!empty($iddonhang) && $iddonhang != 0) {
                $order = DonHang::where('id', $iddonhang)->first();
            }
            $cart = []; //Khởi tạo giỏ hàng 
            $value = $request->session()->get('cart'); //Lấy dữ liệu từ giỏ hàng
            if (!empty($value)) {
                $cart = collect($value)->where('id', '!=', $id)->where('id', '!=', null)->all();
            }
            $request->session()->put('cart', $cart); //Đẩy giỏ vào session
            $success = true;
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        return view('admin.order.save', compact('order', 'sanpham', 'success', 'message', 'cart','trangthaidonhang'));
    }

    //Xem chi tiết đơn hàng
    public function detailOrder($id){
        $sanpham = [];
        $order = DonHang::where('id', $id)->first();
        $trangthaidonhang = TrangThaiDonHang::all();
        $isDetail=true;
        $cart = [];
        if (!empty($order)) {
            $ctdh = ChiTietDonHang::where("iddonhang", $id)->get();
            if (!empty($ctdh)) {
                foreach ($ctdh as $item) {
                    $sp = Sanpham::where('id', $item->idsanpham)->first();
                    $sp->giaban = $item->giaban;
                    $sp->soluong = $item->soluong;
                    array_push($cart, $sp);
                }
            }
        }
        return view('admin.order.save', compact('order', 'sanpham', 'cart','trangthaidonhang','isDetail'));
    }
}
