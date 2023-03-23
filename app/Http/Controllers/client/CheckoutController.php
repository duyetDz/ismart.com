<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('checkout.index');
    }
}
