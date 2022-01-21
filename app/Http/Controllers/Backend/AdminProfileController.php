<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    /**
     * Admin profile view
     */
    public function adminProfile(){
        $data = Admin::find(1);
        return view('admin.admin_profile_view', compact('data'));
    }


    /**
     * Admin profile edit
     */
    public function adminProfileEdit(){
        $data = Admin::find(1);
        return view('admin.admin_profile_edit', compact('data'));
    }

    /**
     * Admin profile update
     */
    public function adminProfileUpdate(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        // image upload
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi') . $file -> getClientOriginalName();
            $file->move(public_path('upload/admin_images/'), $filename);
            if(file_exists('upload/admin_images/'.$data->profile_photo_path) && !empty($data->profile_photo_path)){
                unlink('upload/admin_images/'.$data->profile_photo_path);
            }
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        return redirect()->route('admin.profile');
    }

}
