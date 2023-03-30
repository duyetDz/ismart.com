<?php

namespace App\Http\Controllers\admin\directory_management;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $list_category = Category::all();
        # code...
        return view('admin/directory_management/category', ['title' => 'Quản trị danh mục', 'list_category' => $list_category]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ], [
            'name.required' => "Bạn không được để trống tên danh mục",
            'name.max' => "Tên danh mục không được vượt quá 255 kí tự"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ]);
        } else {
            $category = new Category();
            $category->name = $request->name;
            if ($request->slug != null) {
                $category->slug = $request->slug;
            } else {
                $category->slug = "null";
            }
            $category->parent_id = $request->parent_id;

            $resuft = $category->save();

            return response()->json([
                'status' => 200,
                'massage' => "Thêm thành công danh mục!"
            ]);
        }
    }

    public function edit($id)
    {
        # code...
        $list_category = Category::all();
        $category = Category::find($id);
        return response()->json([
            'status' => 200,
            'category' => $category,
        ]);
    }

    public function update(Request $request,$id)
    {
         
        # code...
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ], [
            'name.required' => "Bạn không được để trống tên danh mục",
            'name.max' => "Tên danh mục không được vượt quá 255 kí tự"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ]);
        } else {
            // $category = new Category();
            $category = Category::find($id);
            $category->name = $request->name;
            if ($request->slug != null) {
                $category->slug = $request->slug;
            } else {
                $category->slug = "null";
            }
            $category->parent_id = $request->parent_id;

            $resuft = $category->update();

            return response()->json([
                'status' => 200,
                'massage' => "Update thành công danh mục!"
            ]);
        }

        
    }

    public function delete($id)
    {
        # code...
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'status' => 200,
            'massage' => "Xóa thành công danh mục!"
        ]);
    }
}
