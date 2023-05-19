<?php

namespace App\Http\Controllers\admin\CustomerManagement;

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
            'email' => 'required|email',
            'address' => 'required',
            'password' => 'required|min:8|max:16',
            'phone_number' => 'regex:/^(0[0-9]*)$/|min:10',
        ], [
            'name.required' => "Bạn không được để trống tên người dùng",
            'email.required' => "Bạn không được để trống email người dùng",
            'email.email' => "Email không đúng định dạng",
            'address.required' => "Bạn không được để trống địa chỉ người dùng",
            'password.required' => "Bạn không được để trống mật khẩu người dùng",
            'password.min' => "Mật khẩu phải từ 8 kí tự trở lên",
            'phone_number.min' => "Số điện thoại người dùng phải từ 10 số trở lên",
            'phone_number.regex' => "Số điện thoại người dùng không đúng định dạng(phải bắt đầu từ 0)",
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
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
        $users = User::paginate(5);
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
            'address' => 'required',
            'phone_number' => 'regex:/^(0[0-9]*)$/|min:10',

        ], [
            'name.required' => "Bạn không được để trống tên người dùng",
            'email.required' => "Bạn không được để trống email người dùng",
            'email.email' => "Không đúng định dạng email",
            'address.required' => "Bạn không được để trống địa chỉ người dùng",
            'phone_number.min' => "Số điện thoại nhập vào phải từ 10 số",
            'phone_number.regex' => "Số điện thoại nhập vào không đúng định dạng phải bắt đầu từ 0, không chứa kí tự đặc biệt",
            
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
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
            return back()->with('status', 'Người dùng đã bị xóa');
        }
        return redirect(route('admin.member.list'))->with('status', 'Người dùng chưa bị xóa');
    }

    public function search(Request $request)
    {
        $input = $request->input('ValuetoSearch');
        $select = $request->input('select');
        $num = 5;

        if ($select == 'name') {
            $users = User::where('name', 'LIKE', '%' . $input . '%')->paginate($num);
        } else if ($select == 'address') {
            $users = User::where('address', 'LIKE', '%' . $input . '%')->paginate($num);
        } else {
            $users = User::paginate($num);
        }

        return view('admin.customer_management.member', ['title' => 'Danh sách thành vên', 'users' => $users]);
    }
}
