<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
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
     * Category update
     */
    public function categoryUpdate( Request $request ) {

        $category_id = $request->id;

        Category::findOrFail( $category_id )->update( [
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en' => strtolower( str_replace( ' ', '-', $request->category_name_en ) ),
            'category_slug_ar' => strtolower( str_replace( ' ', '-', $request->category_name_ar ) ),
            'category_icon'    => $request->category_icon,
        ] );

        $notification = [
            'message'    => 'Category Updated Successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route( 'all.category' )->with( $notification );

    }

    /**
     * Category Delete
     */
    public function categoryDelete( $id ) {

        Category::findOrFail( $id )->delete();

        $notification = [
            'message'    => 'Category Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with( $notification );

    }
}
