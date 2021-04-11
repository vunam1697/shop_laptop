<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class HomeController extends Controller
{

    //trang index đăng nhập
    public function index(Request $request) {
        return view('admin.home.index');
    }

}
