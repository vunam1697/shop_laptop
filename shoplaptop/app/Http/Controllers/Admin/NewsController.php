<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use App\Models\TinTuc;
use Exception;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    // trang danh sách tin tức
    public function index(Request $request)
    {
        $data = TinTuc::orderBy('created_at', 'DESC')->get(); //Lấy tất cả tin tức từ db
        return view('admin.news.list', compact('data'));
    }

    //Trang thêm và sửa sản phẩm
    public function saveNews(Request $request)
    {
        $tintuc = new TinTuc();
        return view('admin.news.save', compact('tintuc'));
    }

    //Thêm và sửa sản phẩm
    public function save(Request $request)
    {
        $success = false; //Khởi tạo biến check bằng false
        $message = ""; //Khởi tạo biến message bằng rỗng
        $arrayExtension = ["jpg", "png"]; //khởi tạo định dạng ảnh nhận
        $tintucNew = [];
        //gán dữ liệu thêm vào bảng sản phẩm
        $tintucNew = [
            'tentt' => $request->txtTenTT,
            'mota'  => $request->txtMota,
            'noidung'  => $request->txtNoiDung,
            'slug' => Str::slug($request->txtTenTT, '-'),
        ];
        $tintuc = new TinTuc($tintucNew); //Khởi tạo sản phẩm
        try {
            //Kiểm tra tồn tại hình ảnh không.Nếu tồn tại lưu file vào folder public và lấy tên hình ảnh
            if ($request->hasFile('txtHinhAnh')) {
                $attachment = request()->file('txtHinhAnh');

                /** Laravel file helper methods */
                $attachmentExtension    = $attachment->getClientOriginalExtension();
                if (!in_array($attachmentExtension, $arrayExtension)) {
                    $message = "File hình ảnh không đúng định dạng cho phép";
                    return view('admin.news.save', compact('tintuc', 'message', 'data'));
                }
                $attachmentMimeType     = $attachment->getClientMimeType();
                $attachmentName         = $attachment->getClientOriginalName();

                /** New attachment name, v - milliseconds */
                $attachmentNewName = date('YmdHisv') . '_' . $attachmentName;
                $tintucNew['hinhanh'] = $attachmentNewName;

                /** Instead of storage I will demo you storing in PUBLIC path same as that of assets folder */
                $uploadPath = public_path() . '/image/news';
                $attachment->move($uploadPath, $attachmentNewName);
            }
            
            //lưu sản phẩm
            if (!empty($request->txtId)) {
                // Cập nhật tin tức
                TinTuc::where('id', $request->txtId)->update($tintucNew);
                $message = "Cập nhật thành công";
            } else {
                 // thêm sản phẩm
                TinTuc::create($tintucNew);
                $message = "Thêm thành công";
            }

            $success = true;
            $data = TinTuc::orderBy('created_at', 'DESC')->get(); //Lấy tất cả tin tức từ db
            return view('admin.news.list', compact('data', 'success', 'message'));
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        return view('admin.news.save', compact('tintuc', 'success', 'message', 'data'));
    }

    //Lấy sản phẩm và return về trang saveProduct
    public function eidtNews($id)
    {
        $tintuc = TinTuc::where('id', $id)->first(); //Lấy bản ghi cần tìm kiếm
        return view('admin.news.save', compact('tintuc'));
    }

    //Xóa sản phẩm
    public function delete(Request $request)
    {
        $success = false; //Khởi tạo biến check bằng false
        $message = ""; //Khởi tạo biến message bằng rỗng
        try {
            TinTuc::where('id', $request->id)->delete(); //xóa sản phẩm
            $data = TinTuc::orderBy('created_at', 'DESC')->get(); //Lấy tất cả sản phẩm từ db
            $success = true;
            $message = "Xóa sản phẩm thành công";
        } catch (Exception $ex) {
            $success = true;
            $message = $ex->getMessage();
        }
        return view('admin.news.list', compact('data', 'success', 'message'));
    }
}
