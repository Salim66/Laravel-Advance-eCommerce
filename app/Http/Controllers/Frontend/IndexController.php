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
}
