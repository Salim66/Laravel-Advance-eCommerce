@extends('frontend.main_master')

@section('title')
Elegant Furnitur QR
@endsection

@section('content')

@php
 $sliders = App\Models\Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
@endphp
 <header class="header header-bg-gradient overflow-hidden">
    <div class="container position-relative">
       <div class="bubble-bg-animation">
          <div class="bubble-item">
             <img src="{{ asset('frontend/assets') }}/images/bubble-bg/bubble-1.png" alt="bubble">
          </div>
          <div class="bubble-item">
             <img src="{{ asset('frontend/assets') }}/images/bubble-bg/bubble-1.png" alt="bubble">
          </div>
          <div class="bubble-item">
             <img src="{{ asset('frontend/assets') }}/images/bubble-bg/bubble-1.png" alt="bubble">
          </div>
          <div class="bubble-item">
             <img src="{{ asset('frontend/assets') }}/images/bubble-bg/bubble-1.png" alt="bubble">
          </div>
          <div class="bubble-item">
             <img src="{{ asset('frontend/assets') }}/images/bubble-bg/bubble-2.png" alt="bubble">
          </div>
       </div>
       <div class="header-bg-inner">
          <div class="header-carousel owl-carousel owl-theme default-carousel default-carousel-radius">
              @foreach($sliders as $slider)
             <div class="item">
                <div class="row align-items-center">
                   <div class="col-lg-5 pb-30">
                      <div class="header-content text-center text-lg-start">
                         <h1>
                            @if(session()->get('language') == 'arabic') 
                            {{ $slider->slider_title_ar }}
                            @else 
                            {{ $slider->slider_title_en }}
                            @endif 
                            </h1>
                         <p>
                            @if(session()->get('language') == 'arabic') 
                            {{ $slider->slider_descp_ar }}
                            @else 
                            {{ $slider->slider_descp_en }}
                            @endif  
                            </p>
                         <a href="shop-details.html" class="btn main-btn main-btn-radius">
                            @if(session()->get('language') == 'arabic') اشتري الآن @else Buy Now @endif 
                            </a>
                      </div>
                   </div>
                   <div class="offset-lg-1 col-lg-6 pb-30">
                      <div class="header-content-image">
                         <img src="{{ asset($slider->slider_img) }}" alt="product">
                      </div>
                   </div>
                </div>
             </div>
             @endforeach
          </div>
       </div>
    </div>
 </header>
<!-- End Header Home -->


<!-- Start Offer Products -->
<section class="recent-arrival pb-100">
    <div class="container">
       <div class="section-title">
          <h2>@if(session()->get('language') == 'arabic') عرض المنتج @else Offer Product @endif</h2>
       </div>
       <div class="recent-arrival-gallery">
          <div class="row">
            @foreach($offer_products as $key => $product)
             <div class="col-sm-6 col-lg-3 pb-30 recent-product-item">
                <div class="product-card-flat">
                   <div class="product-card-thumb">
                      <a href="{{ url('/product/detials/'. $product->id .'/'. $product->product_slug_en) }}">
                      <img src="{{ URL::to($product->product_thumbnail) }}" alt="product">
                      </a>
                      <ul class="product-card-action">
                         <li>
                            <a href="javascript:void(0)" class="quick-add-to-cart-trigger" id="{{ $product->id }}" onclick="productAddToCart(this.id)"> 
                            <i class="flaticon-shopping-cart"></i>
                            <span>Add Cart</span>
                            </a>
                         </li>
                         <li>
                            <a href="#" class="quick-view-trigger">
                            <i class="flaticon-visibility"></i>
                            <span>Quick View</span>
                            </a>
                         </li>
                         <li>
                            <a href="javascript:void(0)" id="{{ $product->id }}" onclick="productAddToWishlist(this.id)">
                            <i class="flaticon-like"></i>
                            <span>Add Wishlist</span>
                            </a>
                         </li>
                      </ul>
                      @php
                      $amount = $product->selling_price - $product->discount_price;
                      $discount = round(($amount/$product->selling_price)*100);
                      @endphp
                        
                      @if($product->discount_price == NULL)
                      <div class="product-status">@if(session()->get('language') == 'arabic') جديد  @else New @endif</div>
                      @else
                      <div class="product-status">{{ $discount }}%</div>
                      @endif
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
                </div>
             </div>
             @endforeach
          </div>
       </div>
       <div class="text-center load-more">
          <button class="btn main-btn main-btn-radius load-more-btn">
          <i class="flaticon-loading"></i>
          @if(session()->get('language') == 'arabic') تحميل المزيد  @else Load More @endif
          </button>
       </div>
    </div>
</section>
<!-- End Offer Products -->


<!-- Start Best Selles -->
<section class="top-rated-product-section pb-70">
    <div class="container">
       <div class="section-title">
          <h2>@if(session()->get('language') == 'arabic') أفضل البائعين @else Best Selles @endif</h2>
       </div>
       <div class="row">


        @foreach($best_selles as $product)
          <div class="col-sm-6 col-lg-3 pb-30">
             <div class="product-card-two product-card-two-thirdcolor">
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
                <div class="product-status">@if(session()->get('language') == 'arabic') جديد  @else New @endif</div>
                @else
                <div class="product-status product-status-thirdcolor">{{ $discount }}%</div>
                @endif
             </div>
          </div>
        @endforeach  


       </div>
    </div>
