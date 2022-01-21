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

}
