<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use App\Models\Sanpham;
use App\Models\LoaiSp;
use App\Models\SanPham_LoaiSp;
use Exception;

class ProductController extends Controller
{
    //khởi tạo các sản phẩm được share
    // public function __construct() {
    //     $site_info = '1111';
    //     view()->share(compact('site_info'));
    // }

    //trạng danh sách sản phẩm
    public function index(Request $request)
    {
        $datas = Sanpham::orderBy('created_at', 'DESC')->get(); //Lấy tất cả sản phẩm từ db
        return view('admin.product.list', compact('datas'));
    }

    //Trang thêm và sửa sản phẩm
    public function saveProduct(Request $request)
    {
        $loaiSPs = LoaiSp::all();
        $sanpham = new Sanpham();
        return view('admin.product.save', compact('loaiSPs', 'sanpham'));
    }

    //Thêm và sửa sản phẩm
    public function save(Request $request)
    {
        $loaiSPs = LoaiSp::all(); //lấy tất cả danh mục loại sản phẩm
        $success = false; //Khởi tạo biến check bằng false
        $message = ""; //Khởi tạo biến message bằng rỗng
        $arrayExtension = ["jpg", "png"]; //khởi tạo định dạng ảnh nhận
        $sanphamNew = [];
        //khởi tạo loại sản phẩm được đẩy từ giao diện lên
        $data = [
            'id_loaisp' => $request->txtLoaiSP
        ];
        //gán dữ liệu thêm vào bảng sản phẩm
        $sanphamNew = [
            'tensp' => $request->txtTenSP,
            'mota'  => $request->txtMota,
            'giaban'  => $request->txtGiaBan,
            'soluong'  => $request->txtSoLuong,
            'cpu'  => $request->txtCPU,
            'ram'  => $request->txtRAM,
            'ocung'  => $request->txtOCung,
            'carddohoa'  => $request->txtCardDoHoa,
            'manhinh'  => $request->txtManHinh,
            'pin'  => $request->txtPin,
            'trongluong'  => $request->txtTrongLuong,
            'mausac'  => $request->txtMauSac,
            'kichthuoc'  => $request->txtKichThuoc,
            'noidung'  => $request->txtNoiDung,
        ];
        $sanpham = new Sanpham($sanphamNew); //Khởi tạo sản phẩm
        try {
            //Kiểm tra tồn tại hình ảnh không.Nếu tồn tại lưu file vào folder public và ;ấy tên hình ảnh
            if ($request->hasFile('txtHinhAnh')) {
                $attachment = request()->file('txtHinhAnh');

                /** Laravel file helper methods */
                $attachmentExtension    = $attachment->getClientOriginalExtension();
                if (!in_array($attachmentExtension, $arrayExtension)) {
                    $message = "File hình ảnh không đúng định dạng cho phép";
                    return view('admin.product.save', compact('loaiSPs', 'sanpham', 'success', 'message', 'data'));
                }
                $attachmentMimeType     = $attachment->getClientMimeType();
                $attachmentName         = $attachment->getClientOriginalName();
                $attachmentSize         = $attachment->getSize();

                /** New attachment name, v - milliseconds */
                $attachmentNewName = 'attachment-' . date('YmdHisv') . '-' . $attachmentExtension;
                $sanphamNew['hinhanh'] = $attachmentNewName;

                /** Instead of storage I will demo you storing in PUBLIC path same as that of assets folder */
                $uploadPath = public_path() . '/image';
                $attachment->move($uploadPath, $attachmentNewName);
            }

            //Kiểm tra tồn tại hình ảnh không.Nếu tồn tại lưu file vào folder public và ấy tên hình ảnh
            $listImg = [];
            if ($request->hasFile('txtHinhAnh')) {
                $attachments = request()->file('txtThuVienAnh');

                foreach ($attachments as $key => $attachment) {
                    /** Laravel file helper methods */
                    $attachmentExtension    = $attachment->getClientOriginalExtension();
                    if (!in_array($attachmentExtension, $arrayExtension)) {
                        $message = "Thư viện ảnh chứa file không đúng định dạng cho phép.";
                        return view('admin.product.save', compact('loaiSPs', 'sanpham', 'success', 'message', 'data'));
                    }

                    $attachmentMimeType     = $attachment->getClientMimeType();
                    $attachmentName         = $attachment->getClientOriginalName();
                    $attachmentSize         = $attachment->getSize();
                    $listImg[] = $attachmentName;

                    /** New attachment name, v - milliseconds */
                    $attachmentNewName = 'attachment-' . date('YmdHisv') . '-' . $attachmentExtension;


                    /** Instead of storage I will demo you storing in PUBLIC path same as that of assets folder */
                    $uploadPath = public_path() . '/image';
                    $attachment->move($uploadPath, $attachmentNewName);
                }
                $sanphamNew['thuvienanh'] = json_encode($listImg);
            }
            //lưu sản phẩm
            if (!empty($request->txtId)) {
                Sanpham::where('id', $request->txtId)->update($sanphamNew);
                $data["id_sanpham"] = $request->txtId;
                SanPham_LoaiSp::where('id_sanpham', $request->txtId)->update($data);
                $message = "Cập nhật thành công";
            } else {
                $saveSP = Sanpham::create($sanphamNew);
                //mappe sản phẩm với loại sản phẩm
                $sanPhamLoaiSP = new SanPham_LoaiSp();;
                $data["id_sanpham"] = $saveSP->id;
                SanPham_LoaiSp::create($data);
                $message = "Thêm thành công";
            }

            $success = true;
            $datas = Sanpham::orderBy('created_at', 'DESC')->get(); //Lấy tất cả sản phẩm từ db
            return view('admin.product.list', compact('datas', 'success', 'message'));
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        return view('admin.product.save', compact('loaiSPs', 'sanpham', 'success', 'message', 'data'));
    }

    //Lấy sản phẩm và return về trang saveProduct
    public function eidtProduct($id)
    {
        $loaiSPs = LoaiSp::all(); //Lấy full danh mục loại sản phẩm
        $sanpham = Sanpham::where('id', $id)->first(); //Lấy bản ghi cần tìm kiếm
        return view('admin.product.save', compact('loaiSPs', 'sanpham'));
    }

    //Xóa sản phẩm
    public function delete(Request $request)
    {
        $success = false; //Khởi tạo biến check bằng false
        $message = ""; //Khởi tạo biến message bằng rỗng
        try {
            SanPham_LoaiSp::where('id_sanpham', $request->id)->delete(); //Xóa bảng map sản phẩm với loại sản phẩm
            Sanpham::where('id', $request->id)->delete(); //xóa sản phẩm
            $datas = Sanpham::orderBy('created_at', 'DESC')->get(); //Lấy tất cả sản phẩm từ db
            $success = true;
            $message = "Xóa sản phẩm thành công";
        } catch (Exception $ex) {
            $success = true;
            $message = $ex->getMessage();
        }
        return view('admin.product.list', compact('datas', 'success', 'message'));
    }
}
