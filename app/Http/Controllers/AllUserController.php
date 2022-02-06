<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class AllUserController extends Controller
{
    /**
     * My Orders
     */
    public function myOrder(){

        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.order_view', compact('orders'));

    }

    /**
     * Order Detials
     */
    public function orderDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        // dd($orderItem);
        return view('frontend.user.order.order_details', compact('order', 'orderItem'));
    
    }

    /**
     * Invoice Download
     */
    public function invoiceDownload($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        // dd($orderItem);
        // return view('frontend.user.order.order_invoice', compact('order', 'orderItem'));

        $pdf = PDF::loadView('frontend.user.order.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot'  => public_path()
        ]);
        return $pdf->download('invoice.pdf');
    
    }
}
