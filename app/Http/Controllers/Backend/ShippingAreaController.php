<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingAreaController extends Controller
{
    /**
     * Division Page View
     */
    public function divisionView(){
        $divisions = ShipDivision::orderBy('id', 'DESC')->get();
        return view('backend.ship.division.view_division', compact('divisions'));
    }


    /**
     * Division Store
     */
    public function divisonStore(Request $request){

        // Validation
        $request->validate([
            'division_name' => 'required'
        ]);

        ShipDivision::create([
            'division_name' => $request->division_name,
            'created_at'    => Carbon::now()
        ]);

        $notification = [
            'message' => 'Division Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Coupon Edit Page
     */
    public function couponEdit($id){
        $data = Coupon::findOrFail($id);
        return view('backend.coupon.coupon_edit', compact('data'));
    }

    /**
     * Coupon Update
     */
    public function couponUpdate(Request $request){

        $coupon_id = $request->id;

        Coupon::findOrFail($coupon_id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at'    => Carbon::now()
        ]);

        $notification = [
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.coupon')->with($notification);

    }

    /**
     * Coupon Delete
     */
    public function couponDelete($id){

        Coupon::findOrFail($id)->delete();

        $notification = [
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
