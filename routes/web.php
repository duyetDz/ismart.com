<?php

use App\Http\Controllers\admin\DashboardsController;
use App\Http\Controllers\admin\directory_management\BlogController as Directory_managementBlogController;
use App\Http\Controllers\admin\directory_management\CategoryController;
use App\Http\Controllers\admin\directory_management\ProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\client\BlogController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\CheckoutController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ProductsController;
use App\Http\Controllers\client\UsersController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();



Route::get('/', [HomeController::class, 'index'])->name('index');


Route::middleware(['auth'])->group(function () {
    //User 

    Route::get('/users/profile', [UsersController::class, 'profile'])->name('users.profile');



    // Blog

    Route::get('/blog', [BlogController::class, 'index'])->name('blog');

    Route::get('/blog/detail', [BlogController::class, 'detail'])->name('blog.detail');

    // Product

    Route::get('/products', [ProductsController::class, 'index'])->name('products');

    Route::get('/products/detail', [ProductsController::class, 'detail'])->name('products.detail');


    // Checkout

    Route::get('/cart', [CartController::class, 'index'])->name('cart');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
});




// Admin

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {

    Route::get('/index', [DashboardsController::class, 'index'])->name('admin.index');

    // Quản trị danh mục


    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');

    Route::get('/product', [ProductController::class, 'index'])->name('admin.product');

    Route::get('/blog', [Directory_managementBlogController::class, 'index'])->name('admin.blog');
});
