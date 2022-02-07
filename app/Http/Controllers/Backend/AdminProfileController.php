<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $notification = [
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.profile')->with($notification);
    }


    /**
     * Admin change password view
     */
    public function adminChangePassword(){
        return view('admin.admin_change_password');
    }


    /**
     * Admin update change password
     */
    public function adminUpdateChnagePassword(Request $request){

        // Validate input field
        $this->validate($request, [
            'current_password'  => 'required',
            'password'  => 'required|confirmed'
        ]);

        $hashedPassword = Admin::find(1)->password;
        if(Hash::check( $request->current_password, $hashedPassword)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else {
            return redirect()->back();
        }

    }


    /**
     * All Users View
     */
    public function allUserView(){
        $users = User::latest()->get();
        return view('backend.user.all_user', compact('users'));
    }

}
