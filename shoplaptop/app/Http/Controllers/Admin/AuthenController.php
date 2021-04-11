<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class AuthenController extends Controller
{

    //trang index đăng nhập
    public function index(Request $request) {
        $value = $request->session()->get('login');
        if(!empty($value)){ //Nếu tồn tại session đăng nhập thì bay sang trang chủ admin
            return view('admin.home.index');
        }
        $userName="";
        return view('admin.login.index',compact('userName'));
    }

    //đăng nhập hệ thống
    public function login(Request $request){      
        $error =false;
        $errorMessage="";
       
        $userName=$request->txtname; //gán lại user name trả về view
        $userFilter = User::where('name',$request->txtname)->where('password',$request->txtpass)->first(); //tìm xem có người dùng trong db chưa
        if(!empty($userFilter)){ //Nếu tồn tại thì gán value vào session
            $request->session()->put('login', $userFilter);
            return view('admin.home.index');
        }

        $errorMessage ="Tài khoản hoặc mật khẩu sai"; //không tìm thấy user thì bay về trang đăng nhập
        return view('admin.login.index',compact('errorMessage','userName'));
    }

    //đăng xuất hệ thống
    public function logout(Request $request){   
        $value = $request->session()->get('login');//tìm xem có thông tin người đăng nhập chưa
        if(!empty($value)){ //Nếu tồn tại session đăng nhập thì xóa session và bay về trang đăng nhập
            $request->session()->forget('login');//xóa session phiên đăng nhập
        }
        $userName="";
        return view('admin.login.index',compact('userName'));

    }

     //Tạo tài khoản
     public function registerIndex(Request $request){   
        $user=new User(); //khởi tạo model user
        return view('admin.login.register',compact('user'));
    }

     //Tạo tài khoản
     public function register(Request $request){   
        $user=new User(); //khởi tạo model user và gán giá trị
        $user->name=$request->txtname;
        $user->password=$request->txtpass;
        $user->email=$request->txtemail ? $request->txtemail : "";
        $user->full_name=$request->txtfullname;

        $error=false;
        $errorMessage="";
        if($request->txtpass != $request->txtpassAgain){
            $error=true;
            $errorMessage="Mật khẩu không trùng khớp";
        }
        $userFilter = User::where('name',$request->txtname)->first(); //tìm xem có người dùng trong db chưa
        if(!empty($userFilter)){ //Nếu tồn tại thì gán value vào session
            $error=true;
            $errorMessage="Tài khoản đã tồn tại";
        }
        else{
           if(!$error){
            $user->save();
            $errorMessage="Tạo tài khoản thành công";
            $user=new User();
           }
        }
        return view('admin.login.register',compact('user','errorMessage','error'));
    }
}
