<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    /**
     * Home page load
     */
    public function index() {
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        $featureds = Product::where('status', 1)->where('featured', 1)->orderBy('id', 'DESC')->limit(8)->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('frontend.index', compact('categories', 'products', 'featureds'));
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

    /**
     * User passwored update
     */
    public function userPasswordUpdate(Request $request){

         // Validate input field
         $this->validate($request, [
            'current_password'  => 'required',
            'password'  => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check( $request->current_password, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else {
            return redirect()->back();
        }

    }

    /**
     * Product Details page
     */
    public function productDetails($id, $slug){
        $product = Product::findOrFail($id);
        $multiple_img = MultiImg::where('product_id', $product->id)->get();
        return view('frontend.product.product_details', compact('product', 'multiple_img'));
    }

}