</section>
<!-- End Best Selles -->



<!-- Start New Arrival -->
<section class="related-product-section pb-100">
    <div class="container">
       <div class="product-info-header product-info-header-two product-info-header-borderless">
          <h2>@if(session()->get('language') == 'arabic') قادم جديد @else New Arrival @endif</h2>
          <div class="carousel-control-arrows">
             <button class="product-control-left carousel-control-arrow">
             <i class="flaticon-back"></i>
             </button>
             <button class="product-control-right carousel-control-arrow">
             <i class="flaticon-next"></i>
             </button>
          </div>
       </div>
       <div class="product-carousel owl-carousel">
        @foreach($new_arrivals as $key => $product)
          <div class="item">
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
</section>
<!-- End New Arrival -->


<!-- Start New Products -->
<section class="top-rated-product-section pb-70">
    <div class="container">
       <div class="section-title">
          <h2>@if(session()->get('language') == 'arabic') منتجات جديدة @else New Products @endif</h2>
       </div>
       <div class="row">


        @foreach($products as $product)
          <div class="col-sm-6 col-lg-3 pb-30">
             <div class="product-card-two product-card-two-thirdcolor">
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
                <div class="product-status">@if(session()->get('language') == 'arabic') جديد  @else New @endif</div>
                @else
                <div class="product-status product-status-thirdcolor">{{ $discount }}%</div>
                @endif
             </div>
          </div>
        @endforeach  


       </div>
    </div>
</section>
<!-- End New Products -->


 <!-- // Category Skip 0 -->
<section class="related-product-section pb-100">
    <div class="container">
       <div class="product-info-header product-info-header-two product-info-header-borderless">
          <h2>@if(session()->get('language') == 'arabic') {{ $category_skip_0->category_name_ar }}  @else {{ $category_skip_0->category_name_en }} @endif</h2>
          <div class="carousel-control-arrows">
             <button class="product-control-left carousel-control-arrow">
             <i class="flaticon-back"></i>
             </button>
             <button class="product-control-right carousel-control-arrow">
             <i class="flaticon-next"></i>
             </button>
          </div>
       </div>
       <div class="product-carousel owl-carousel">
        @foreach($product_category_skip_0 as $key => $product)
          <div class="item">
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
</section>

 <!-- // Category Skip 1 --}}-->
<section class="related-product-section pb-100">
    <div class="container">
       <div class="product-info-header product-info-header-two product-info-header-borderless">
          <h2>@if(session()->get('language') == 'arabic') {{ $category_skip_1->category_name_ar }}  @else {{ $category_skip_1->category_name_en }} @endif</h2>
          <div class="carousel-control-arrows">
             <button class="product-control-left carousel-control-arrow">
             <i class="flaticon-back"></i>
             </button>
             <button class="product-control-right carousel-control-arrow">
             <i class="flaticon-next"></i>
             </button>
          </div>
       </div>
       <div class="product-carousel owl-carousel">
        @foreach($product_category_skip_1 as $key => $product)
          <div class="item">
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
</section>

 <!-- // Category Skip 2 -->
<section class="related-product-section pb-100">
    <div class="container">
       <div class="product-info-header product-info-header-two product-info-header-borderless">
          <h2>@if(session()->get('language') == 'arabic') {{ $category_skip_2->category_name_ar }}  @else {{ $category_skip_2->category_name_en }} @endif</h2>
          <div class="carousel-control-arrows">
             <button class="product-control-left carousel-control-arrow">
             <i class="flaticon-back"></i>
             </button>
             <button class="product-control-right carousel-control-arrow">
             <i class="flaticon-next"></i>
             </button>
          </div>
       </div>
       <div class="product-carousel owl-carousel">
        @foreach($product_category_skip_2 as $key => $product)
          <div class="item">
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
</section>


 <!-- Start Banner -->
 <section class="service-section pt-100 pb-70">
    <div class="container">
       <div class="row">
          <div class="col-12 col-sm-6 col-lg-3 pb-30">
             <div class="service-card service-card-secondary">
                <div class="service-card-thumb">
                   <i class="flaticon-delivery"></i>
                </div>
                <div class="service-card-details">
                   <h3>Free Delivery</h3>
                   <p>At home</p>
                </div>
             </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3 pb-30">
             <div class="service-card service-card-secondary">
                <div class="service-card-thumb">
                   <i class="flaticon-alarm"></i>
                </div>
                <div class="service-card-details">
                   <h3>Quick Support</h3>
                   <p>In 24 hours</p>
                </div>
             </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3 pb-30">
             <div class="service-card service-card-secondary">
                <div class="service-card-thumb">
                   <i class="flaticon-dollar"></i>
                </div>
                <div class="service-card-details">
                   <h3>Money Saves</h3>
                   <p>Ample amount</p>
                </div>
             </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3 pb-30">
             <div class="service-card service-card-secondary">
                <div class="service-card-thumb">
                   <i class="flaticon-verified"></i>
                </div>
                <div class="service-card-details">
                   <h3>Protectd Media</h3>
                   <p>Ensure security</p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- End Banner -->

@endsection
