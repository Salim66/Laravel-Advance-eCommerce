<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Category view page
     */
    public function categoryView(){
        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }

    /**
     * Category store
     */
    public function categoryStore(Request $request){

        // Validation
        $request->validate([
            'category_name_en' => 'required',
            'category_name_ar' => 'required',
            'category_icon' => 'required'
        ],
        [
            'category_name_en.required' => 'The category name english is required!',
            'category_name_ar.required' => 'The category name arabic is required!'
        ]);

        Category::create([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_ar' => strtolower(str_replace(' ', '-', $request->category_name_ar)),
            'category_icon'    => $request->category_icon
        ]);

        $notification = [
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Category edit
     */
    public function categoryEdit($id){
        $data = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('data'));
    }

    /**
     * Category update
     */
    public function categoryUpdate(Request $request){

        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_ar' => strtolower(str_replace(' ', '-', $request->category_name_ar)),
            'category_icon'    => $request->category_icon
        ]);

        $notification = [
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('all.category')->with($notification);

    }

    /**
     * Brand Delete
     */
    public function brnadDelete($id){
        $data = Brand::findOrFail($id);

        if(file_exists($data->brand_image) && !empty($data->brand_image)){
            unlink($data->brand_image);
        }

        $data->delete();

        $notification = [
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);

    }

}
