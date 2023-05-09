<?php

namespace App\Http\Controllers\admin\directory_management;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
// use Intervention\Image\ImageManagerStatic as Image;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
    }
    //
    public function index()
    {
        $products = Product::all();
        $category = Category::all();
        return view('admin/directory_management/product', ['title' => 'Trang sản phẩm', 'products' => $products, 'category' => $category]);
    }

    public function search(Request $request)
    {

        $category = Category::all();
        $input = $request->input('ValuetoSearch');
        $select = $request->input('select');
        $products = null;
        if ($select == 'name') {
            if (!empty($input)) {
                $products = Product::where('name', $input)->get();
            } else {
                $products = Product::all();
            }
        } else {
            if (!empty($input)) {

                $categories = Category::select('id')->where('name', 'Like', '%' . $input . '%')->get();
                $categoryIds = $categories->pluck('id')->toArray();
                $products = Product::where('name', 'LIKE', '%' . $input . '%')->orwhereIn('category_id', $categoryIds)->get();
            } else {
                $products = Product::all();
            }
        }


        return view('admin/directory_management/product', ['title' => 'Trang sản phẩm', 'products' => $products, 'category' => $category]);
    }

    public function create()
    {

        $users = User::where('is_admin', 1)->get();
        $category = Category::all();

        return view('admin.directory_management.create_product', ['title' => 'Thêm sản phẩm', 'users' => $users, 'category' => $category]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'feature_image' => 'required|image|max:2048',
            'configuration' => 'required',
            'description' => 'required',
            "user_id" => 'required',
            "category_id" => 'required'
        ], [
            'name.required' => "Bạn không được để trống tên sản phẩm",
            'name.max' => "Tên sản phẩm không được vượt quá 255 kí tự",
            'feature_image.required' => "Bạn không được để trống hình ảnh sản phẩm",
            'feature_image.image' => "Tệp thêm vào phải là hình ảnh",
            'feature_image.max' => "Hình ảnh thêm vào có kích thước k vượt quá 2048 KB"
        ]);
        $product = new Product();
        // $path = $request->file('feature_image')->store('images', 'public');

        $image = $request->file('feature_image');
        $file_name = $image->getClientOriginalName();

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(300, 300);
        $image_resize->save(public_path('storage/images/' . $file_name));

        $image_zoom = Image::make($image->getRealPath());
        $image_zoom->resize(700, 700);
        $image_zoom->save(public_path('storage/images/700' . $file_name));

        $product->feature_image = 'storage/images/' . basename($file_name);
        $product->image_zoom = 'storage/images/700' . basename($file_name);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
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
            'configuration' => 'required',
            'description' => 'required',
            "user_id" => 'required',
            "category_id" => 'required'
        ], [
            'name.required' => "Bạn không được để trống tên sản phẩm",
            'name.max' => "Tên sản phẩm không được vượt quá 255 kí tự",
            'feature_image.required' => "Bạn không được để trống hình ảnh sản phẩm",
            'feature_image.image' => "Tệp thêm vào phải là hình ảnh",
            'feature_image.max' => "Hình ảnh thêm vào có kích thước k vượt quá 2048 KB"
        ]);
        $product = Product::find($id);
        if ($request->hasFile('feature_image')) {
            // Trường hợp có thêm ảnh mới
            $validatedData = $request->validate([
                'feature_image' => 'required|image|max:2048',
            ], [
                'feature_image.required' => "Bạn không được để trống hình ảnh sản phẩm",
                'feature_image.image' => "Tệp thêm vào phải là hình ảnh",
                'feature_image.max' => "Hình ảnh thêm vào có kích thước k vượt quá 2048 KB"
            ]);
            if (file_exists($product->feature_image)) {
                unlink($product->feature_image);
                unlink($product->image_zoom);
            }
            $image = $request->file('feature_image');
            $file_name = $image->getClientOriginalName();
    
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('storage/images/' . $file_name));
    
            $image_zoom = Image::make($image->getRealPath());
            $image_zoom->resize(700, 700);
            $image_zoom->save(public_path('storage/images/700' . $file_name));
    
            $product->feature_image = 'storage/images/' . basename($file_name);
            $product->image_zoom = 'storage/images/700' . basename($file_name);
        }


        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
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

        if (file_exists($product->feature_image)) {
            unlink($product->feature_image);
            unlink($product->image_zoom);
        }

        if ($product) {
            $product->delete();
            return redirect(route('admin.product'))->with('status', 'Sản Phẩm đã bị xóa');
        }
        return redirect(route('admin.product'))->with('status', 'Sản Phẩm chưa bị xóa');
    }
}
