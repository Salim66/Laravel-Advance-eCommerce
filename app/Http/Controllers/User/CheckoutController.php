<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Get District By Ajax Request
     */
    public function getDivisionByAjax($division_id){

        $ship = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return response()->json($ship);

    }


    /**
     * Get State By Ajax Request
     */
    public function getStateByAjax($district_id){

        $ship = ShipState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
        return response()->json($ship);

    }


    /**
     * Checkout Store
     */
    public function checkoutStore(Request $request){
        // return $request->all();
        $data = [];
        $data['shipping_name']  = $request->name;
        $data['shipping_email']  = $request->email;
        $data['shipping_phone']  = $request->phone;
        $data['post_code']  = $request->post_code;
        $data['division_id']  = $request->division_id;
        $data['district_id']  = $request->district_id;
        $data['state_id']  = $request->state_id;
        $data['notes']  = $request->notes;
        $cartTotal = Cart::total();

        if($request->payment_method == 'Cash'){
            return view('frontend.payment.cash_view', compact('data', 'cartTotal'));
        }

    }

}
