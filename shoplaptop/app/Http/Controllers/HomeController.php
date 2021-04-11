<?php

namespace App\Http\Controllers;
use App\Models\Sanpham;
class HomeController extends Controller
{
    public function __construct() {
        $site_info = '1111';
        view()->share(compact('site_info'));
    }

    public function getHome() {
        $data = Sanpham::all();//lay all
        //$data = Sanpham::first();//lay 1
        //$data = Sanpham::where('id',1);//condition
        return view('web.pages.home',compact('data'));
    }

    public function getProduct() {
        $data = Sanpham::all();
        return view('web.pages.sanpham', compact('data'));
    }

    public function getProductDetail($slug) {

        return view('web.pages.chi-tiet-sanpham');
    }
}
