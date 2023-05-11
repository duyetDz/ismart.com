<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index()
    {

        $catIds = Product::distinct('category_id')->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $catIds)->get();


        $cat = Category::where('name', 'like', '%Điện thoại%')->get();
        $categoryIds = $cat->pluck('id')->toArray();

        $products = Product::whereIn('category_id', $categoryIds)->get();
        # code...
        return view('products/index', ['categories' => $categories, 'products' => $products, 'name_category' => 'Điện thoại']);
    }

    public function detail($id)
    {
        $catIds = Product::distinct('category_id')->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $catIds)->get();

        $product = Product::find($id);
        $product_images = Product_image::where('product_id', $id)->get();

        return view('products/detail', ['product' => $product, 'product_images' => $product_images,'categories' => $categories]);
    }

    public function getProductsByCategory($category_id)
    {
        $catIds = Product::distinct('category_id')->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $catIds)->get();
        $name_category = Category::find($category_id);
        $products = Product::where('category_id', 'like', $category_id)->get();
        return view('products/index', ['categories' => $categories, 'products' => $products, 'name_category' => $name_category['name']]);
    }


    public function filterProductsByCategory(Request $request)
    {
        $category = $request['category'];
        $select = $request['select'];

        $catIds = Product::distinct('category_id')->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $catIds)->get();


        $cat = Category::where('name', 'like', '%Điện thoại%')->get();
        $categoryIds = $cat->pluck('id')->toArray();

        $products = Product::whereIn('category_id', $categoryIds)->get();
        # code...
        

        if($select == 1){
            $products = Product::whereIn('category_id', $categoryIds)->orderBy('name', 'asc')->get();
        }

        if($select == 2){
            $products = Product::whereIn('category_id', $categoryIds)->orderBy('name', 'desc')->get();
        }

        if($select == 3){
            $products = Product::whereIn('category_id', $categoryIds)->orderBy('price', 'desc')->get();
        }

        if($select == 4){
            $products = Product::whereIn('category_id', $categoryIds)->orderBy('price', 'asc')->get();
        }

        return view('products/index', ['categories' => $categories, 'products' => $products, 'name_category' => 'Điện thoại']);
    }
}
