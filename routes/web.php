<?php

use App\Http\Controllers\admin\DashboardsController;
use App\Http\Controllers\admin\directory_management\BlogController as Directory_managementBlogController;
use App\Http\Controllers\admin\directory_management\CategoryController;
use App\Http\Controllers\admin\directory_management\ProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\CustomerManagement\UserController as CustomerManagementUserController;
use App\Http\Controllers\admin\interface_management\InterfaceManagementController;
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

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


// Admin

Route::prefix('admin')->middleware(['is_admin'])->group(function () {

    Route::get('/index', [DashboardsController::class, 'index'])->name('admin.index');

    // Quản trị danh mục


    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');

    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');

    Route::get('/category/update/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');

    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');

    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');

    Route::get('/product', [ProductController::class, 'index'])->name('admin.product');

    Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');

    Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');

    Route::get('/product/update/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');

    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');

    Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');

    Route::get('/blog', [Directory_managementBlogController::class, 'index'])->name('admin.blog');

    Route::get('/blog/create', [Directory_managementBlogController::class, 'create'])->name('admin.blog.create');

    Route::post('/blog/store', [Directory_managementBlogController::class, 'store'])->name('admin.blog.store');

    Route::get('/blog/update/{id}', [Directory_managementBlogController::class, 'edit'])->name('admin.blog.edit');

    Route::post('/blog/update/{id}', [Directory_managementBlogController::class, 'update'])->name('admin.blog.update');

    Route::delete('/blog/destroy/{id}', [Directory_managementBlogController::class, 'destroy'])->name('admin.blog.destroy');



    Route::get('/member', [CustomerManagementUserController::class, 'list_member'])->name('admin.member.list');

    Route::get('/member/create', [CustomerManagementUserController::class, 'create'])->name('admin.member.create');

    Route::post('/member/store', [CustomerManagementUserController::class, 'store'])->name('admin.member.store');

    Route::get('/member/update/{id}', [CustomerManagementUserController::class, 'edit'])->name('admin/member/edit');

    Route::post('/member/update/{id}', [CustomerManagementUserController::class, 'update']);

    Route::get('/member/destroy/{id}', [CustomerManagementUserController::class, 'destroy']);


    Route::get('/product/upload/{id}', [InterfaceManagementController::class, 'add']);

    Route::post('/product/upload_img/store', [InterfaceManagementController::class, 'store'])->name('admin.upload.store');


    Route::get('/interface', [InterfaceManagementController::class, 'index'])->name('admin.product_image');

    Route::get('/interface/update/{id}', [InterfaceManagementController::class, 'edit'])->name('admin.product_image.edit');

    Route::post('/interface/update/{id}', [InterfaceManagementController::class, 'update'])->name('admin.product_image.update');

    Route::get('/interface/delete/{id}', [InterfaceManagementController::class, 'delete'])->name('admin.product_image.delete');


});
