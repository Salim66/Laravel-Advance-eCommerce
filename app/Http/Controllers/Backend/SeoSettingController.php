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

    /**
     * Seo Settings Update
     */
    public function seoSettingUpdate(Request $request){
        $seo_id = $request->id;

        Seo::findOrFail($seo_id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics
        ]);

        $notification = [
            'message' => 'Seo Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }
}
