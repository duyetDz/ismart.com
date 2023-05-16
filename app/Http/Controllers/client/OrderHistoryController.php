<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{


    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('customer_id', 'like', '%' . $user->id . '%')->orderBy('created_at', 'desc')->get();

        

        return view('order.order-history', ['orders' => $orders]);
    }


    public function total($id)
    {
        $orderItems = Order_item::where('order_id', $id)->get();
       
        $totalQty = 0;
        $totalAmount = 0;

        foreach ($orderItems as $item) {
            $totalAmount += $item->product->price * $item->quantity;
            $totalQty += $item->quantity;
        }
        $resuft= [$totalAmount,$totalQty];

        return $resuft;
    }

    public function detail($id)
    {
        $order = Order::find($id);
        
        $orderItems = $order->orderItems;
        $list_product = null;
        $seeder = null;
        foreach($orderItems as $key => $item){
            $list_product[] = $item->product;
            $seeder[] = $item->product->user;
        }

        $totalAmount = $this->total($id)[0];
        $totalQty = $this->total($id)[1];
        
        return view('order.order-success', ['order'=> $order,'orderItems' => $orderItems, 'seeder' => $seeder,'totalAmount' => $totalAmount , 'totalQty' => $totalQty]);

    }
}
