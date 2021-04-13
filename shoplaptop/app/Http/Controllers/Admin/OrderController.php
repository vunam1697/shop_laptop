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

class OrderController extends Controller
{

    //trang danh sách người dùng
    public function index(Request $request) {
        $datas = DonHang::orderBy('created_at', 'DESC')->get(); //Lấy tất cả người dùng từ db
        return view('admin.order.list',compact('datas'));
    }

    //Trang thêm và sửa người dùng
    public function saveOrder(Request $request)
    {
        $order = new DonHang();
        $sanpham =Sanpham::all();
        //dd($order);
        return view('admin.order.save', compact('order','sanpham'));
    }

    //Thêm và sửa người dùng
    public function save(Request $request)
    {
        $success = false; //Khởi tạo biến check bằng false
        $message = ""; //Khởi tạo biến message bằng rỗng
        //khởi tạo mảng lưu dữ liệu được đẩy từ giao diện lên
        //gán dữ liệu thêm vào mảng đơn hàng

        $orderNew = [
            'tenkh' => $request->tenkh,
            'email'  => $request->email,
            'sdt'  => $request->sdt,
            'diachi'  => $request->diachi,
        ];

        $order=new DonHang($orderNew);

        try {
            $sanpham =Sanpham::all();
            return view('admin.order.save', compact('order', 'success', 'message','sanpham'));
        } 
        catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        return view('admin.order.save', compact('order', 'success', 'message'));
    }

    //Lấy người dùng và return về trang saveUser
    public function eidtUser($id)
    {
        $user = User::where('id', $id)->first(); //Lấy bản ghi cần tìm kiếm
        return view('admin.user.save', compact('user'));
    }

    //Xóa người dùng
    public function delete(Request $request)
    {
        $success = false; //Khởi tạo biến check bằng false
        $message = ""; //Khởi tạo biến message bằng rỗng
        try {
            User::where('id', $request->id)->delete(); //Xóa người dùng
            $datas = User::orderBy('created_at', 'DESC')->get(); //Lấy tất cả sản phẩm từ db
            $success = true;
            $message = "Xóa người dùng thành công";
        } catch (Exception $ex) {
            $success = true;
            $message = $ex->getMessage();
        }
        return view('admin.user.list', compact('datas', 'success', 'message'));
    }

    public function addProductToCard(Request $request,$id){
        $success = false; //Khởi tạo biến check bằng false
        $message = ""; //Khởi tạo biến message bằng rỗng
        
        try {
            $sanpham =Sanpham::all();
            $order=new DonHang();
            $sanphamFilter =Sanpham::where('id',$id)->first();
            $cart=[];
            $value = $request->session()->get('cart');
            if(!empty($value)){
                $cart=$value;
                array_push($cart, $sanphamFilter);
            }
            else{                
                array_push($cart, $sanphamFilter);
            }
           
            $request->session()->put('cart', $cart);
            $success=true;
            $message="Thêm sản phẩm thành công";
            return view('admin.order.save', compact('success', 'message','sanpham','order','cart'));
        } 
        catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        return view('admin.order.save', compact('success', 'message'));
    }

    public function addSessionCustomer(Request $request){
        //gán dữ liệu đẩy từ giao diện
        $orderNew = [
            'tenkh' => $request->tenkh,
            'email'  => $request->email,
            'sdt'  => $request->sdt,
            'diachi'  => $request->diachi,
        ];

        $order=new DonHang($orderNew);
        $order = new DonHang();
        $sanpham =Sanpham::all();//Lấy toàn bộ sản phẩm
        $request->session()->put('customer', $orderNew);
        return view('admin.order.save', compact('order','sanpham'));
    }
}
