<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Slider view
     */
    public function sliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliders'));
    }

}
