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
        $list_category = Category::paginate(5);
        // # code...
        return view('admin/directory_management/category', ['title' => 'Quản trị danh mục', 'list_category' => $list_category]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->search;
        $list_category = Category::where('name', 'like', '%' . $searchTerm . '%')->paginate(5);
        return view('admin/directory_management/category', ['title' => 'Quản trị danh mục', 'list_category' => $list_category]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'parent_id' => 'required'
        ], [
            'name.required' => "Bạn không được để trống tên danh mục",
            'parent_id.required' => "Bạn không được để trống danh mục gốc",
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;

        $resuft = $category->save();

        return redirect(route('admin.category'))->with('status', "Bạn đã thêm thành công");
    }

    public function create()
    {
        $list_category = Category::all();

        return view('admin/directory_management/create_category', ['title' => 'Quản trị danh mục', 'list_category' => $list_category]);
    }


    public function edit($id)
    {
        $list_category = Category::all();
        $category = Category::find($id);
        return view('admin/directory_management/edit_category', ['title' => 'Quản trị danh mục', 'list_category' => $list_category, 'category' => $category]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|max:255',
            'parent_id' => 'required'
        ], [
            'name.required' => "Bạn không được để trống hình ảnh sản phẩm",
            'parent_id.required' => "Bạn không được để trống hình ảnh sản phẩm",
        ]);
        $category = new Category();
        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;

        $category->update();
        return redirect(route('admin.category'))->with('status', "Bạn đã update thành công");
    }







    public function delete($id)
    {
        # code...
        $category = Category::find($id);
        $category->delete();
        return back()->with('status', 'Danh mục đã bị xóa');
    }
}
