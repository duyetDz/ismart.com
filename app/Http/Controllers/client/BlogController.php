<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::paginate(5);
        $bestSellers = Product::whereHas('orderItems', function ($query) {
            $query->whereHas('order', function ($query) {
                $query->where('status', 'Giao hàng thành công');
            });
        })->distinct()->paginate(8);
        # code...
        return view('blog/index',['blogs' => $blogs,'bestSellers' => $bestSellers]);
    }

    public function detail($id)
    {
        $blog = Blog::find($id);
        $bestSellers = Product::whereHas('orderItems', function ($query) {
            $query->whereHas('order', function ($query) {
                $query->where('status', 'Giao hàng thành công');
            });
        })->distinct()->paginate(8);
        # code...
        return view('blog/detail',['blog' => $blog,'bestSellers' => $bestSellers]);
    }
}
