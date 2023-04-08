<?php

namespace App\Http\Controllers\admin\directory_management;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::all();

        return view('admin/directory_management/blog', ['title' => 'Danh sách bài viết', 'blogs' => $blogs]);
    }

    public function create()
    {
        $user = Auth::user();
        return view('admin/directory_management/create_blog', ['title' => 'Thêm bài viết', 'user' => $user]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'feature_img' => 'required',
            'content' => 'required',
            'title' => 'required',
        ], [
            'content.required' => "Bạn không được để trống nội dung bài viết",
            'feature_img.required' => "Bạn không được để trống ảnh đại diện bài viết",
            'title.required' => "Bạn không được để trống tiêu đề bài viết",
        ]);

        $blog = new Blog();
        $path = $request->file('feature_img')->store('images', 'public');
        $blog->feature_img = 'storage/images/' . basename($path);
        $blog->content = $request->content;
        $blog->title = $request->title;
        $blog->user_id  = $request->user_id;
        if ($blog->save()) {
            return redirect(route('admin.blog'))->with('status', "Bạn đã thêm thành công");
        } else {
            return back()->with('status', "Bạn Không thêm thành công");
        }
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin/directory_management/edit_blog', ['title' => 'Update bài viết', 'blog' => $blog]);
    }

    public function update(Request $request, $id)
    {
         $blog = Blog::find($id);
        
        if ($request->hasFile('feature_img')) {
            // Trường hợp có thêm ảnh mới
            $validatedData = $request->validate([
                'feature_img' => 'nullable|image|max:2048',
                'content' => 'required',
                'title' => 'required',
            ], [
                'content.required' => "Bạn không được để trống nội dung bài viết",
                'feature_img.nullable' => "Bạn không được để trống ảnh đại diện bài viết",
                'feature_img.image' => "Tệp phải là ảnh ",
                'title.required' => "Bạn không được để trống tiêu đề bài viết",
            ]);
            // Thực hiện tạo đường dẫn mới
            if (file_exists($blog->feature_img)) {
                unlink($blog->feature_img);
            }
            $path = $request->file('feature_img')->store('images', 'public');
            $blog->feature_img = 'storage/images/' . basename($path);
        } 
        
        $blog->content = $request->content;
        $blog->title = $request->title;
        if ($blog->save()) {
            return redirect(route('admin.blog'))->with('status', "Bạn đã udpate thành công");
        } else {
            return back()->with('status', "Bạn không udpate thành công");
        }
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (file_exists($blog->feature_img)) {
            unlink($blog->feature_img);
        }
        if (!$blog) {
            return redirect()->back()->with('status', 'Bài viết không tồn tại');
        }

        if ($blog->delete()) {
            return redirect(route('admin.blog'))->with('status', "Bạn đã xóa thành công");
        } else {
            return back()->with('status', "Bạn không xóa thành công");
        }
    }
}
