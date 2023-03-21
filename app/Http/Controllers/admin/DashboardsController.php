<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardsController extends Controller
{
    //
    public function index()
    {
        # code...
        $title = "Trang Dashboards";
        return view('admin/dashboards/index',compact('title'));
    }
}
