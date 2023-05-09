<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    //
    public function index()
    {
        $catIds = Product::distinct('category_id')->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $catIds)->get();
        $phones = Product::Where('category_id', 1)->get();
        $laptops = Product::Where('category_id', 16)->get();
        return view('home.home',['categories' => $categories, 'phones' => $phones, 'laptops' => $laptops]);
    }
}
