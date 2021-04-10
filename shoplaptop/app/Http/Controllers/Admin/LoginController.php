<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class LoginController extends Controller
{

    //trang index đăng nhập
    public function index(Request $request) {
        $value = $request->session()->get('login');
        if(!empty($value)){ //Nếu tồn tại session đăng nhập thì bay sang trang chủ admin
            return redirect()->route('admin.login');
        }
        return view('admin.login.index');
    }

    public function login(Request $request){
        
        $userFilter = User::where('name',$request->txtname)->where('password',$request->txtpass)->first(); //tìm xem có người dùng trong db chưa
        if(!empty($userFilter)){ //Nếu tồn tại thì gán vào session
            $request->session()->put('login', $userFilter);
        }
        else{
            //Nếu không tồn tại return về trang login và thông báo lỗi
            $error =true; 
            return view('admin.login.index',compact('error'));
        }
    }
}
