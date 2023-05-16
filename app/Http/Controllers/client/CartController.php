<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    public function index()
    {
        if (Cart::content()) {
            foreach (Cart::content() as $item) {
                if ($item->options->remainingQty < $item->qty) {
                    $rowId = $item->rowId;
                    Cart::update($rowId, ['qty' => $item->options->remainingQty]);
                }
            }
        }

        return view('cart/index');
    }

    public function buy_now($id)
    {
        $product = Product::find($id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'options' => ['image' => $product->feature_image, 'remainingQty' => $product->quantity],

        ]);



        return redirect(route('cart'))->with('status', "Bạn đã thêm thành công");
    }

    public function buy_nows(Request $request, $id)
    {
        $product = Product::find($id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request['num-order'],
            'price' => $product->price,
            'options' => ['image' => $product->feature_image, 'remainingQty' => $product->quantity],

        ]);


        return redirect(route('cart'))->with('status', "Bạn đã thêm thành công");
    }

    public function add_one($id)
    {
        $product = Product::find($id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'options' => ['image' => $product->feature_image, 'remainingQty' => $product->quantity],

        ]);

        $cartContent = Cart::content();

        return view('cart_dropdown', compact('cartContent'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product->quantity >= $request['numOrder']) {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request['numOrder'],
                'price' => $product->price,
                'options' => ['image' => $product->feature_image, 'remainingQty' => $product->quantity],

            ]);
        } else {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $product->quantity,
                'price' => $product->price,
                'options' => ['image' => $product->feature_image, 'remainingQty' => $product->quantity],

            ]);
        };
        $cartContent = Cart::content();

        return view('cart_dropdown', compact('cartContent', $product));
    }

    public function update(Request $request)
    {
        $rowId = $request['rowId'];
        $qty = $request['qty'];


        Cart::update($rowId, ['qty' => $qty]);

        $cartContent = Cart::content();
        $cart_dropdown = view('cart_dropdown', compact('cartContent'));
        $cart_table_ajax = view('cart_table', compact('cartContent'));
        return $cart_dropdown;
    }

    public function delete(Request $request, $id)
    {
        if (Cart::count() > 0) {
            $rowId = $request['rowId'];
            Cart::remove($rowId);
            $cartContent = Cart::content();
            return view('cart_dropdown', compact('cartContent'));
        }
    }

    public function destroy()
    {
        Cart::destroy();
        $cartContent = Cart::content();
        return view('cart_dropdown', compact('cartContent'));
    }
}
