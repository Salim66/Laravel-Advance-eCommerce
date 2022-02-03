<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Contact Us All Information page
     */
    public function contactUsView(){
        $contact_us = ContactUs::latest()->get();
        return view('backend.contact-us.contact_view', compact('contact_us'));
    }

    
    /**
     * Contact Us Delete
     */
    public function contactUsDelete($id){

        ContactUs::findOrFail($id)->delete();

        $notification = [
            'message' => 'Contact Us Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

}
