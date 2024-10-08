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
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        foreach ($orders as $order) {
            $order->total = $this->total($order->id);
        }
        return view('admin.customer_management.order', ['title' => 'Danh sách đơn hàng', 'orders' => $orders]);
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('admin.customer_management.order_edit', ['title' => 'Update đơn hàng', 'order' => $order]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        if($order->status == "Hủy đơn hàng"){
            $orderItems = Order_item::where('order_id', $id)->get();
            foreach($orderItems as $item){

            }
        }
        if ($order->save()) {
            return redirect(route('admin.order.list'))->with('status', "Bạn đã update thành công");
        } else {
            return back()->with('status', "Bạn Không update thành công");
        }
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
        $orderItems = $order->orderItems;

        $list_product = null;
        $seeder = null;
        foreach ($orderItems as $key => $item) {
            $list_product[] = $item->product;
            $seeder[] = $item->product->user;
        }
        $totalAmount = $this->total($id);

        return view('admin.customer_management.order_detail', ['title' => 'Danh sách đơn hàng', 'order' => $order, 'orderItems' => $orderItems, 'seeder' => $seeder, 'totalAmount' => $totalAmount]);
    }


    public function search(Request $request)
    {
        $ValuetoSearch = $request->ValuetoSearch;
        $select = $request->select;
        $orders = Order::where($select, 'LIKE', '%' . $ValuetoSearch . '%')->paginate(10);
        return view('admin.customer_management.order', ['title' => 'Danh sách đơn hàng', 'orders' => $orders]);
    }
}
