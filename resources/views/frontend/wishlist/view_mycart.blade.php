@extends('frontend.partial_master')

@section('title')
My Cart Page
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
          <a href="{{ url('/') }}" class="btn main-btn main-btn-secondary m-0">@if(session()->get('language') == 'arabic') العودة للتسوق @else Back To Shop @endif</a>
       </div>
       <div class="cart-table">
          <table>
             <thead>
                <tr>
                   <th> @if(session()->get('language') == 'arabic') إبهام المنتج  @else Product Thumb @endif </th>
                   <th>@if(session()->get('language') == 'arabic') اسم المنتج @else Product Name @endif </th>
                   <th>@if(session()->get('language') == 'arabic') السعر @else Price @endif </th>
                   <th>@if(session()->get('language') == 'arabic') اللون @else Color @endif </th>
                   <th>@if(session()->get('language') == 'arabic') بحجم @else Size @endif </th>
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
                <a href="javascript:void(0)" class="btn main-btn main-btn-secondary coupon-btn">@if(session()->get('language') == 'arabic') أضف عرض @else Add Coupon @endif</a>
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

<div class="coupon-popup-wrapepr">
    <div class="newsletter-modal">
       <div class="close-btn newsletter-modal-close close-btn-secondary">
          <i class="flaticon-close"></i>
       </div>
       <div class="row align-items-center">
          <div class="col-md-6 pb-30">
             <div class="newsletter-item">
                <div class="section-title section-title-left section-title-secondary text-md-start">
                   <h2>@if(session()->get('language') == 'arabic') أضف قسيمتك هنا @else Add Your Coupon Here @endif</h2>
                </div>
                <form class="newsletter-form" method="post">
                   <div class="form-group">
                      <input type="text" id="coupon_name" placeholder="@if(session()->get('language') == 'arabic') أدخل قسيمتك @else Enter your coupon @endif" class="form-control form-control-background" required>
                      <button class="btn main-btn main-btn-secondary" onclick="applyCoupon()" type="submit">@if(session()->get('language') == 'arabic') تطبيق القسيمة @else Apply Coupon @endif</button>
                   </div>
                </form>
             </div>
          </div>
          <div class="col-md-6 pb-30 d-none d-md-block">
             <div class="newsletter-item text-center">
                <img src="{{ URL::to('/frontend/') }}/assets/images/newsletter-popup.png" alt="newsletter">
             </div>
          </div>
       </div>
    </div>
 </div>


 @endsection
