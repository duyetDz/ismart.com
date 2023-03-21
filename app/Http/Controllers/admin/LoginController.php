<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login()
    {
        # code...
        $title = "Trang login Admin";
        return view('admin/user/login',compact('title'));
    }

    public function store(Request $request)
    {
        $value = $request->input();
        $email = $value['email'];
        $password = $value['password'];
        $remember = $value['remember'];
        
        // if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
        //     // The user is being remembered...
            
        // }
        dd($value['email']);
    }
}
