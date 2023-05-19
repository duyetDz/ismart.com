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

        $category_phone = Category::where('name', 'LIKE', '%điện thoại%')->first();
        $category_phone_id = $category_phone->id;

        $category_pc = Category::where('name', 'LIKE', '%Máy tính%')->first();
        $category_pc_id = $category_pc->id;


        $phones = Product::Where('category_id', $category_phone_id)->paginate(8);
        $laptops = Product::Where('category_id', $category_pc_id)->paginate(8);
        $bestSellers = Product::whereHas('orderItems', function ($query) {
            $query->whereHas('order', function ($query) {
                $query->where('status', 'Giao hàng thành công');
            });
        })->distinct()->paginate(8);
        return view('home.home', ['categories' => $categories, 'phones' => $phones, 'laptops' => $laptops, 'product_news' => $product_news, 'bestSellers' => $bestSellers]);
    }


    public function search_now($name)
    {
        if ($name != null) {
            $products = Product::where('name', 'Like', '%' . $name . '%')->get();
        }
        $data  = (string)view('search_menu', ['products' => $products]);
        return [$data];
    }



    public function search_all(Request $request)
    {
        $request = $request['search-imput'];

        $bestSellers = Product::whereHas('orderItems', function ($query) {
            $query->whereHas('order', function ($query) {
                $query->where('status', 'Giao hàng thành công');
            });
        })->distinct()->get();

        $catIds = Product::distinct('category_id')->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $catIds)->get();

        $products = Product::where('name', 'Like', '%' . $request . '%')->paginate(20);
        return view('home/search_resulf', ['categories' => $categories, 'products' => $products, 'bestSellers' => $bestSellers, 'request' => $request]);
    }

    public function introduce()
    {
        $bestSellers = Product::whereHas('orderItems', function ($query) {
            $query->whereHas('order', function ($query) {
                $query->where('status', 'Giao hàng thành công');
            });
        })->distinct()->paginate(8);
        return view('home.introduce', ['bestSellers' => $bestSellers]);
    }

    public function contact()
    {
        $bestSellers = Product::whereHas('orderItems', function ($query) {
            $query->whereHas('order', function ($query) {
                $query->where('status', 'Giao hàng thành công');
            });
        })->distinct()->paginate(8);
        return view('home.contact', ['bestSellers' => $bestSellers]);
    }
}
