<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Social view page
     */
    public function socialView(){
        $socials = SocialMedia::latest()->get();
        return view('backend.settings.social.social_view', compact('socials'));
    }

    /**
     * Social store
     */
    public function socialStore(Request $request){

        // Validation
        $request->validate([
            'social_name' => 'required',
            'social_link' => 'required',
        ]);

        SocialMedia::create([
            'social_name' => $request->social_name,
            'social_link' => $request->social_link,
        ]);

        $notification = [
            'message' => 'Social Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Social edit
     */
    public function socialEdit($id){
        $data = SocialMedia::findOrFail($id);
        return view('backend.settings.social.social_edit', compact('data'));
    }

    /**
     * Social update
     */
    public function socialUpdate(Request $request){

        $social_id = $request->id;

        SocialMedia::findOrFail($social_id)->update([
            'social_name' => $request->social_name,
            'social_link' => $request->social_link,
        ]);

        $notification = [
            'message' => 'Social Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.social')->with($notification);

    }

    /**
     * Social Delete
     */
    public function socialDelete($id){

        SocialMedia::findOrFail($id)->delete();

        $notification = [
            'message' => 'Social Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
