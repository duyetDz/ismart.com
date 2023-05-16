<?php

namespace App\Http\Controllers\admin\interface_management;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class InterfaceManagementController extends Controller
{
    public function index()
    {
        $product_images = Product_image::paginate(10);
        $categories = Category::all();
        return view('admin.interface_management.index', ['title' => "Danh sách hình ảnh", 'product_images' => $product_images, 'categories' => $categories]);
    }
    public function add($id)
    {
        $product = Product::find($id);

        return view('admin.interface_management.upload', ['title' => "Upload hình ảnh cho sản phẩm", 'product' => $product]);
    }

    public function store(Request $request)
    {

        if ($request->hasFile('images')) {
            $validator = Validator::make($request->all(), [
                'images.*' => [
                    'required',
                    'image',
                    'mimes:jpeg,jpg,png,gif',
                    'max:2048' // giới hạn dung lượng file ảnh là 2MB
                ]
            ]);

            $images = $request->file('images');

            foreach ($images as $image) {


                // Tạo bản ghi ProductImage và liên kết với sản phẩm
                $product_images = new Product_image();
                $product_images->product_id    = $request->product_id;
                
                $file_name = $image->getClientOriginalName();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(300,300);
                $image_resize->save(public_path('storage/images/'.$file_name)); 

                $image_zoom = Image::make($image->getRealPath());
                $image_zoom->resize(700,700);
                $image_zoom->save(public_path('storage/images/700'.$file_name)); 

                $product_images->image = 'storage/images/' . basename($file_name);
                $product_images->image_zoom = 'storage/images/700' . basename($file_name);
                $product_images->save();
            }

            return redirect(route('admin.product_image'))->with('status', "Bạn đã Thêm thành công");
        }
    }

    public function edit($id)
    {
        $product_image = Product_image::find($id);
        return view('admin.interface_management.update', ['title' => "Upload hình ảnh cho sản phẩm", 'product_image' => $product_image]);
    }

    public function update(Request $request, $id)
    {

        $product_image = Product_image::find($id);
        if ($request->hasFile('image')) {
            // Trường hợp có thêm ảnh mới
            $validatedData = $request->validate([
                'image' => 'required|image|max:2048',
            ], [
                'image.required' => "Bạn không được để trống hình ảnh sản phẩm",
                'image.image' => "Tệp thêm vào phải là hình ảnh",
                'image.max' => "Hình ảnh thêm vào có kích thước k vượt quá 2048 KB"
            ]);
            if (file_exists($product_image->image)) {
                unlink($product_image->image);
                unlink($product_image->image_zoom);
            }
            $file_name = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300,300);
            $image_resize->save(public_path('storage/images/'.$file_name)); 

            $image_zoom = Image::make($image->getRealPath());
            $image_zoom->resize(700,700);
            $image_zoom->save(public_path('storage/images/700'.$file_name)); 

            $product_image->image = 'storage/images/' . basename($file_name);
            $product_image->image_zoom = 'storage/images/700' . basename($file_name);
        }

        if ($product_image->save()) {
            return redirect(route('admin.product_image'))->with('status', "Bạn đã update thành công");
        } else {
            return back()->with('status', "Bạn Không update thành công");
        }
    }

    public function delete($id)
    {
        $product_image = Product_image::find($id);

        if (file_exists($product_image->image)) {
            unlink($product_image->image);
            unlink($product_image->image_zoom);
        }

        if ($product_image) {
            $product_image->delete();
            return redirect(route('admin.product_image'))->with('status', 'Hình ảnh đã bị xóa');
        }
        return redirect(route('admin.product_image'))->with('status', 'Hình ảnh chưa bị xóa');
    }

    public function search(Request $request)
    {
        $category = Category::all();
        $input = $request->input('ValuetoSearch');
        $select = $request->input('select');
        $products = null;
        $product_images = null;
        if ($select == 'name') {
            if (!empty($input)) {
                $products = Product::where('name', $input)->paginate(10);
            } else {
                $products = Product::paginate(10);
            }
        } else if ($select == 'updated_at') {

            if (!empty($input)) {

                $product_images = Product_image::where('updated_at', 'LIKE', '%' . $input . '%')->paginate(10);
            } else {
                $product_images = Product_image::paginate(10);
            }

            return view('admin.interface_management.index', ['title' => "Danh sách hình ảnh", 'product_images' => $product_images, 'categories' => $category]);
        } else {
            if (!empty($input)) {

                $categories = Category::select('id')->where('name', 'Like', $input)->get();
                $categoryIds = $categories->pluck('id')->toArray();
                $products = Product::where('name', 'LIKE', '%' . $input . '%')->orwhereIn('category_id', $categoryIds)->get();
            } else {
                $products = Product::all();
            }
        }

        $productIds = $products->pluck('id')->toArray();
        $product_images = Product_image::whereIn('product_id', $productIds)->paginate(10);

        return view('admin.interface_management.index', ['title' => "Danh sách hình ảnh", 'product_images' => $product_images, 'categories' => $category]);
    }
}
