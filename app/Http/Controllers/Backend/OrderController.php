<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Peding Orders List
     */
    public function pendingOrders(){
        $orders = Order::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders', compact('orders'));
    }

    /**
     * Pending Order Details
     */
    public function pendingOrderDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        // dd($orderItem);
        return view('backend.orders.pending_order_details', compact('order', 'orderItem'));
    }
}
