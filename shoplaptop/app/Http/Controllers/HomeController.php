<?php

namespace App\Http\Controllers;
use App\Models\Sanpham;
class HomeController extends Controller
{
    public function getHome() {
        $data = Sanpham::all();//lay all
        //$data = Sanpham::first();//lay 1
        //$data = Sanpham::where('id',1);//condition
        return view('web.pages.home',compact('data'));
    }
}
