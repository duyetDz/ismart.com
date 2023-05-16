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
        $product_news = Product::orderBy('created_at', 'desc')->paginate(8);
        $phones = Product::Where('category_id', 1)->where('quantity', '>', 0)->paginate(8);
        $laptops = Product::Where('category_id', 2)->where('quantity', '>', 0)->paginate(8);
        $bestSellers = Product::whereHas('orderItems', function ($query) {
            $query->whereHas('order', function ($query) {
                $query->where('status', 'Giao hàng thành công');
            });
        })->distinct()->paginate(8);
        return view('home.home', ['categories' => $categories, 'phones' => $phones, 'laptops' => $laptops, 'product_news' => $product_news , 'bestSellers' => $bestSellers]);
    }


    public function search_now($name)
    {
        if ($name != null) {
            $products = Product::where('name', 'Like', '%' . $name . '%')->get();
            return view('search_menu', ['products' => $products]);
        }
    }



    public function search_all(Request $request)
    {
       
        $bestSellers = Product::whereHas('orderItems', function ($query) {
            $query->whereHas('order', function ($query) {
                $query->where('status', 'Giao hàng thành công');
            });
        })->distinct()->get();

        

        $catIds = Product::distinct('category_id')->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $catIds)->get();

        

        $products = Product::where('name', 'Like', '%'.$request['search-imput'].'%')->paginate(20);
        return view('home/search_resulf', ['categories' => $categories, 'products' => $products,'bestSellers' => $bestSellers]);
    }
}
