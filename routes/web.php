<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\WishListController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'admin', 'middleware' => 'admin:admin'], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:admin'])->group(function(){

    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');

    // All Admin Routes
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'adminProfileUpdate'])->name('admin.profile.update');
    Route::get('/admin/change/password', [AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('/update/change/password', [AdminProfileController::class, 'adminUpdateChnagePassword'])->name('update.change.password');

    // Admin All Brand Routes
    Route::prefix('brand')->group(function(){
        Route::get('/view', [BrandController::class, 'brnadView'])->name('all.brand');
        Route::post('/store', [BrandController::class, 'brnadStore'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'brnadEdit'])->name('brand.edit');
        Route::post('/update', [BrandController::class, 'brnadUpdate'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'brnadDelete'])->name('brand.delete');
    });

    // Admin All Category Routes
    Route::prefix('category')->group(function(){
        Route::get('/view', [CategoryController::class, 'categoryView'])->name('all.category');
        Route::post('/store', [CategoryController::class, 'categoryStore'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
        Route::post('/update', [CategoryController::class, 'categoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');

        // Admin All SubCategory Routes
        Route::get('/sub/view', [SubCategoryController::class, 'subCategoryView'])->name('all.subcategory');
        Route::post('/sub/store', [SubCategoryController::class, 'subCategoryStore'])->name('subcategory.store');
        Route::get('/sub/edit/{id}', [SubCategoryController::class, 'subCategoryEdit'])->name('subcategory.edit');
        Route::post('/sub/update', [SubCategoryController::class, 'subCategoryUpdate'])->name('subcategory.update');
        Route::get('/sub/delete/{id}', [SubCategoryController::class, 'subCategoryDelete'])->name('subcategory.delete');

        // Admin All Sub->SubCategory Routes
        Route::get('/sub/sub/view', [SubCategoryController::class, 'subSubCategoryView'])->name('all.subsubcategory');
        Route::post('/sub/sub/store', [SubCategoryController::class, 'subSubCategoryStore'])->name('subsubcategory.store');
        Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'subSubCategoryEdit'])->name('subsubcategory.edit');
        Route::post('/sub/sub/update', [SubCategoryController::class, 'subSubCategoryUpdate'])->name('subsubcategory.update');
        Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'subSubCategoryDelete'])->name('subsubcategory.delete');
        Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'getSubCategory']);
        Route::get('/subsubcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'getSubSubCategory']);
    });


    // Admin All Product Routes
    Route::prefix('product')->group(function(){
        Route::get('/add', [ProductController::class, 'addProduct'])->name('add.product');
        Route::post('/store', [ProductController::class, 'productStore'])->name('product.store');
        Route::get('/manage', [ProductController::class, 'productManage'])->name('manage.product');
        Route::get('/view/{id}', [ProductController::class, 'productView'])->name('product.view');
        Route::get('/edit/{id}', [ProductController::class, 'productEdit'])->name('product.edit');
        Route::post('/update', [ProductController::class, 'productUpdate'])->name('product.update');
        Route::post('/image/update', [ProductController::class, 'productImageUpdate'])->name('product.image.update');
        Route::post('/thumbnail/image/update', [ProductController::class, 'productThumbnailImageUpdate'])->name('product.thumbnail.image.update');
        Route::get('/image/delete/{id}', [ProductController::class, 'productImageDelete'])->name('delete.product.image');
        Route::get('/inactive/{id}', [ProductController::class, 'productInactive'])->name('product.inactive');
        Route::get('/active/{id}', [ProductController::class, 'productActive'])->name('product.active');
        Route::get('/delete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');
    });


    // Admin All Slider Routes
    Route::prefix('slider')->group(function(){
        Route::get('/view', [SliderController::class, 'sliderView'])->name('manage.slider');
        Route::post('/store', [SliderController::class, 'sliderStore'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'sliderEdit'])->name('slider.edit');
        Route::post('/update', [SliderController::class, 'sliderUpdate'])->name('slider.update');
        Route::get('/delete/{id}', [SliderController::class, 'sliderDelete'])->name('slider.delete');
        Route::get('/inactive/{id}', [SliderController::class, 'sliderInactive'])->name('slider.inactive');
        Route::get('/active/{id}', [SliderController::class, 'sliderActive'])->name('slider.active');
    });

});



// All User Routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $data = User::find($id);
    return view('dashboard', compact('data'));
})->name('dashboard');


Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');
Route::post('/user/profile/update', [IndexController::class, 'userProfileUpdate'])->name('user.profile.update');
Route::get('/user/change/password', [IndexController::class, 'userChangePassword'])->name('user.change.password');
Route::post('/user/password/update', [IndexController::class, 'userPasswordUpdate'])->name('user.password.update');



////////////// Frontend All Routes ///////////////

// Language All Routes
Route::get('/arabic/language', [LanguageController::class, 'arabic'])->name('arabic.language');
Route::get('/english/language', [LanguageController::class, 'english'])->name('english.language');
Route::get('/product/detials/{id}/{slug}', [IndexController::class, 'productDetails'])->name('product.details');
// Category Wise Product Search Routes
Route::get('/category/products/{cat_id}/{slug}', [IndexController::class, 'cateogrywiseProducts']);
// SubCategory Wise Product Search Routes
Route::get('/subcategory/products/{subcat_id}/{slug}', [IndexController::class, 'subCateogrywiseProducts']);
// Sub-SubCategory Wise Product Search Routes
Route::get('/subsubcategory/products/{subsubcat_id}/{slug}', [IndexController::class, 'subSubCateogrywiseProducts']);
// Product add to cart modal
Route::get('/product/add-to-cart/modal/{id}', [IndexController::class, 'productAddToCartModal']);
//Add To Cart Route
Route::post('/cart/data/store/{id}', [CartController::class, 'addToCart']);
//Add To Mini Cart Route
Route::get('/product/mini/cart', [CartController::class, 'addToMiniCart']);
//Remove Mini Cart Route
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'removeProductMiniCart']);
//Add To Wishlist Route
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'productAddToWishlist']);

// Protecd Our Page Without Login
Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function(){

    //Wishlist Page Route
    Route::get('/wishlist', [WishListController::class, 'wishlist'])->name('wishlist');
    //Get Wishlist Route
    Route::get('/get-wishlist-product', [WishListController::class, 'getWishlistProduct']);
    //Remove Wishlist Route
    Route::get('/wishlist-remove/{id}', [WishListController::class, 'removeWishlistProduct']);

    //My Cart Page Route
    Route::get('/my-cart', [CartPageController::class, 'myCartPage'])->name('my-cart');
    //Get Cart Route
    Route::get('/get-mycart-product', [CartPageController::class, 'getMyCartProduct']);
    //Remove Cart Route
    Route::get('/cart-remove/{rowId}', [CartPageController::class, 'removeCartProduct']);

});


