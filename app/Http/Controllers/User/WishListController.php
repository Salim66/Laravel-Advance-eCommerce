<?php

namespace App\Http\Controllers\User;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    /**
     * Wishlist Page
     */
    public function wishlist(){
        return view('frontend.wishlist.view_wishlist');

    }

    /**
     * Get Wishlist Product
     */
    public function getWishlistProduct(){

        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
        $count = Wishlist::count();
        return response()->json([
            'wishlist'  => $wishlist,
            'count'  => $count,
        ]);

    }


    /**
     * Remove Wishlist Proudct
     */
    public function removeWishlistProduct($id){

        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Successfully Remove Product']);

    }


}
