<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Add To Cart Store
     */
    public function addToCart(Request $request, $id){
        $product = Product::findOrFail($id);

        $price = 0;
        if($product->discount_price == NULL){
            $price = $product->selling_price;
        }else {
            $price = $product->discount_price;
        }
        
        Cart::add([
            'id' => $id, 
            'name' => $request->product_name_en,
            'qty' => $request->quantity, 
            'price' => $price, 
            'weight' => 1, 
            'options' => [
                'image' => $product->product_thumbnail,
                'name_ar' => $request->product_name_ar,
                'color_en' => $request->color_en,
                'color_ar' => $request->color_ar,
                'size_en' => $request->size_en,
                'size_ar' => $request->size_ar,
            ]
        ]);

        return response()->json(['success' => 'Successfully Added On Your Cart']);
    }

}
