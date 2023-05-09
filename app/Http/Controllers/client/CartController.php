<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart/index');
    }

    public function add_one($id)
    {
        $product = Product::find($id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name, 
            'qty' => 1, 
            'price' => $product->price, 
            'options' => ['image' => $product->feature_image]
        ]);

        return back()->with('status', "Bạn đã Thêm thành công sản phẩm");
    }

    public function add(Request $request, $id)
    {
        $product = Product::find($id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name, 
            'qty' => $request['num-order'], 
            'price' => $product->price, 
            'options' => ['image' => $product->feature_image]
        ]);

        return back()->with('status', "Bạn đã Thêm thành công sản phẩm");
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        return redirect(route('cart'))->with('status', "Bạn đã Xóa sản phẩm");
    }

    public function destroy()
    {
        Cart::destroy();
        return redirect(route('cart'))->with('status', "Bạn đã xóa toàn bộ giỏ hàng");
    }
}
