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
        $sanpham=new Sanpham ();
        return view('admin.product.save', compact('loaiSPs','sanpham'));
    }

    //Thêm và sửa sản phẩm
    public function save(Request $request)
    {
        $loaiSPs = LoaiSp::all();
        $sanpham = new SanPham();
        $success = false;
        $message = "";
        $arrayExtension = ["jpg", "png"];
        $sanphamNew = [];
        try {
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

            //Kiểm tra tồn tại hình ảnh không.Nếu tồn tại lưu file vào folder public và ;ấy tên hình ảnh
            if ($request->hasFile('txtHinhAnh')) {
                $attachment = request()->file('txtHinhAnh');

                /** Laravel file helper methods */
                $attachmentExtension    = $attachment->getClientOriginalExtension();
                if (!in_array($attachmentExtension, $arrayExtension)) {
                    $message = "File hình ảnh không đúng định dạng cho phép";
                    return view('admin.product.save', compact('loaiSPs', 'sanpham', 'success', 'message'));
                }
                $attachmentMimeType     = $attachment->getClientMimeType();
                $attachmentName         = $attachment->getClientOriginalName();
                $attachmentSize         = $attachment->getSize();

                /** New attachment name, v - milliseconds */
                $attachmentNewName = 'attachment-' . date('YmdHisv') . '-' . $attachmentExtension;
                $sanphamNew['hinhanh']=$attachmentNewName;

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
                        return view('admin.product.save', compact('loaiSPs', 'sanpham', 'success', 'message'));
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
                $sanphamNew['thuvienanh']=json_encode($listImg);

            }
            //lưu sản phẩm
            if(!empty($request->txtId)){
                $sanpham->id=$request->txtId;
                Sanpham::where('id', $request->txtId)->update($sanphamNew);
            }
            else{
                $sanpham->save();
            }

            //mappe sản phẩm với loại sản phẩm
            $sanPhamLoaiSP = new SanPham_LoaiSp();
            $data = [
                'id_loaisp' => $request->txtLoaiSP,
                'id_sanpham'  => $sanpham->id,
            ];
            SanPham_LoaiSp::create($data);
            $success = true;
            $message = "Thêm thành công";
            $datas = Sanpham::orderBy('created_at', 'DESC')->get(); //Lấy tất cả sản phẩm từ db
            return view('admin.product.list', compact('datas', 'success', 'message'));
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        return view('admin.product.save', compact('loaiSPs', 'sanpham', 'success', 'message'));
    }

     //Lấy sản phẩm và return về trang saveProduct
     public function eidtProduct($id)
     {
         $loaiSPs = LoaiSp::all();//Lấy full danh mục loại sản phẩm
         $sanpham = Sanpham::where('id',$id)->first();//Lấy bản ghi cần tìm kiếm
         return view('admin.product.save', compact('loaiSPs', 'sanpham'));
     }
}
