<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Remove From Cart']);

    }


    /**
     * Cart Increase
     */
    public function cartIncrease($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        return response()->json('increase');

    }

}