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
        $product_images = Product_image::paginate(5);
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
        $validator = Validator::make($request->all(), [
            'images' => 'required',
            'images.*' => 'required|image|max:2048|mimes:jpeg,jpg,png,gif',
        ], [
            'images.*.required' => 'Bạn chưa chọn ảnh',
            'images.*.image' => 'Tệp tải lên phải là hình ảnh',
            'images.*.mimes' => 'Tệp tải lên phải là định dạng jpeg, jpg, png hoặc gif',
            'images.*.max' => 'Dung lượng tối đa của tệp tải lên là 2MB'
        ]);
        

        $images = $request->file('images');

        foreach ($images as $image) {


            // Tạo bản ghi ProductImage và liên kết với sản phẩm
            $product_images = new Product_image();
            $product_images->product_id    = $request->product_id;

            $file_name = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('storage/images/' . $file_name));

            $image_zoom = Image::make($image->getRealPath());
            $image_zoom->resize(700, 700);
            $image_zoom->save(public_path('storage/images/700' . $file_name));

            $product_images->image = 'storage/images/' . basename($file_name);
            $product_images->image_zoom = 'storage/images/700' . basename($file_name);
            $product_images->save();
        }

        return redirect(route('admin.product_image'))->with('status', "Bạn đã Thêm thành công");
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
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('storage/images/' . $file_name));

            $image_zoom = Image::make($image->getRealPath());
            $image_zoom->resize(700, 700);
            $image_zoom->save(public_path('storage/images/700' . $file_name));

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
        $categories = Category::all();
        $input = $request->input('ValuetoSearch');
        $select = $request->input('select');
        $products = null;

        if (empty($select) || $select == 'name') {
            // Tìm kiếm theo tên sản phẩm
            if (!empty($input)) {
                $products = Product::where('name', 'LIKE', '%' . $input . '%');
            } else {
                $products = Product::query();
            }
        } else {
            // Tìm kiếm theo danh mục sản phẩm
            if (!empty($input)) {
                $products = Product::where('name', 'LIKE', '%' . $input . '%')
                    ->where('category_id', $select);
            } else {
                $products = Product::where('category_id', $select);
            }
        }

        $product_ids = $products->pluck('id')->toArray();

        $product_images = Product_image::whereIn('product_id', $product_ids)->paginate(5);

        return view('admin.interface_management.index', ['title' => 'Danh sách hình ảnh', 'product_images' => $product_images, 'categories' => $categories]);
    }
}
