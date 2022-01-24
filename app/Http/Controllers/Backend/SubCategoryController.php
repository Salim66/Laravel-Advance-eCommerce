<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller {
    /**
     * SubCategory view page
     */
    public function subCategoryView() {
        $categories = Category::orderBy( 'category_name_en', 'ASC' )->get();
        $subcategories = SubCategory::latest()->get();
        return view( 'backend.category.sub_category_view', compact( 'subcategories', 'categories' ) );
    }

    /**
     * SubCategory store
     */
    public function subCategoryStore( Request $request ) {

        // Validation
        $request->validate( [
            'subcategory_name_en' => 'required',
            'subcategory_name_ar' => 'required',
            'category_id'         => 'required',
        ],
            [
                'subcategory_name_en.required' => 'The sub category name english is required!',
                'subcategory_name_ar.required' => 'The sub category name arabic is required!',
            ] );

        SubCategory::create( [
            'category_id'    => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en' => strtolower( str_replace( ' ', '-', $request->subcategory_name_en ) ),
            'subcategory_slug_ar' => strtolower( str_replace( ' ', '-', $request->subcategory_name_ar ) ),
        ] );

        $notification = [
            'message'    => 'SubCategory Added Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with( $notification );

    }

    /**
     * SubCategory edit
     */
    public function subCategoryEdit( $id ) {
        $categories = Category::orderBy( 'category_name_en', 'ASC' )->get();
        $data = SubCategory::findOrFail( $id );
        return view( 'backend.category.sub_category_edit', compact( 'data', 'categories' ) );
    }

    /**
     * SubCategory update
     */
    public function subCategoryUpdate( Request $request ) {

        $subcategory_id = $request->id;

        SubCategory::findOrFail( $subcategory_id )->update( [
            'category_id'    => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en' => strtolower( str_replace( ' ', '-', $request->subcategory_name_en ) ),
            'subcategory_slug_ar' => strtolower( str_replace( ' ', '-', $request->subcategory_name_ar ) ),
        ] );

        $notification = [
            'message'    => 'Sub Category Updated Successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route( 'all.subcategory' )->with( $notification );

    }

    /**
     * SubCategory Delete
     */
    public function subCategoryDelete( $id ) {

        SubCategory::findOrFail( $id )->delete();

        $notification = [
            'message'    => 'SubCategory Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with( $notification );

    }



    //////////////////////////// ALL SUB->SUBCATEGORY METHOD //////////////////////////////

    /**
     * SubSubCategory view page
     */
    public function subSubCategoryView() {
        $categories = Category::orderBy( 'category_name_en', 'ASC' )->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view( 'backend.category.sub_sub_category_view', compact( 'subsubcategories', 'categories' ) );
    }

    /**
     * Get SubCategory by ajax request
     */
    public function getSubCategory($category_id){
        $data = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return $data;
    }




}
