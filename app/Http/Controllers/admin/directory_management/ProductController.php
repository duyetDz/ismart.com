<?php

namespace App\Http\Controllers\admin\directory_management;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
       
        return view('admin/directory_management/product', ['title' => 'Trang sản phẩm', 'products' => $products]);
    }

    public function create()
    {
       
        $users = User::where('is_admin', 1)->get();
        $category = Category::all();

        return view('admin.directory_management.create_product', ['title' => 'Thêm sản phẩm', 'users' => $users, 'category' => $category]);
    }

    public function store(Request $request)
    {
        # link anh feature image http://127.0.0.1:8000/storage/photos/2/10.jpg
        # code...

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'feature_image' => 'required',
            'configuration' => 'required',
            'description' => 'required',
            "user_id" => 'required',
            "category_id" => 'required'
        ], [
            'name.required' => "Bạn không được để trống tên sản phẩm",
            'name.max' => "Tên sản phẩm không được vượt quá 255 kí tự"
        ]);
        $path = $request->file('feature_image')->store('images', 'public');
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->feature_image = 'storage/images/' . basename($path);;
        $product->configuration = $request->configuration;
        $product->content = $request->description;
        $product->user_id = $request->user_id;
        $product->category_id = $request->category_id;

        if ($product->save()) {
            return redirect(route('admin.product'))->with('status', "Bạn đã Thêm thành công");
        } else {
            return back()->with('status', "Bạn đã Không thành công");
        }

       
    }


    public function edit($id)
    {
        
        $users = User::where('is_admin', 1)->get();
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.directory_management.update_product', ['title' => 'Update sản phẩm', 'users' => $users, 'category' => $category,  'product' => $product]);
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'feature_image' => 'required',
            'configuration' => 'required',
            'description' => 'required',
            "user_id" => 'required',
            "category_id" => 'required'
        ], [
            'name.required' => "Bạn không được để trống tên sản phẩm",
            'name.max' => "Tên sản phẩm không được vượt quá 255 kí tự"
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $path = $request->file('feature_image')->store('images', 'public');
        $product->feature_image = 'storage/images/' . basename($path);

        $product->configuration = $request->configuration;
        $product->content = $request->description;
        $product->user_id = $request->user_id;
        $product->category_id = $request->category_id;


        if ($product->save()) {
            return redirect(route('admin.product'))->with('status', "Bạn đã update thành công");
        } else {
            return back()->with('status', "Bạn Không update thành công");
        }
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return redirect(route('admin.product'))->with('status', 'Sản Phẩm đã bị xóa');
        }
        return redirect(route('admin.product'))->with('status', 'Sản Phẩm chưa bị xóa');
    }
}
