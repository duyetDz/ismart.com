<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('products/index');
    }

    public function detail()
    {
        # code...
        return view('products/detail');
    }
}
