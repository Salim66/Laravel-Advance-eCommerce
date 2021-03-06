<?php

namespace App\Http\Controllers\Backend;

use Image;
use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Add product
     */
    public function addProduct(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('backend.product.add_product', compact('categories', 'brands'));
    }

    /**
     * Store product
     */
    public function productStore(Request $request){

        // Validation
        $request->validate([
            'category_id' => 'required',
            'product_name_en' => 'required',
            'product_name_ar' => 'required',
            'product_qty' => 'required',
            'selling_price' => 'required',
            'product_thumbnail' => 'required',
            'multiple_img' => 'required',
            'short_descp_en' => 'required',
            'short_descp_ar' => 'required',
        ]);

        // Product Thumbnail Image
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(550, 600)->save('upload/products/thumbnail/'. $name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

        //store product
        $product = Product::create([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ar' => $request->product_name_ar,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_ar' => strtolower(str_replace(' ', '-', $request->product_name_ar)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_size_en' => $request->product_size_en,
            'product_size_ar' => $request->product_size_ar,
            'product_color_en' => $request->product_color_en,
            'product_color_ar' => $request->product_color_ar,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'product_thumbnail' => $save_url,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ar' => $request->short_descp_ar,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ar' => $request->long_descp_ar,
            'specifications_en' => $request->specifications_en,
            'specifications_ar' => $request->specifications_ar,
            'best_selles' => $request->best_selles,
            'new_arrivals' => $request->new_arrivals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        /////////////////////// Product Multiple Image Store ////////////////////////
        $images = $request->file('multiple_img');
        foreach($images as $img){
            $make_name = hexdec(uniqid()).'.'. $img->getClientOriginalExtension();
            Image::make($img)->resize(550, 600)->save('upload/products/multi-img/'. $make_name);
            $upload_path = 'upload/products/multi-img/'.$make_name;

            MultiImg::create([
                'product_id' => $product->id,
                'photo_name' => $upload_path,
                'created_at' => Carbon::now(),
            ]);

        }

        $notification = [
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('manage.product')->with($notification);

    }

    /**
     * Product view
     */
    public function productManage(){
        $products = Product::latest()->get();
        return view('backend.product.view_product', compact('products'));
    }

    /**
     * Product view
     */
    public function productView($id){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id);
        $multiple_imags = MultiImg::where('product_id', $id)->get();
        return view('backend.product.single_product', compact('brands', 'categories', 'subcategories', 'subsubcategories', 'product', 'multiple_imags'));
    }

    /**
     * Product edit
     */
    public function productEdit($id){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id);
        $multiple_imags = MultiImg::where('product_id', $id)->get();
        return view('backend.product.edit_product', compact('brands', 'categories', 'subcategories', 'subsubcategories', 'product', 'multiple_imags'));
    }

    /**
     * Product delete
     */
    public function productUpdate(Request $request){
        $product_id = $request->id;

        //update product
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ar' => $request->product_name_ar,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_ar' => strtolower(str_replace(' ', '-', $request->product_name_ar)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_size_en' => $request->product_size_en,
            'product_size_ar' => $request->product_size_ar,
            'product_color_en' => $request->product_color_en,
            'product_color_ar' => $request->product_color_ar,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ar' => $request->short_descp_ar,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ar' => $request->long_descp_ar,
            'specifications_en' => $request->specifications_en,
            'specifications_ar' => $request->specifications_ar,
            'best_selles' => $request->best_selles,
            'new_arrivals' => $request->new_arrivals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.product')->with($notification);

    }

    /**
     * Product Multi Image update
     */
    public function productImageUpdate(Request $request){
        $imags = $request->multiple_img;

        foreach($imags as $id => $img){
            $delete_img = MultiImg::findOrFail($id);
            if(file_exists($delete_img->photo_name) && !empty($delete_img->photo_name)){
                unlink($delete_img->photo_name);
            }
            $make_name = hexdec(uniqid()).'.'. $img->getClientOriginalExtension();
            Image::make($img)->resize(550, 600)->save('upload/products/multi-img/'. $make_name);
            $upload_path = 'upload/products/multi-img/'.$make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $upload_path,
                'updated_at' => Carbon::now(),
            ]);

        }

        $notification = [
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Product Thumbnail Image Update
     */
    public function productThumbnailImageUpdate(Request $request){

        $pro_id = $request->id;
        $old_image = $request->old_image;

        if(file_exists($old_image) && !empty($old_image)){
            unlink($old_image);
        }

        // Product Thumbnail Image
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(550, 600)->save('upload/products/thumbnail/'. $name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Product Thumbnail Image Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Product Multiple Image delete
     */
    public function productImageDelete($id){

        $multi_img = MultiImg::findOrFail($id);
        if(file_exists($multi_img->photo_name) && !empty($multi_img->photo_name)){
            unlink($multi_img->photo_name);
        }
        MultiImg::findOrFail($id)->delete();

        $notification = [
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Product Inactive
     */
    public function productInactive($id){

        Product::findOrFail($id)->update(['status' => 0]);

        $notification = [
            'message' => 'Product Inactive Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Product Active
     */
    public function productActive($id){

        Product::findOrFail($id)->update(['status' => 1]);

        $notification = [
            'message' => 'Product Active Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Delete product
     */
    public function productDelete($id){

        $product = Product::findOrFail($id);
        if(file_exists($product->product_thumbnail) && !empty($product->product_thumbnail)){
            unlink($product->product_thumbnail);
        }
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id', $id)->get();
        foreach($images as $img){
            if(file_exists($img->photo_name) && !empty($img->photo_name)){
                unlink($img->photo_name);
                MultiImg::where('product_id', $id)->delete();
            }
        }

        $notification = [
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

}
