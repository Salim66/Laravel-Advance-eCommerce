<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    /**
     * Contact Info view page
     */
    public function contactInfoView(){
        $contact_info = ContactInfo::latest()->get();
        return view('backend.settings.contact-info.contact_view', compact('contact_info'));
    }

    /**
     * Contact Info store
     */
    public function contactInfoStore(Request $request){

        // Validation
        $request->validate([
            'address' => 'required',
            'cell_number' => 'required',
            'email_address' => 'required',
            'google_address_map_link' => 'required'
        ]);

        ContactInfo::create([
            'address' => $request->address,
            'cell_number' => $request->cell_number,
            'email_address' => $request->email_address,
            'google_address_map_link' => $request->google_address_map_link,
        ]);

        $notification = [
            'message' => 'Contact Info Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Contact Info edit
     */
    public function contactInfoEdit($id){
        $data = ContactInfo::findOrFail($id);
        return view('backend.settings.contact-info.contact_edit', compact('data'));
    }

    /**
     * Contact Info update
     */
    public function contactInfoUpdate(Request $request){

        $contact_id = $request->id;

        ContactInfo::findOrFail($contact_id)->update([
            'address' => $request->address,
            'cell_number' => $request->cell_number,
            'email_address' => $request->email_address,
            'google_address_map_link' => $request->google_address_map_link,
        ]);

        $notification = [
            'message' => 'Contact Info Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.contact-info')->with($notification);

    }

    /**
     * Contact Info Delete
     */
    public function contactInfoDelete($id){

        ContactInfo::findOrFail($id)->delete();

        $notification = [
            'message' => 'Contact Info Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
