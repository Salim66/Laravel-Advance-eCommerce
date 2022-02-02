<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;
use Image;

class LogoController extends Controller
{
    /**
     * Logo view page
     */
    public function logoView(){
        $logos = Logo::latest()->get();
        return view('backend.settings.logo.logo_view', compact('logos'));
    }

    /**
     * Logo store
     */
    public function logoStore(Request $request){

        // Validation
        $request->validate([
            'logo' => 'required'
        ]);

        $image = $request->file('logo');
        $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(103, 34)->save('upload/logo/'. $name_gen);
        $save_url = 'upload/logo/'.$name_gen;

        Logo::create([
            'logo'   => $save_url,
            'footer_descp_en'   => $request->footer_descp_en,
            'footer_descp_ar'   => $request->footer_descp_ar,
        ]);

        $notification = [
            'message' => 'Logo Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Logo edit
     */
    public function logoEdit($id){
        $data = Logo::findOrFail($id);
        return view('backend.settings.logo.logo_edit', compact('data'));
    }

    /**
     * Logo update
     */
    public function logoUpdate(Request $request){

        $logo_id = $request->id;
        $old_logo = $request->old_logo;

        $save_url = '';
        if($request->file('logo')){
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(103, 34)->save('upload/logo/'. $name_gen);
            $save_url = 'upload/logo/'.$name_gen;
            if(file_exists($old_logo) && !empty($old_logo)){
                unlink($old_logo);
            }
        }else {
            $save_url = $old_logo;
        }

        Logo::findOrFail($logo_id)->update([
            'logo'   => $save_url,
            'footer_descp_en'   => $request->footer_descp_en,
            'footer_descp_ar'   => $request->footer_descp_ar,
        ]);

        $notification = [
            'message' => 'Logo Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.logo')->with($notification);

    }

    /**
     * Logo Delete
     */
    public function logoDelete($id){
        $data = Logo::findOrFail($id);

        if(file_exists($data->logo) && !empty($data->logo)){
            unlink($data->logo);
        }

        $data->delete();

        $notification = [
            'message' => 'Logo Deleted Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);

    }
}
