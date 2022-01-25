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
use App\Http\Controllers\Backend\SubCategoryController;
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




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// All Admin Routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/update', [AdminProfileController::class, 'adminProfileUpdate'])->name('admin.profile.update');
Route::get('/admin/change/password', [AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');
Route::post('/update/change/password', [AdminProfileController::class, 'adminUpdateChnagePassword'])->name('update.change.password');


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


// Admin All Brand Routes
Route::prefix('brand')->group(function(){
    Route::get('/view', [BrandController::class, 'brnadView'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'brnadStore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'brnadEdit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'brnadUpdate'])->name('brand.update');
    Route::get('/update/{id}', [BrandController::class, 'brnadDelete'])->name('brand.delete');
});

// Admin All Category Routes
Route::prefix('category')->group(function(){
    Route::get('/view', [CategoryController::class, 'categoryView'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::post('/update', [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::get('/update/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');

    // Admin All SubCategory Routes
    Route::get('/sub/view', [SubCategoryController::class, 'subCategoryView'])->name('all.subcategory');
    Route::post('/sub/store', [SubCategoryController::class, 'subCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'subCategoryEdit'])->name('subcategory.edit');
    Route::post('/sub/update', [SubCategoryController::class, 'subCategoryUpdate'])->name('subcategory.update');
    Route::get('/sub/update/{id}', [SubCategoryController::class, 'subCategoryDelete'])->name('subcategory.delete');

    // Admin All Sub->SubCategory Routes
    Route::get('/sub/sub/view', [SubCategoryController::class, 'subSubCategoryView'])->name('all.subsubcategory');
    Route::post('/sub/sub/store', [SubCategoryController::class, 'subSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'subSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/sub/sub/update', [SubCategoryController::class, 'subSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/sub/sub/update/{id}', [SubCategoryController::class, 'subSubCategoryDelete'])->name('subsubcategory.delete');
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'getSubCategory']);
    Route::get('/subsubcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'getSubSubCategory']);
});


// Admin All Product Routes
Route::prefix('product')->group(function(){
    Route::get('/add', [ProductController::class, 'addProduct'])->name('add.product');
    Route::post('/store', [ProductController::class, 'productStore'])->name('product.store');
    Route::get('/edit/{id}', [BrandController::class, 'brnadEdit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'brnadUpdate'])->name('brand.update');
    Route::get('/update/{id}', [BrandController::class, 'brnadDelete'])->name('brand.delete');
});
