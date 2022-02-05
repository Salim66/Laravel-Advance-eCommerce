<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    /**
     * My Cart Page
     */
    public function myCartPage(){
        return view('frontend.wishlist.view_mycart');
    }

    /**
     * Get My Cart
     */
    public function getMyCartProduct(){

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json([
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal
        ]);

    }

    /**
     * Revove Product From Cart
     */
    public function removeCartProduct($rowId){

        if(Session::has('coupon')){
            Session::forget('coupon');
        }

        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Remove From Cart']);

    }


    /**
     * Cart Increase
     */
    public function cartIncrease($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        if(Session::has('coupon')){

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'coupon_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount / 100)),
            ]);

            return response()->json([

                'success' => 'Coupon Applied Successfully',

            ]);

        }

        return response()->json('Increase');

    }


    /**
     * Cart Decrease
     */
    public function cartDecrease($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        if(Session::has('coupon')){

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'coupon_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount / 100)),
            ]);

            return response()->json([

                'success' => 'Coupon Applied Successfully',

            ]);

        }

        return response()->json('Decrease');

    }

}
