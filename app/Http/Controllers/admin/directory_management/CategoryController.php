<?php

namespace App\Http\Controllers\admin\directory_management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('admin/directory_management/category',['title'=>'Quản trị danh mục']);
    }
}
