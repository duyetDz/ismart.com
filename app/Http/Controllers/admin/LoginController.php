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

    public function store(LoginRequest $request)
    {
        $validated = $request->validated();
        $remember = $request->boolean('remember');
        dd($remember);
    }
}
