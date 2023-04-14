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
            'name' => 'required|max:255',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ], [
            'name.required' => "Bạn không được để trống tên người dùng",
            'email.required' => "Bạn không được để trống email người dùng",
            'address.required' => "Bạn không được để trống địa chỉ người dùng",
            'phone_number.required' => "Bạn không được để trống số điện thoại người dùng",
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
