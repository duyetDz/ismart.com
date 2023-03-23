<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('cart/index');
    }
}
