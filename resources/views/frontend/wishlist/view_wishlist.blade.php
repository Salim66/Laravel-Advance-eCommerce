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
          <h2>@if(session()->get('language') == 'arabic') قائمة الرغبات @else Wishlist @endif</h2>
          <a href="{{ url('/') }}" class="btn main-btn main-btn-secondary m-0">Back To Shop</a>
       </div>
       <div class="cart-table">
          <table>
             <thead>
                <tr>
                   <th> @if(session()->get('language') == 'arabic') إبهام المنتج  @else Product Thumb @endif </th>
                   <th>@if(session()->get('language') == 'arabic') اسم المنتج @else Product Name @endif </th>
                   <th>@if(session()->get('language') == 'arabic') السعر @else Price @endif </th>
                   <th>@if(session()->get('language') == 'arabic') إضافة عربة @else Add Cart @endif </th>
                   <th>@if(session()->get('language') == 'arabic') إزالة @else Remove @endif </th>
                </tr>
             </thead>
             <tbody id="wishlist">
                

             </tbody>
          </table>
       </div>
       <div class="row justify-content-between mt-30">
          <div class="col-sm-6 col-md-7 col-lg-6 pb-30">
             <div class="section-button-group">
                <a href="{{ url('/') }}" class="btn main-btn main-btn-secondary"> @if(session()->get('language') == 'arabic') قائمة التحديث  @else Update List @endif </a>
                <a href="cart.html" class="btn main-btn main-btn-secondary coupon-btn">@if(session()->get('language') == 'arabic') عرض عربة التسوق @else View Cart @endif</a>
             </div>
          </div>
       </div>
    </div>
</section>
 



 @endsection
