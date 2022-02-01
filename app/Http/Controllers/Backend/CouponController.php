<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Coupon Page View
     */
    public function couponView(){
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('backend.coupon.coupon_view', compact('coupons'));
    }


    /**
     * Coupon Store
     */
    public function couponStore(Request $request){

        // Validation
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required'
        ]);

        Coupon::create([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at'    => Carbon::now()
        ]);

        $notification = [
            'message' => 'Coupon Added Successfully',
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
