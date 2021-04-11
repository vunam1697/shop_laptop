<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class BaseController extends Controller
{
    
    //khởi tạo các sản phẩm được share
    public function __construct() {
        $site_info = '1111';
        view()->share(compact('site_info'));
    }

}
