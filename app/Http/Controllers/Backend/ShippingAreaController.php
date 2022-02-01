<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;

class ShippingAreaController extends Controller
{
    /////////////////////// Start Division Method //////////////////////
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
    /////////////////////// End Division Method //////////////////////


    /////////////////////// Start District Method //////////////////////
    /**
     * District Page View
     */
    public function districtView(){
        $divisions = ShipDivision::orderBy('id', 'DESC')->get();
        $districts = ShipDistrict::with('division')->orderBy('id', 'DESC')->get();
        return view('backend.ship.district.view_district', compact('districts','divisions'));
    }


    /**
     * District Store
     */
    public function districtStore(Request $request){

        // Validation
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);

        ShipDistrict::create([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at'    => Carbon::now()
        ]);

        $notification = [
            'message' => 'District Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * District Edit Page
     */
    public function districtEdit($id){
        $divisions = ShipDivision::orderBy('id', 'DESC')->get();
        $data = ShipDistrict::findOrFail($id);
        return view('backend.ship.district.edit_district', compact('data', 'divisions'));
    }

    /**
     * District Update
     */
    public function districtUpdate(Request $request){

        $district_id = $request->id;

        ShipDistrict::findOrFail($district_id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at'    => Carbon::now()
        ]);

        $notification = [
            'message' => 'District Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.district')->with($notification);

    }

    /**
     * District Delete
     */
    public function districtDelete($id){

        ShipDistrict::findOrFail($id)->delete();

        $notification = [
            'message' => 'District Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
    /////////////////////// End District Method //////////////////////
}
