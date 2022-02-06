<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use App\Models\ReturnPolicy;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Terms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    /**
     * Home page load
     */
    public function index() {
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(12)->get();
        $best_selles = Product::where('status', 1)->where('best_selles', 1)->orderBy('id', 'DESC')->limit(8)->get();
        $new_arrivals = Product::where('status', 1)->where('new_arrivals', 1)->orderBy('id', 'DESC')->limit(8)->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $offer_products = Product::where('status', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->get();



        $category_skip_0 = Category::skip(0)->first();
        $product_category_skip_0 = Product::where('status', 1)->where('category_id', $category_skip_0->id)->limit(8)->get();
        $category_skip_1 = Category::skip(1)->first();
        $product_category_skip_1 = Product::where('status', 1)->where('category_id', $category_skip_1->id)->limit(8)->get();
        $category_skip_2 = Category::skip(2)->first();
        $product_category_skip_2 = Product::where('status', 1)->where('category_id', $category_skip_2->id)->limit(8)->get();

        return view('frontend.index', compact('categories', 'products', 'best_selles', 'new_arrivals', 'category_skip_0', 'product_category_skip_0', 'category_skip_1', 'product_category_skip_1', 'category_skip_2', 'product_category_skip_2', 'offer_products' ));
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
            $data['profile_photo_path'] = 'upload/user_images/'.$filename;
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

        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_ar = $product->product_color_ar;
        $product_color_ar = explode(',', $color_ar);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_ar = $product->product_size_ar;
        $product_size_ar = explode(',', $size_ar);

        $related_products = Product::where('status', 1)->where('category_id', $product->category_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();

        $multiple_img = MultiImg::where('product_id', $product->id)->get();
        return view('frontend.product.product_details', compact('product', 'multiple_img', 'product_color_en', 'product_color_ar', 'product_size_en', 'product_size_ar', 'related_products'));
    }

    /**
     * Category Wise Products Search
     */
    public function cateogrywiseProducts($cat_id, $slug){
        $products = Product::where('category_id', $cat_id)->where('status', 1)->orderBy('id', 'DESC')->get();
        $category = Category::findOrFail($cat_id);
        return view('frontend.product.cateogry_products', compact('products', 'category'));
    }

    /**
     * SubCategory Wise Products Search
     */
    public function subCateogrywiseProducts($subcat_id, $slug){
        $products = Product::where('subcategory_id', $subcat_id)->where('status', 1)->orderBy('id', 'DESC')->get();
        $subcategory = SubCategory::findOrFail($subcat_id);
        return view('frontend.product.subcateogry_products', compact('products', 'subcategory'));
    }

    /**
     * Sub-SubCategory Wise Products Search
     */
    public function subSubCateogrywiseProducts($subsubcat_id, $slug){
        $products = Product::where('subsubcategory_id', $subsubcat_id)->where('status', 1)->orderBy('id', 'DESC')->get();
        $subsubcategory = SubSubCategory::findOrFail($subsubcat_id);
        return view('frontend.product.subsubcateogry_products', compact('products', 'subsubcategory'));
    }

    /**
     * Product Add-To-Cart Modal Ajax
     */
    public function productAddToCartModal($id){
        $product = Product::with('category', 'brand')->findOrFail($id);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_ar = $product->product_color_ar;
        $product_color_ar = explode(',', $color_ar);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_ar = $product->product_size_ar;
        $product_size_ar = explode(',', $size_ar);

        $multiple_img = MultiImg::where('product_id', $product->id)->get();

        return response()->json([
            'product' => $product,
            'color_en' => $product_color_en,
            'color_ar' => $product_color_ar,
            'size_en' => $product_size_en,
            'size_ar' => $product_size_ar,
            'multiple_img' => $multiple_img,
        ]);
    }


    /**
     * Privacy Policy Page
     */
    public function privacyPolicyPage(){

        $privacy = PrivacyPolicy::latest()->first();
        return view('frontend.privacy-policy.privacy-policy', compact('privacy'));

    }


    /**
     * Return Policy Page
     */
    public function returnPolicyPage(){

        $return = ReturnPolicy::latest()->first();
        return view('frontend.return-policy.return-policy', compact('return'));

    }


    /**
     * Tersm & Conditions Page
     */
    public function termsConditionsPage(){

        $terms = Terms::latest()->first();
        return view('frontend.terms.terms', compact('terms'));

    }


    /**
     * Contact Us Page
     */
    public function contactUsPage(){

        // $terms = Terms::latest()->first();
        return view('frontend.contact-us.contact-us');

    }

    /**
     * Contact Us Store
     */
    public function contactUsStore(Request $request){

        // Validation
         $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $agree = false;
        if($request->agree){
            $agree = true;
        }else {
            $agree = false;
        }

        ContactUs::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'agree' => $agree,
        ]);

        $notification = [
            'message' => 'Your Message Successfully Send ):',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

}
