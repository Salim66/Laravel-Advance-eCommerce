<?php

namespace App\Http\Controllers\Backend;

use App\Models\ReturnPolicy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReturnPolicyController extends Controller
{
    /**
     * Return Policy view page
     */
    public function returnPolicyView(){
        $polices = ReturnPolicy::latest()->get();
        return view('backend.pages.return-policy.return_view', compact('polices'));
    }

    /**
     * Return Policy store
     */
    public function returnPolicyStore(Request $request){

        // Validation
        $request->validate([
            'return_policy_descp_en' => 'required',
            'return_policy_descp_ar' => 'required',
        ]);


        ReturnPolicy::create([
            'return_policy_descp_en'   => $request->return_policy_descp_en,
            'return_policy_descp_ar'   => $request->return_policy_descp_ar,
        ]);

        $notification = [
            'message' => 'Return Policy Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Return Policy edit
     */
    public function returnPolicyEdit($id){
        $data = ReturnPolicy::findOrFail($id);
        return view('backend.pages.return-policy.return_edit', compact('data'));
    }

    /**
     * Return Policy update
     */
    public function returnPolicyUpdate(Request $request){

        $return_id = $request->id;

        ReturnPolicy::findOrFail($return_id)->update([
            'return_policy_descp_en'   => $request->return_policy_descp_en,
            'return_policy_descp_ar'   => $request->return_policy_descp_ar,
        ]);

        $notification = [
            'message' => 'Return Policy Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.return-policy')->with($notification);

    }

    /**
     * Return Policy Delete
     */
    public function returnPolicyDelete($id){

        ReturnPolicy::findOrFail($id)->delete();

        $notification = [
            'message' => 'Return Policy Deleted Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);

    }
}
