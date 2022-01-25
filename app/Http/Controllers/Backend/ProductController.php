<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MultiImg;
use App\Models\Product;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    /**
     * Add product
     */
    public function addProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.add_product', compact('categories', 'brands'));
    }

    /**
     * Store product
     */
    public function productStore(Request $request){

        // Validation
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'product_name_en' => 'required',
            'product_name_ar' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags_en' => 'required',
            'product_tags_ar' => 'required',
            'product_size_en' => 'required',
            'product_size_ar' => 'required',
            'product_color_en' => 'required',
            'product_color_ar' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'required',
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
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ar' => $request->product_tags_ar,
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
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'best_seller' => $request->best_seller,
            'daily_sales' => $request->daily_sales,
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

        return redirect()->back()->with($notification);

    }

    /**
     * Product view
     */
    public function productManage(){
        $products = Product::latest()->get();
        return view('backend.product.view_product', compact('products'));
    }

}
