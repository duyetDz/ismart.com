<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {

        $bestSellers = Product::whereHas('orderItems', function ($query) {
            $query->whereHas('order', function ($query) {
                $query->where('status', 'Giao hàng thành công');
            });
        })->distinct()->get();

        $catIds = Product::distinct('category_id')->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $catIds)->get();


        $cat = Category::where('name', 'like', '%Điện thoại%')->get();
        $categoryIds = $cat->pluck('id')->toArray();

        $products = Product::whereIn('category_id', $categoryIds)->paginate(20);
        # code...
        return view('products/index', ['categories' => $categories, 'products' => $products, 'name_category' => 'Điện thoại','bestSellers' => $bestSellers]);
    }




    public function detail($id)
    {
        $catIds = Product::distinct('category_id')->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $catIds)->get();

        $product = Product::find($id);
        $product_images = Product_image::where('product_id', $id)->get();

        $products = Product::where('category_id', $product->category_id)->paginate(10);

        return view('products/detail', ['product' => $product, 'product_images' => $product_images, 'categories' => $categories, 'products' => $products]);
    }

    public function getProductsByCategory($category_id)
    {
        $catIds = Product::distinct('category_id')->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $catIds)->get();
        $name_category = Category::find($category_id);
        $products = Product::where('category_id', 'like', $category_id)->paginate(20);;
        return view('products/index', ['categories' => $categories, 'products' => $products, 'name_category' => $name_category['name']]);
    }


    public function filterProductsByCategory(Request $request)
    {
        $category = $request['category'];
        $select = $request['select'];

        $catIds = Product::distinct('category_id')->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $catIds)->get();

        $products = Product::where('category_id', 1)->paginate(20);
        $name_category = Category::select('name')->find($select);

        if ($select == 1) {
            $products = Product::where('category_id', $select)->orderBy('name', 'asc')->paginate(20);
        }

        if ($select == 2) {
            $products = Product::where('category_id', $select)->orderBy('name', 'desc')->paginate(20);
        }

        if ($select == 3) {
            $products = Product::where('category_id', $select)->orderBy('price', 'desc')->paginate(20);
        }

        if ($select == 4) {
            $products = Product::where('category_id', $select)->orderBy('price', 'asc')->paginate(20);
        }

        return view('products/index', ['categories' => $categories, 'products' => $products, 'name_category' => $name_category->name]);
    }
}
