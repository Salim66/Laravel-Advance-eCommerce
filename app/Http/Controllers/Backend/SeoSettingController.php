<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    /**
     * Seo Settings edit
     */
    public function seoSettings(){
        $data = Seo::findOrFail(1);
        return view('backend.settings.seo.seo_setting', compact('data'));
    }
}
