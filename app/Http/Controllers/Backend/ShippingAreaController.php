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
     * Division Edit Page
     */
    public function divisionEdit($id){
        $data = ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division', compact('data'));
    }

    /**
     * Division Update
     */
    public function divisionUpdate(Request $request){

        $division_id = $request->id;

        ShipDivision::findOrFail($division_id)->update([
            'division_name' => $request->division_name,
            'created_at'    => Carbon::now()
        ]);

        $notification = [
            'message' => 'Division Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.division')->with($notification);

    }

    /**
     * Division Delete
     */
    public function divisionDelete($id){

        ShipDivision::findOrFail($id)->delete();

        $notification = [
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
