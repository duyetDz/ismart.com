<?php

namespace App\Http\Controllers\admin\directory_management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('admin/directory_management/product',['title'=>'Trang sản phẩm']);
    }
}
