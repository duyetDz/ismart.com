<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\DuyetMail;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
// use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        if (Cart::content()) {
            foreach (Cart::content() as $item) {
                if ($item->options->remainingQty < $item->qty) {
                    $rowId = $item->rowId;
                    Cart::update($rowId, ['qty' => $item->options->remainingQty]);
                }
            }
        }

        if (Cart::count() > 0) {
            return view('checkout.index', ['user' => $user]);
        } else {
            return redirect('products');
        }
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'fullname' => 'required|max:255',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'regex:/^(0[0-9]*)$/|min:10',
            'note' => 'required',
            'payment_method' => 'required',
        ], [
            'fullname.required' => "Bạn không được để trống tên người dùng",
            'email.required' => "Bạn không được để trống email người dùng",
            'address.required' => "Bạn không được để trống địa chỉ người dùng",
            'phone_number.required' => "Bạn không được để trống số điện thoại người dùng",
            'phone_number.min' => "Số điện thoại người dùng phải từ 10 số trở lên",
            'phone_number.regex' => "Số điện thoại người dùng không đúng định dạng(phải bắt đầu từ 0)",
            'note.required' => "Bạn nên ghi rõ địa chỉ số nhà, xã, thôn ,yêu cầu về sản phẩm.",
            'payment_method.required' => "Bạn không được để trống số phương thức thanh toán người dùng",
        ]);

        $user = Auth::user();

        $order = new Order();
        $order->name = $request->fullname;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->phone_number = $request->phone_number;
        $order->payment = $request->payment_method;
        $order->note = $request->note;
        $order->order_code = 'ismart' . Str::random(5);
        $order->customer_id = $user->id;
        $order->total_price = Str::replace('.', '', Cart::total());

        $order->save();

        if (Cart::content()) {
            foreach (Cart::content() as $item) {
                if ($item->options->remainingQty < $item->qty) {
                    $rowId = $item->rowId;
                    Cart::update($rowId, ['qty' => $item->options->remainingQty]);
                }
            }
        }

        $cartItems = Cart::content();

        foreach ($cartItems as $item) {
            $orderItem = new Order_item();

            $orderItem->product_id = $item->id;
            $orderItem->quantity = $item->qty;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->save();
            // Update lại số lượng sản phẩm
            $product = Product::find($item->id);
            $product->quantity = $product->quantity - $item->qty;
            $product->save();
        }

        $data = ['cart_content' => Cart::content(),'order' => $order];

        // dd($data['cart_content']);

        // return view('mails.demo', ['data' => $data]);

        Mail::to('giangvanduyet@gmail.com')->send(new DuyetMail($data));

        Cart::destroy();


        return redirect()->route('order.detail', ['id' => $order->id])->with('status', "Bạn đã đặt hàng thành công");

    }
}
