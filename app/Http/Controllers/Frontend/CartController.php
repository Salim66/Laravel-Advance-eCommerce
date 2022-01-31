<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

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
            'name' => $product->product_name_en,
            'qty' => $request->quantity, 
            'price' => $price, 
            'weight' => 1, 
            'options' => [
                'image' => $product->product_thumbnail,
                'name_ar' => $product->product_name_ar,
                'color_en' => $request->color_en,
                'color_ar' => $request->color_ar,
                'size_en' => $request->size_en,
                'size_ar' => $request->size_ar,
            ]
        ]);

        return response()->json(['success' => 'Successfully Added On Your Cart']);
    }


    /**
     * Add to Mini Cart
     */
    public function addToMiniCart(){

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json([
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal
        ]);

    }


    /**
     * Remove Product Form mini Cart
     */
    public function removeProductMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From Cart']);
    }


    /**
     * Product Add to Wishlist
     */
    public function productAddToWishlist(Request $request, $product_id){

        if(Auth::check()){

            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if(!$exists){

                Wishlist::create([
                    'user_id'    => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
    
                return response()->json(['success' => 'Successfully Added On Your Wishlist']); 

            }else {

                return response()->json(['error' => 'This Product has Already On Your Wishlist']);

            }
            

        }else {

            return response()->json(['error' => 'At First Login Your Account']); 

        }

    }



}
