<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //

    public function profile()
    {
        # code...
        return view('users/profile');
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
