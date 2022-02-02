<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Terms;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    /**
     * Terms view page
     */
    public function termsView(){
        $terms = Terms::latest()->get();
        return view('backend.pages.terms.terms_view', compact('terms'));
    }

    /**
     * Terms store
     */
    public function termsStore(Request $request){

        // Validation
        $request->validate([
            'terms_descp_en' => 'required',
            'terms_descp_ar' => 'required',
        ]);


        Terms::create([
            'terms_descp_en'   => $request->terms_descp_en,
            'terms_descp_ar'   => $request->terms_descp_ar,
        ]);

        $notification = [
            'message' => 'Terms Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Terms edit
     */
    public function termsEdit($id){
        $data = Terms::findOrFail($id);
        return view('backend.pages.terms.terms_edit', compact('data'));
    }

    /**
     * Terms update
     */
    public function termsUpdate(Request $request){

        $terms_id = $request->id;

        Terms::findOrFail($terms_id)->update([
            'terms_descp_en'   => $request->terms_descp_en,
            'terms_descp_ar'   => $request->terms_descp_ar,
        ]);

        $notification = [
            'message' => 'Terms Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.terms')->with($notification);

    }

    /**
     * Terms Delete
     */
    public function termsDelete($id){

        Terms::findOrFail($id)->delete();

        $notification = [
            'message' => 'Terms Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
