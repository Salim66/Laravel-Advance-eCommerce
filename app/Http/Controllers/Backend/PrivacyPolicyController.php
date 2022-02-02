<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * Privacy Policy view page
     */
    public function privacyPolicyView(){
        $polices = PrivacyPolicy::latest()->get();
        return view('backend.pages.privacy-policy.privacy_view', compact('polices'));
    }

    /**
     * Privacy Policy store
     */
    public function privacyPolicyStore(Request $request){

        // Validation
        $request->validate([
            'privacy_descp_en' => 'required',
            'privacy_descp_ar' => 'required',
        ]);


        PrivacyPolicy::create([
            'privacy_descp_en'   => $request->privacy_descp_en,
            'privacy_descp_ar'   => $request->privacy_descp_ar,
        ]);

        $notification = [
            'message' => 'Privacy Policy Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Privacy Policy edit
     */
    public function privacyPolicyEdit($id){
        $data = PrivacyPolicy::findOrFail($id);
        return view('backend.pages.privacy-policy.privacy_edit', compact('data'));
    }

    /**
     * Privacy Policy update
     */
    public function privacyPolicyUpdate(Request $request){

        $privacy_id = $request->id;

        PrivacyPolicy::findOrFail($privacy_id)->update([
            'privacy_descp_en'   => $request->privacy_descp_en,
            'privacy_descp_ar'   => $request->privacy_descp_ar,
        ]);

        $notification = [
            'message' => 'Privacy Policy Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.privacy-policy')->with($notification);

    }

    /**
     * Privacy Policy Delete
     */
    public function privacyPolicyDelete($id){

        PrivacyPolicy::findOrFail($id)->delete();

        $notification = [
            'message' => 'Privacy Policy Deleted Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);

    }
}
