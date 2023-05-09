<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::all();
        # code...
        return view('blog/index',['blogs' => $blogs]);
    }

    public function detail($id)
    {
        $blog = Blog::find($id);
        # code...
        return view('blog/detail',['blog' => $blog]);
    }
}
