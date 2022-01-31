<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    /**
     * Wishlist Page
     */
    public function wishlist(){
        $wishlists = Wishlist::all();
        return view('frontend.wishlist.view_wishlist', compact('wishlists'));

    }
}
