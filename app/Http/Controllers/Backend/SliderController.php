<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    /**
     * Slider view
     */
    public function sliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliders'));
    }

    /**
     * Slider store
     */
    public function sliderStore(Request $request){

        // Validation
        $request->validate([
            'slider_img' => 'required'
        ],
        [
            'slider_img.required' => 'Please insert one image'
        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(550, 600)->save('upload/slider/'. $name_gen);
        $save_url = 'upload/slider/'.$name_gen;

        Slider::create([
            'slider_title_en' => $request->slider_title_en,
            'slider_title_ar' => $request->slider_title_ar,
            'slider_descp_en' => $request->slider_descp_en,
            'slider_descp_ar' => $request->slider_descp_ar,
            'slider_img'   => $save_url
        ]);

        $notification = [
            'message' => 'Slider Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

}
