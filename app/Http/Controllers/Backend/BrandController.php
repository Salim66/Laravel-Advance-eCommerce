<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class BrandController extends Controller
{
    /**
     * Brand view page
     */
    public function brnadView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }

    /**
     * Brand store
     */
    public function brnadStore(Request $request){

        // Validation
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_ar' => 'required',
            'brand_image' => 'required'
        ],
        [
            'brand_name_en.required' => 'The brand name english is required!',
            'brand_name_ar.required' => 'The brand name arabic is required!'
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/'. $name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::create([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_ar' => $request->brand_name_ar,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_ar' => strtolower(str_replace(' ', '-', $request->brand_name_ar)),
            'brand_image'   => $save_url
        ]);

        $notification = [
            'message' => 'Brand Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Brand edit
     */
    public function brnadEdit($id){
        $data = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('data'));
    }

    /**
     * Brand update
     */
    public function brnadUpdate(Request $request){

        $brand_id = $request->id;
        $old_image = $request->old_image;

        $save_url = '';
        if($request->file('brand_image')){
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/'. $name_gen);
            $save_url = 'upload/brand/'.$name_gen;
            if(file_exists($old_image) && !empty($old_image)){
                unlink($old_image);
            }
        }else {
            $save_url = $old_image;
        }

        Brand::findOrFail($brand_id)->update([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_ar' => $request->brand_name_ar,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_ar' => strtolower(str_replace(' ', '-', $request->brand_name_ar)),
            'brand_image'   => $save_url
        ]);

        $notification = [
            'message' => 'Brand Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('all.brand')->with($notification);

    }

}
