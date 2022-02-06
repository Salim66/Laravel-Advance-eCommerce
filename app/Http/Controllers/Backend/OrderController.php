<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Pending Orders List
     */
    public function pendingOrders(){
        $orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
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

    /**
     * confirmed Orders List
     */
    public function confirmedOrders(){
        $orders = Order::where('status', 'confirm')->orderBy('id', 'DESC')->get();
        return view('backend.orders.confirmed_orders', compact('orders'));
    }

    /**
     * processing Orders List
     */
    public function processingOrders(){
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing_orders', compact('orders'));
    }

    /**
     * picked Orders List
     */
    public function pickedOrders(){
        $orders = Order::where('status', 'picked')->orderBy('id', 'DESC')->get();
        return view('backend.orders.picked_orders', compact('orders'));
    }


    /**
     * shipped Orders List
     */
    public function shippedOrders(){
        $orders = Order::where('status', 'shipped')->orderBy('id', 'DESC')->get();
        return view('backend.orders.shipped_orders', compact('orders'));
    }

    /**
     * delivered Orders List
     */
    public function deliveredOrders(){
        $orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders', compact('orders'));
    }

      /**
     * cancel Orders List
     */
    public function cancelOrders(){
        $orders = Order::where('status', 'cancel')->orderBy('id', 'DESC')->get();
        return view('backend.orders.cancel_orders', compact('orders'));
    }



    public function PendingToConfirm($order_id){
   
        Order::findOrFail($order_id)->update(['status' => 'confirm']);
  
        $notification = array(
              'message' => 'Order Confirm Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('pending-orders')->with($notification);
  
  
      } // end method
  
  
  
  
  
      public function ConfirmToProcessing($order_id){
     
        Order::findOrFail($order_id)->update(['status' => 'processing']);
  
        $notification = array(
              'message' => 'Order Processing Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('confirmed.orders')->with($notification);
  
  
      } // end method
  
  
  
        public function ProcessingToPicked($order_id){
     
        Order::findOrFail($order_id)->update(['status' => 'picked']);
  
        $notification = array(
              'message' => 'Order Picked Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('processing.orders')->with($notification);
  
  
      } // end method
  
  
       public function PickedToShipped($order_id){
     
        Order::findOrFail($order_id)->update(['status' => 'shipped']);
  
        $notification = array(
              'message' => 'Order Shipped Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('picked.orders')->with($notification);
  
  
      } // end method

  
  
       public function ShippedToDelivered($order_id){
  
       $product = OrderItem::where('order_id',$order_id)->get();
       foreach ($product as $item) {
           Product::where('id',$item->product_id)
                   ->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
       } 
   
        Order::findOrFail($order_id)->update(['status' => 'delivered']);
  
        $notification = array(
              'message' => 'Order Delivered Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('shipped.orders')->with($notification);
  
  
      } // end method

  
      public function deliveredToCancel($order_id){
     
        Order::findOrFail($order_id)->update(['status' => 'cancel']);
  
        $notification = array(
              'message' => 'Order Cancel Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('delivered.orders')->with($notification);
  
  
      } // end method
}
