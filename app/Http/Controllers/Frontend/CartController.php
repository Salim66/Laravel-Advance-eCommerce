<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\ShipDivision;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Add To Cart Store
     */
    public function addToCart(Request $request, $id){

        if(Session::has('coupon')){
            Session::forget('coupon');
        }

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


    /**
     * Apply Coupon
     */
    public function applyCoupon(Request $request){

        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();

        if($coupon){

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'coupon_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount / 100)),
            ]);

            return response()->json([
                'validity'=> true,
                'success' => 'Coupon Applied Successfully',

            ]);

        }else {

            return response()->json(['error' => 'Invaild Coupon']);

        }

    }


    /**
     * Coupon Calculation
     */
    public function couponCalculation(){

        if(Session::has('coupon')){
            return response()->json([
                'subtotal' => Cart::total(),
                'coupon_name'   => session()->get('coupon')['coupon_name'],
                'coupon_discount'   => session()->get('coupon')['coupon_discount'],
                'coupon_amount'   => session()->get('coupon')['coupon_amount'],
                'total_amount'   => session()->get('coupon')['total_amount'],
            ]);
        }else {
            return response()->json([
                'total' => Cart::total(),
            ]);
        }

    }


    /**
     * Coupon Remove
     */
    public function couponRemove(){

        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);

    }


    /**
     * Checkout Page
     */
    public function checkoutCreate(){

        if(Auth::check()){

            if(Cart::total() > 0){

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();

                return view('frontend.checkout.checkout_view', compact('carts', 'cartQty', 'cartTotal', 'divisions'));

            }else {

                $notification = [
                    'message' => 'Shopping At List One Product',
                    'alert-type' => 'error'
                ];

                return redirect()->to('/')->with($notification);

            }


        }else {

            $notification = [
                'message' => 'At First Login Your Account',
                'alert-type' => 'error'
            ];

            return redirect()->route('login')->with($notification);

        }

    }



}
