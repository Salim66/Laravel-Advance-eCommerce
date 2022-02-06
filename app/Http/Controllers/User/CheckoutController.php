<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipState;
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

    }

}
