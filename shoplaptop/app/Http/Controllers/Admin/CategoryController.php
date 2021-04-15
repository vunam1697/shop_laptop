<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use App\Models\User;
use App\Models\LoaiSp;
use Exception;
use Illuminate\Support\Str;
class CategoryController extends Controller
{

    //trang danh sách người dùng
    public function index(Request $request) {
        $datas = LoaiSp::orderBy('created_at', 'DESC')->get(); //Lấy tất cả loại sản phẩm từ db
        return view('admin.category.list',compact('datas'));
    }

    //Trang thêm và sửa loại sản phẩm
    public function saveCategory(Request $request)
    {
        $category = new LoaiSp();
        return view('admin.category.save', compact('category'));
    }

    //Thêm và sửa người dùng
    public function save(Request $request)
    {
        $success = false; //Khởi tạo biến check bằng false
        $message = ""; //Khởi tạo biến message bằng rỗng
        //khởi tạo mảng lưu dữ liệu được đẩy từ giao diện lên
        //gán dữ liệu thêm vào mảng loại sản phẩm
        $categoryNew = [
            'tenloaisp' => $request->tenloaisp,
            'slug'  => Str::slug($request->tenloaisp, '-'),
            'mota'  => $request->mota,             
        ];

        $user=new LoaiSp($categoryNew);
        try {

            //lưu loại sản phẩm
            if (!empty($request->id)) {
                LoaiSp::where('id', $request->id)->update($categoryNew);
                $message = "Cập nhật thành công";
            } 
            else {
                LoaiSp::create($categoryNew);
                $message = "Thêm thành công";
            }

            $success = true;            
            $datas = LoaiSp::orderBy('created_at', 'DESC')->get(); //Lấy tất cả user từ db
            return view('admin.category.list', compact('datas', 'success', 'message'));
        } 
        catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        return view('admin.user.save', compact('user', 'success', 'message'));
    }

    //Lấy người dùng và return về trang saveUser
    public function editCategory($id)
    {
        $category = LoaiSp::where('id', $id)->first(); //Lấy bản ghi cần tìm kiếm
        return view('admin.category.save', compact('category'));
    }

    //Xóa người dùng
    public function delete(Request $request)
    {
        $success = false; //Khởi tạo biến check bằng false
        $message = ""; //Khởi tạo biến message bằng rỗng
        try {
            LoaiSp::where('id', $request->id)->delete(); //Xóa người dùng
            $datas = LoaiSp::orderBy('created_at', 'DESC')->get(); //Lấy tất cả sản phẩm từ db
            $success = true;
            $message = "Xóa loại sản phẩm thành công";
        } catch (Exception $ex) {
            $success = false;
            $message = $ex->getMessage();
        }
        return view('admin.category.list', compact('datas', 'success', 'message'));
    }
}
