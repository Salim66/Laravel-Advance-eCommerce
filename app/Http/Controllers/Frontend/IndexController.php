<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Home page load
     */
    public function index() {
        return view('frontend.index');
    }

    /**
     * User logout
     */
    public function userLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * User profile 
     */
    public function userProfile(){
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('frontend.profile.user_profile', compact('data'));
    }

    /**
     * User profile update
     */
    public function userProfileUpdate(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        // image upload
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi') . $file -> getClientOriginalName();
            $file->move(public_path('upload/user_images/'), $filename);
            if(file_exists('upload/user_images/'.$data->profile_photo_path) && !empty($data->profile_photo_path)){
                unlink('upload/user_images/'.$data->profile_photo_path);
            }
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = [
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('dashboard')->with($notification);
    }

    /**
     * User change password
     */
    public function userChangePassword(){
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('frontend.profile.change_password', compact('data'));
    }
}
