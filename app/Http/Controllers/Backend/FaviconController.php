<?php

namespace App\Http\Controllers\Backend;

use Image;
use App\Models\Favicon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaviconController extends Controller
{
    /**
     * Favicon view page
     */
    public function faviconView(){
        $favicons = Favicon::latest()->get();
        return view('backend.settings.favicon.favicon_view', compact('favicons'));
    }

    /**
     * Favicon store
     */
    public function faviconStore(Request $request){

        // Validation
        $request->validate([
            'favicon' => 'required'
        ]);

        $image = $request->file('favicon');
        $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(100, 100)->save('upload/favicon/'. $name_gen);
        $save_url = 'upload/favicon/'.$name_gen;

        Favicon::create([
            'favicon'   => $save_url
        ]);

        $notification = [
            'message' => 'Favicon Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Favicon edit
     */
    public function faviconEdit($id){
        $data = Favicon::findOrFail($id);
        return view('backend.settings.favicon.favicon_edit', compact('data'));
    }

    /**
     * Favicon update
     */
    public function faviconUpdate(Request $request){

        $favicon_id = $request->id;
        $old_favicon = $request->old_favicon;

        $save_url = '';
        if($request->file('favicon')){
            $image = $request->file('favicon');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(100, 100)->save('upload/favicon/'. $name_gen);
            $save_url = 'upload/favicon/'.$name_gen;
            if(file_exists($old_favicon) && !empty($old_favicon)){
                unlink($old_favicon);
            }
        }else {
            $save_url = $old_favicon;
        }

        Favicon::findOrFail($favicon_id)->update([
            'favicon'   => $save_url
        ]);

        $notification = [
            'message' => 'Favicon Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.favicon')->with($notification);

    }

    /**
     * Favicon Delete
     */
    public function faviconDelete($id){
        $data = Favicon::findOrFail($id);

        if(file_exists($data->favicon) && !empty($data->favicon)){
            unlink($data->favicon);
        }

        $data->delete();

        $notification = [
            'message' => 'Favicon Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
