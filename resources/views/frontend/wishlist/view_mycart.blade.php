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
                   <h1>@if(session()->get('language') == 'arabic') عربة التسوق @else Cart @endif</h1>
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{ url('/') }}">@if(session()->get('language') == 'arabic') مسكن @else Home @endif</a></li>
                         <li class="breadcrumb-item"><a href="{{ url('/') }}">@if(session()->get('language') == 'arabic') محلات @else Shops @endif</a></li>
                         <li class="breadcrumb-item active" aria-current="page">@if(session()->get('language') == 'arabic') عربة التسوق @else Cart @endif</li>
                      </ol>
                   </nav>
                </div>
             </div>
             <div class="col-md-5 d-none d-md-block">
                <div class="header-content-image header-content-abs-image header-content-abs-image-lg">
                   <img src="{{ URL::to('frontend/') }}/assets/images/inner-page-header/page-7.png" alt="page">
                </div>
             </div>
          </div>
       </div>
    </div>
</header>

<section class="cart-section pt-100 pb-70">
    <div class="container">
       <div class="product-info-header product-info-header-three product-info-header-borderless">
          <h2>@if(session()->get('language') == 'arabic') أضف إلى السلة @else Add To Cart @endif</h2>
          <a href="{{ url('/') }}" class="btn main-btn main-btn-secondary m-0">Back To Shop</a>
       </div>
       <div class="cart-table">
          <table>
             <thead>
                <tr>
                   <th> @if(session()->get('language') == 'arabic') إبهام المنتج  @else Product Thumb @endif </th>
                   <th>@if(session()->get('language') == 'arabic') اسم المنتج @else Product Name @endif </th>
                   <th>@if(session()->get('language') == 'arabic') السعر @else Price @endif </th>
                   <th>@if(session()->get('language') == 'arabic') كمية @else Quantity @endif </th>
                   <th>@if(session()->get('language') == 'arabic') مجموع @else Total @endif </th>
                   <th>@if(session()->get('language') == 'arabic') إزالة @else Remove @endif </th>
                </tr>
             </thead>
             <tbody id="mycart">
                

             </tbody>
          </table>
       </div>
       <div class="row justify-content-between mt-30">
          <div class="col-sm-6 col-md-7 col-lg-6 pb-30">
             <div class="section-button-group">
                <a href="{{ url('/') }}" class="btn main-btn main-btn-secondary"> @if(session()->get('language') == 'arabic') قائمة التحديث  @else Update List @endif </a>
                <a href="#" class="btn main-btn main-btn-secondary coupon-btn">@if(session()->get('language') == 'arabic') أضف عرض @else Add Coupon @endif</a>
             </div>
          </div>
          <div class="col-sm-6 col-md-5 col-lg-4 pb-30">
            <div class="sub-section-title">
               <h3 class="sub-section-title-heading">Total Cart</h3>
            </div>
            <div class="cart-details">
               <div class="cart-total-box cart-total-box-secondcolor">
                  <div class="cart-total-item">
                     <h4>Subtotal</h4>
                     <p>$500.0</p>
                  </div>
                  <div class="cart-total-item">
                     <h4>Vat <span>(2%)</span></h4>
                     <p>$40.0</p>
                  </div>
                  <div class="cart-total-item">
                     <h4>Total</h4>
                     <p>$540.0</p>
                  </div>
               </div>
               <div class="text-end">
                  <a href="checkout.html" class="btn main-btn main-btn-secondary">Checkout</a>
               </div>
            </div>
          </div>
       </div>
    </div>
</section>

{{-- <section class="cart-section pt-100 pb-70">
    <div class="container">
       <div class="product-info-header product-info-header-three product-info-header-borderless">
          <h2>Add To Cart</h2>
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
                   <th>Total</th>
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
                   <td class="color-secondary">$2200.0</td>
                   <td class="cancel">
                      <a href="#"><i class="flaticon-close"></i></a>
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
                   <td class="color-secondary">$300.0</td>
                   <td class="cancel">
                      <a href="#"><i class="flaticon-close"></i></a>
                   </td>
                </tr>
             </tbody>
          </table>
       </div>
       <div class="row justify-content-between mt-30">
          <div class="col-sm-6 col-md-7 col-lg-6 pb-30">
             <div class="section-button-group">
                <a href="cart.html" class="btn main-btn main-btn-secondary">Update Cart</a>
                <a href="#" class="btn main-btn main-btn-secondary coupon-btn">Add Coupon</a>
             </div>
          </div>
          <div class="col-sm-6 col-md-5 col-lg-4 pb-30">
             <div class="sub-section-title">
                <h3 class="sub-section-title-heading">Total Cart</h3>
             </div>
             <div class="cart-details">
                <div class="cart-total-box cart-total-box-secondcolor">
                   <div class="cart-total-item">
                      <h4>Subtotal</h4>
                      <p>$500.0</p>
                   </div>
                   <div class="cart-total-item">
                      <h4>Vat <span>(2%)</span></h4>
                      <p>$40.0</p>
                   </div>
                   <div class="cart-total-item">
                      <h4>Total</h4>
                      <p>$540.0</p>
                   </div>
                </div>
                <div class="text-end">
                   <a href="checkout.html" class="btn main-btn main-btn-secondary">Checkout</a>
                </div>
             </div>
          </div>
       </div>
    </div>
</section> --}}


 @endsection
