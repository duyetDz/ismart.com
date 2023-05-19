<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class UsersController extends Controller
{
    //

    public function profile()
    {
        # code...
         $user = Auth::user();
        return view('users/profile',['user' => $user]);
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $user = User::find($user->id);
        $validatedData = $request->validate([
            'name' => 'required|max:255|',
            'email' => 'required|email',
            'address' => 'required',
            'phone_number' => 'regex:/^(0[0-9]*)$/|min:10',
        ], [
            'name.required' => "Bạn không được để trống tên người dùng",
            'email.required' => "Bạn không được để trống email người dùng",

            'email.email' => "Bạn nhập email không đúng định dạng",
            'address.required' => "Bạn không được để trống địa chỉ người dùng",
            'phone_number.required' => "Bạn không được để trống số điện thoại người dùng",
            
            'phone_number.min' => "Số điện thoại nhập vào phải từ 10 số",
            'phone_number.regex' => "Số điện thoại nhập vào không đúng định dạng phải bắt đầu từ 0, không chứa kí tự đặc biệt",

        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        
        if ($user) {
            $user->save();
            return redirect(route('users.profile'))->with('status', "Bạn đã update thành công");
        } else {
            return back()->with('status', "Bạn không update thành công");
        }
    }

    public function email()
    {
        # code...
        return view('users/email');
    }


    public function login()
    {
        # code...
        return view('users/login');
    }

    public function reg()
    {
        # code...
        return view('users/reg');
    }


    public function reset_password()
    {
        # code...
        return view('users/reset_password');
    }
}
