<?php

namespace App\Http\Controllers\admin\CustomerManagement;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::all();
        foreach($orders as $order){
            $order->total = $this->total($order->id);
        }
        return view('admin.customer_management.order', ['title' => 'Danh sách đơn hàng', 'orders' => $orders]);
    }

    public function total($id)
    {
        $orderItems = Order_item::where('order_id', $id)->get();
       
        $totalAmount = 0;

        foreach ($orderItems as $item) {
            $totalAmount += $item->product->price * $item->quantity;
        }

        return $totalAmount;
    }

    public function detail($id)
    {
        $order = Order::find($id);
        $orderItems = $order->order_items;
        
        $list_product = null;
        $seeder = null;
        foreach($orderItems as $key => $item){
            $list_product[] = $item->product;
            $seeder[] = $item->product->user;
        }

        $client = $order->user;
        $totalAmount = $this->total($id);
        
        return view('admin.customer_management.order_detail', ['title' => 'Danh sách đơn hàng','order'=> $order,'orderItems' => $orderItems, 'seeder' => $seeder,'totalAmount' => $totalAmount]);
    }
}
