@extends('frontend.partial_master')

@section('title')
Wishlist Page
@endsection

@section('partial_content')

<header class="header header-page-bg">
    <div class="container">
       <div class="header-page-content">
          <div class="row align-items-center">
             <div class="col-md-7">
                <div class="header-content">
                   <h1>@if(session()->get('language') == 'arabic') قائمة الرغبات @else Wishlist @endif</h1>
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{ url('/') }}">@if(session()->get('language') == 'arabic') مسكن @else Home @endif</a></li>
                         <li class="breadcrumb-item"><a href="{{ url('/') }}">@if(session()->get('language') == 'arabic') محلات @else Shops @endif</a></li>
                         <li class="breadcrumb-item active" aria-current="page">@if(session()->get('language') == 'arabic') قائمة الرغبات @else Wishlist @endif</li>
                      </ol>
                   </nav>
                </div>
             </div>
             <div class="col-md-5 d-none d-md-block">
                <div class="header-content-image header-content-abs-image header-content-abs-image-lg">
                   <img src="{{ URL::to('frontend/') }}/assets/images/inner-page-header/page-5.png" alt="page">
                </div>
             </div>
          </div>
       </div>
    </div>
</header>

<section class="cart-section pt-100 pb-70">
    <div class="container">
       <div class="product-info-header product-info-header-three product-info-header-borderless">
          <h2>Wishlist</h2>
          <a href="shops-grid.html" class="btn main-btn main-btn-secondary m-0">Back To Shop</a>
       </div>
       <div class="cart-table">
          <table>
             <thead>
                <tr>
                   <th>Product Thumb</th>
                   <th>Product Name</th>
                   <th>Price</th>
                   <th>Quantity</th>
                   <th>Add Cart</th>
                   <th>Remove</th>
                </tr>
             </thead>
             <tbody>
                <tr>
                   <td>
                      <div class="product-table-thumb">
                         <img src="assets/images/products/product-14.png" alt="product">
                      </div>
                   </td>
                   <td>Comfortable Bed for sale</td>
                   <td class="color-secondary">$1100.0</td>
                   <td>
                      <div class="cart-quantity">
                         <button class="qu-btn dec">-</button>
                         <input type="text" class="qu-input" value="2">
                         <button class="qu-btn inc">+</button>
                      </div>
                   </td>
                   <td>
                      <a href="#" class="btn main-btn main-btn-secondary">Add To Cart</a>
                   </td>
                   <td class="cancel">
                      <a href="#"><i class="flaticon-delete"></i></a>
                   </td>
                </tr>
                <tr>
                   <td>
                      <div class="product-table-thumb">
                         <img src="assets/images/products/product-2.png" alt="product">
                      </div>
                   </td>
                   <td>Stylish Chair</td>
                   <td class="color-secondary">$300.0</td>
                   <td>
                      <div class="cart-quantity">
                         <button class="qu-btn dec">-</button>
                         <input type="text" class="qu-input" value="1">
                         <button class="qu-btn inc">+</button>
                      </div>
                   </td>
                   <td>
                      <a href="#" class="btn main-btn main-btn-secondary">Add To Cart</a>
                   </td>
                   <td class="cancel">
                      <a href="#"><i class="flaticon-delete"></i></a>
                   </td>
                </tr>
             </tbody>
          </table>
       </div>
       <div class="row justify-content-between mt-30">
          <div class="col-sm-6 col-md-7 col-lg-6 pb-30">
             <div class="section-button-group">
                <a href="wishlist.html" class="btn main-btn main-btn-secondary">Update List</a>
                <a href="cart.html" class="btn main-btn main-btn-secondary coupon-btn">View Cart</a>
             </div>
          </div>
       </div>
    </div>
</section>
 



 @endsection
