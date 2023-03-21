<?php

use App\Http\Controllers\admin\DashboardsController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Trang Home

Route::get('/', [HomeController::class, 'index'])->name('index');

//User Login

Route::get('/users/login', [UsersController::class, 'login'])->name('users.login');

Route::get('/users/reg', [UsersController::class, 'reg'])->name('users.reg');

Route::get('/users/email', [UsersController::class, 'email'])->name('users.email');

Route::get('/users/reset_password', [UsersController::class, 'reset_password'])->name('users.reset_password');

// Blog

Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/blog/detail', [BlogController::class, 'detail'])->name('blog.detail');

// Product

Route::get('/products', [ProductsController::class, 'index'])->name('products');

Route::get('/products/detail', [ProductsController::class, 'detail'])->name('products.detail');


// Checkout

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

// Admin

Route::get('/admin/index', [DashboardsController::class, 'index'])->name('admin.index');

Route::get('/admin/login', [LoginController::class, 'login'])->name('admin.user.login');

Route::post('/admin/login', [LoginController::class, 'store'])->name('admin.user.store');


