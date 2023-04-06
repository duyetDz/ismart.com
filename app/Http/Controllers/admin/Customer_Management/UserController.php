<?php

namespace App\Http\Controllers\admin\Customer_Management;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.customer_management.add_member', ['title' => 'Thêm  thành vên']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'adress' => 'required',
            'password' => 'required|min:8',
            'phone_number' => 'required',
        ], [
            'name.required' => "Bạn không được để trống tên người dùng",
            'email.required' => "Bạn không được để trống email người dùng",
            'adress.required' => "Bạn không được để trống địa chỉ người dùng",
            'password.required' => "Bạn không được để trống mật khẩu người dùng",
            'phone_number.required' => "Bạn không được để trống số điện thoại người dùng",
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->adress = $request->adress;
        $user->password = Hash::make($request->password);
        $user->phone_number = $request->phone_number;
        
        if ($user) {
            $user->save();
            return redirect(route('admin.member.list'))->with('status', "Bạn đã thêm thành công");
        } else {
            return back()->with('status', "Bạn không thêm thành công");
        }
        
    }

    //
    public function list_member()
    {
        $users = User::all();
        return view('admin.customer_management.member', ['title' => 'Danh sách thành vên', 'users' => $users]);
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.customer_management.update_member', ['title' => 'Update thông tin thành vên', 'user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'adress' => 'required',
            'phone_number' => 'required',
            
        ], [
            'name.required' => "Bạn không được để trống tên người dùng",
            'email.required' => "Bạn không được để trống email người dùng",
            'adress.required' => "Bạn không được để trống địa chỉ người dùng",
            'phone_number.required' => "Bạn không được để trống số điện thoại người dùng",
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->adress = $request->adress;
        $user->phone_number = $request->phone_number;
        
        if ($user->save()) {
            return redirect(route('admin.member.list'))->with('status', "Bạn đã update thành công");
        } else {
            return back()->with('status', "Bạn Không update thành công");
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect(route('admin.member.list'))->with('status', 'Người dùng đã bị xóa');
        }
        return redirect(route('admin.member.list'))->with('status', 'Người dùng chưa bị xóa');
    }
}
