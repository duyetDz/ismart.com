<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('blog/index');
    }

    public function detail()
    {
        # code...
        return view('blog/detail');
    }
}
