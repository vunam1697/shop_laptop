<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use App\Models\User;
use Exception;

class UserController extends Controller
{

    //trang danh sách người dùng
    public function index(Request $request) {
        $datas = User::orderBy('created_at', 'DESC')->get(); //Lấy tất cả người dùng từ db
        return view('admin.user.list',compact('datas'));
    }

    //Trang thêm và sửa người dùng
    public function saveUser(Request $request)
    {
        $user = new User();
        return view('admin.user.save', compact('user'));
    }

    //Thêm và sửa người dùng
    public function save(Request $request)
    {
        $success = false; //Khởi tạo biến check bằng false
        $message = ""; //Khởi tạo biến message bằng rỗng
        $arrayExtension = ["jpg", "png"]; //khởi tạo định dạng ảnh nhận
        //khởi tạo mảng lưu dữ liệu được đẩy từ giao diện lên
        //gán dữ liệu thêm vào mảng user
        $userNew = [
            'full_name' => $request->full_name,
            'email'  => $request->email,
            'name'  => $request->name,
            'password'  => $request->password,
            'isAdmin'  => $request->isAdmin,               
        ];

        $user=new User($userNew);
        try {
           
            //Nếu là thêm mới
            if(empty($request->id)){
                //check xem user name tồn tại chưa
                $userFillter=User::where('name',$request->name)->first();
                if(!empty($userFillter)){
                    $message="Tên tài khoản đã tồn tại.";
                    return view('admin.user.save', compact('user', 'success', 'message'));
                }

                //check xem email tồn tại chưa
                $userFillter=User::where('email',$request->email)->first();
                if(!empty($userFillter)){
                    $message="Email đã tồn tại.";
                    return view('admin.user.save', compact('user', 'success', 'message'));
                }
            }    
            //Nếu là cập nhật
            else{
                 
                $user=User::where('id',$request->id)->first();
                 //check xem user name tồn tại chưa
                 $userFillter=User::where('name',$request->name)->where('id', '!=', $request->id)->first();
                 if(!empty($userFillter)){
                     $message="Tên tài khoản đã tồn tại.";
                     return view('admin.user.save', compact('user', 'success', 'message'));
                 }
 
                 //check xem email tồn tại chưa
                 $userFillter=User::where('email',$request->email)->where('id', '!=', $request->id)->first();
                 if(!empty($userFillter)){
                     $message="Email đã tồn tại.";
                     return view('admin.user.save', compact('user', 'success', 'message'));
                 }
            }     

            //Kiểm tra tồn tại hình ảnh không.Nếu tồn tại lưu file vào folder public và ;ấy tên hình ảnh
            if ($request->hasFile('avatar')) {
                $attachment = request()->file('avatar');

                /** Laravel file helper methods */
                $attachmentExtension    = $attachment->getClientOriginalExtension();
                if (!in_array($attachmentExtension, $arrayExtension)) {
                    $message = "File hình ảnh không đúng định dạng cho phép";
                    return view('admin.user.save', compact('user', 'success', 'message'));
                }
                $attachmentMimeType     = $attachment->getClientMimeType();
                $attachmentName         = $attachment->getClientOriginalName();
                $attachmentSize         = $attachment->getSize();

                /** New attachment name, v - milliseconds */
                $attachmentNewName = date('YmdHisv') .'-'. $attachmentName;
                $userNew['avatar'] = $attachmentNewName;

                /** Instead of storage I will demo you storing in PUBLIC path same as that of assets folder */
                $uploadPath = public_path() . '/image';
                $attachment->move($uploadPath, $attachmentNewName);
            }

            //lưu người dùng
            if (!empty($request->id)) {
                User::where('id', $request->id)->update($userNew);
                $message = "Cập nhật thành công";
            } 
            else {
                User::create($userNew);
                $message = "Thêm thành công";
            }

            $success = true;            
            $datas = User::orderBy('created_at', 'DESC')->get(); //Lấy tất cả user từ db
            return view('admin.user.list', compact('datas', 'success', 'message'));
        } 
        catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        return view('admin.user.save', compact('user', 'success', 'message'));
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
            $success = false;
            $message = $ex->getMessage();
        }
        return view('admin.user.list', compact('datas', 'success', 'message'));
    }
}
