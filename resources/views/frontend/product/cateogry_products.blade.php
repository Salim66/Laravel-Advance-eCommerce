@extends('frontend.partial_master')

@section('title')
Category Products - {{ $category->category_name_en }}
@endsection

@section('partial_content')
<header class="header header-page-bg">
    <div class="container">
       <div class="header-page-content">
          <div class="row align-items-center">
             <div class="col-md-7">
                <div class="header-content">
                   <h1>
                       @if(session()->get('language') == 'arabic') فئة @else Category @endif 
                    </h1>
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{ url('/') }}">@if(session()->get('language') == 'arabic') مسكن @else Home @endif</a></li>
                         <li class="breadcrumb-item active" aria-current="page">@if(session()->get('language') == 'arabic') فئة @else Category @endif</li>
                      </ol>
                   </nav>
                </div>
             </div>
             <div class="col-md-5 d-none d-md-block">
                <div class="header-content-image header-content-abs-image header-content-abs-image-lg">
                   <img src="{{ URL::to('frontend/assets/images/inner-page-header/page-3.png') }}" alt="page">
                </div>
             </div>
          </div>
       </div>
    </div>
 </header>
 <section class="product-section pt-100 pb-100">
    <div class="container">
       <div class="product-header">
          <div class="result-block product-header-item m-auto mb-5">
             <h2>
                @if(session()->get('language') == 'arabic') منتجاتنا @else Our Products @endif 
             </h2>
          </div>
       </div>
       <div class="product-all-gallery">
          <div class="row">

            @foreach($products as $product)
             <div class="col-sm-6 col-lg-3 pb-30 product-all-item">
                <div class="product-card-two product-card-two-secondcolor">
                   <div class="product-card-thumb">
                      <a href="{{ url('/product/detials/'. $product->id .'/'. $product->product_slug_en) }}">
                            <img src="{{ URL::to($product->product_thumbnail) }}" alt="product">
                      </a>
                      <ul class="product-card-action">
                         <li>
                            <a href="#">
                            <i class="flaticon-shopping-cart"></i>
                            </a>
                         </li>
                         <li>
                            <a href="#" class="quick-view-trigger">
                            <i class="flaticon-visibility"></i>
                            </a>
                         </li>
                         <li>
                            <a href="#">
                            <i class="flaticon-like"></i>
                            </a>
                         </li>
                      </ul>
                   </div>
                   <div class="product-card-content">
                      <h3>
                        <a href="{{ url('/product/detials/'. $product->id .'/'. $product->product_slug_en) }}">
                            @if(session()->get('language') == 'arabic')
                            {{ $product->product_name_ar }}
                            @else
                            {{ $product->product_name_en }}
                            @endif
                         </a>
                      </h3>
                      <p class="product-id">{{ $product->product_code }}</p>
                      @if($product->discount_price == NULL)
                      <div class="product-price">${{ $product->selling_price }}</div>
                      @else
                      <div class="product-price">${{ $product->discount_price }} <del>${{ $product->selling_price }}</del></div>
                      @endif
                   </div>
                   @php
                   $amount = $product->selling_price - $product->discount_price;
                   $discount = round(($amount/$product->selling_price)*100);
                  @endphp
                   @if($product->discount_price == NULL)
                    <div class="product-status product-status-purple">@if(session()->get('language') == 'arabic') جديد  @else New @endif</div>
                    @else
                    <div class="product-status">{{ $discount }}%</div>
                    @endif
                </div>
             </div>
            @endforeach 
     


          </div>
       </div>
       <div class="text-center load-more">
          <button class="btn main-btn main-btn-secondary load-more-btn">
          <i class="flaticon-loading"></i>
          Load More
          </button>
       </div>
    </div>
 </section>

@endsection