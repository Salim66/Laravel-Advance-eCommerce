@extends('frontend.partial_master')

@section('title')
{{ $product->product_name_en }}
@endsection

@section('partial_content')

<header class="header header-page-bg">
    <div class="container">
       <div class="header-page-content">
          <div class="row align-items-center">
             <div class="col-md-7">
                <div class="header-content">
                   <h1>@if(session()->get('language') == 'arabic') متجر واحد @else Single Shop @endif </h1>
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="index.html">@if(session()->get('language') == 'arabic') مسكن @else Home @endif</a></li>
                         <li class="breadcrumb-item active" aria-current="page">@if(session()->get('language') == 'arabic') متجر واحد @else Single Shop @endif</li>
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
 

<section class="product-details-section pt-100 pb-100">
    <div class="container">
       <div class="product-details-content">
          <div class="row align-items-center">
             <div class="col-12 col-lg-6 pb-30">
                <div class="product-details-item desk-pad-right-40">
                   <div class="product-details-slider">
                      <div class="product-slider-for owl-carousel owl-theme gallery-grid">
                         
                        @foreach($multiple_img as $img)
                        <div class="item">
                            <div class="product-gallery-trigger">
                               <a href="{{ URL::to($img->photo_name) }}" title="Stylish Chair"><i class="flaticon-full-screen"></i></a>
                            </div>
                            <img src="{{ URL::to($img->photo_name) }}" alt="product">
                         </div>
                        @endforeach
                      
                      </div>
                      <div class="product-slider-nav owl-carousel owl-theme">

                        @foreach($multiple_img as $img)
                        <div class="item">
                            <img src="{{ URL::to($img->photo_name) }}" alt="product">
                         </div>
                        @endforeach
                         
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-12 col-lg-6 pb-30">
                <div class="product-details-item">
                   <div class="product-details-caption product-details-caption-secondcolor">
                      
                        @if(session()->get('language') == 'arabic')
                        <h3 class="pname_cart-ar">{{ $product->product_name_ar }}</h3>
                        @else
                        <h3 class="pname_cart-en">{{ $product->product_name_en }}</h3>
                        @endif

                      <p class="product-id">{{ $product->product_code }}</p>
                      {{-- <div class="review-star-group">
                         <ul class="review-star">
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                         </ul>
                         <span>(4.5 Reviews)</span>
                      </div> --}}
                       @if($product->discount_price == NULL)
                      <div class="product-price">${{ $product->selling_price }}</div>
                      @else
                      <div class="product-price">${{ $product->discount_price }} <del>${{ $product->selling_price }}</del></div>
                      @endif
                      <div class="product-details-para">
                         <p>
                            @if(session()->get('language') == 'arabic')
                            {{ $product->short_descp_ar }}
                            @else
                            {{ $product->short_descp_en }}
                            @endif
                         </p>
                      </div>
                      <div class="product-choice">
                         <div class="product-choice-item">
                            <label>@if(session()->get('language') == 'arabic') حدد الألوان @else Select Colors @endif</label>
    
                               @if(session()->get('language') == 'arabic')
                               <select class="form-control product-color product-color-ar" name="color-ar">
                                <option selected disabled>@if(session()->get('language') == 'arabic') الألوان المتاحة @else Available colors @endif</option>
                                @foreach($product_color_ar as $color)
                                    <option value="{{ $color }}">{{ $color }}</option>
                                @endforeach
                               @else    
                               <select class="form-control product-color product-color-en" name="color-en">
                                <option selected disabled>@if(session()->get('language') == 'arabic') الألوان المتاحة @else Available colors @endif</option>
                                @foreach($product_color_en as $color)
                                    <option value="{{ $color }}">{{ $color }}</option>
                                @endforeach
                               @endif
                            </select>
                         </div>
                         <div class="product-choice-item">
                            <label>@if(session()->get('language') == 'arabic') أختر الحجم @else Select Size @endif</label>
    
                               @if(session()->get('language') == 'arabic')
                               <select class="form-control product-color product-size-ar" name="size-ar">
                                <option selected disabled>@if(session()->get('language') == 'arabic') الحجم متوفر @else Available Size @endif</option>
                               @foreach($product_size_ar as $size)
                                   <option value="{{ $size }}">{{ $size }}</option>
                               @endforeach
                              @else
                              <select class="form-control product-color product-size-en" name="size-ar">
                                <option selected disabled>@if(session()->get('language') == 'arabic') الحجم متوفر @else Available Size @endif</option>
                               @foreach($product_size_en as $size)
                                   <option value="{{ $size }}">{{ $size }}</option>
                               @endforeach
                              @endif
                            </select>
                         </div>
                         <div class="product-choice-item mt-3">
                            <label>@if(session()->get('language') == 'arabic') حدد الكمية @else Select Quantity @endif</label>
                            <div class="cart-quantity">
                               <button class="qu-btn dec">-</button>
                               <input type="text" class="qu-input" id="qty"  value="1">
                               <button class="qu-btn inc">+</button>
                            </div>
                         </div>
                      </div>
                      <input type="hidden" id="product_id" value="{{ $product->id }}">
                      <div class="product-action">
                         <div class="product-action-item">
                            <a href="javascript:void(0)" class="btn main-btn main-btn-secondary" onclick="addToCart()">Add To Cart</a>
                         </div>
                         <div class="product-action-item">
                            <a href="#" class="btn main-btn main-btn-secondary main-btn-bgless main-btn-secondary-bgless">
                            <i class="flaticon-like"></i>
                            </a>
                         </div>
                      </div>
                      <div class="share-post">
                         <h4>Share:</h4>
                         <ul class="social-list social-list-secondcolor">
                            <li>
                               <a href="#"><i class="flaticon-facebook"></i></a>
                            </li>
                            <li>
                               <a href="#"><i class="flaticon-instagram"></i></a>
                            </li>
                            <li>
                               <a href="#"><i class="flaticon-twitter"></i></a>
                            </li>
                            <li>
                               <a href="#"><i class="flaticon-pinterest"></i></a>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="product-details-tab">
             <ul class="product-tab-list">
                <li class="active" data-product-tab="1">Description</li>
                <li data-product-tab="2">Reviews</li>
             </ul>
             <div class="product-tab-information">
                <div class="product-tab-information-item active" data-product-details-tab="1">
                   <div class="product-description">
                        @if(session()->get('language') == 'arabic')
                        {!! $product->long_descp_ar !!}
                        @else
                        {!! $product->long_descp_en !!}
                        @endif
                   </div>
                </div>
                <div class="product-tab-information-item" data-product-details-tab="2">
                   <div class="max-455 ms-auto me-auto">
                      <div class="product-review-box">
                         <div class="post-review-box mb-30">
                            <div class="review-holder-item">
                               <div class="post-review-item post-review-item-main">
                                  <div class="post-review-thumb">
                                     <img src="assets/images/blogs/blog-author-1.jpg" alt="user">
                                  </div>
                                  <div class="post-review-content">
                                     <div class="post-review-content-header">
                                        <div class="post-review-header-item">
                                           <h3>Jennifer Andrew</h3>
                                           <ul class="review-star">
                                              <li class="full-star"><i class="flaticon-star"></i></li>
                                              <li class="full-star"><i class="flaticon-star"></i></li>
                                              <li class="full-star"><i class="flaticon-star"></i></li>
                                              <li class="full-star"><i class="flaticon-star"></i></li>
                                              <li class="full-star"><i class="flaticon-star"></i></li>
                                           </ul>
                                           <p>3 weeks ago</p>
                                        </div>
                                        <div class="post-review-header-item">
                                           <a href="#" class="post-review-btn">Reply</a>
                                        </div>
                                     </div>
                                     <p>Lorem ipsum dolor sit amet, consetetur sa dipscing elitr, sed diam nonumy ser irmodey tey mporep invidunt ut laboredi et dolore ma gna aliquyam.</p>
                                  </div>
                               </div>
                            </div>
                            <div class="review-holder-item">
                               <div class="post-review-item post-review-item-main">
                                  <div class="post-review-thumb">
                                     <img src="assets/images/blogs/blog-author-3.jpg" alt="review">
                                  </div>
                                  <div class="post-review-content">
                                     <div class="post-review-content-header">
                                        <div class="post-review-header-item">
                                           <h3>Robert John</h3>
                                           <ul class="review-star">
                                              <li class="full-star"><i class="flaticon-star"></i></li>
                                              <li class="full-star"><i class="flaticon-star"></i></li>
                                              <li class="full-star"><i class="flaticon-star"></i></li>
                                              <li class="full-star"><i class="flaticon-star"></i></li>
                                              <li class="full-star"><i class="flaticon-star"></i></li>
                                           </ul>
                                           <p>3 weeks ago</p>
                                        </div>
                                        <div class="post-review-header-item">
                                           <a href="#" class="post-review-btn">Reply</a>
                                        </div>
                                     </div>
                                     <p>Lorem ipsum dolor sit amet, consetetur sa dipscing elitr, sed diam nonumy ser irmodey tey mporep invidunt ut laboredi et dolore ma gna aliquyam.</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="post-comment-area">
                            <div class="sub-section-title">
                               <h2 class="sub-section-title-heading">Leave A Review</h2>
                            </div>
                            <form class="contact-form" id="contactForm">
                               <div class="star-rating mb-20">
                                  <input type="radio" id="5-stars" name="rating" value="5" />
                                  <label for="5-stars" class="star"></label>
                                  <input type="radio" id="4-stars" name="rating" value="4" />
                                  <label for="4-stars" class="star"></label>
                                  <input type="radio" id="3-stars" name="rating" value="3" />
                                  <label for="3-stars" class="star"></label>
                                  <input type="radio" id="2-stars" name="rating" value="2" />
                                  <label for="2-stars" class="star"></label>
                                  <input type="radio" id="1-star" name="rating" value="1" />
                                  <label for="1-star" class="star"></label>
                               </div>
                               <div class="row">
                                  <div class="col-sm-6">
                                     <div class="form-group mb-20">
                                        <input type="text" name="name" id="name" class="form-control form-control-borderbg form-control-borderbg-secondcolor" placeholder="Your name*" required data-error="Please enter your name" />
                                        <div class="help-block with-errors"></div>
                                     </div>
                                  </div>
                                  <div class="col-sm-6">
                                     <div class="form-group mb-20">
                                        <input type="text" name="email" id="email" class="form-control form-control-borderbg form-control-borderbg-secondcolor" placeholder="Your email*" required data-error="Please enter your email" />
                                        <div class="help-block with-errors"></div>
                                     </div>
                                  </div>
                                  <div class="col-sm-12">
                                     <div class="form-group mb-20">
                                        <textarea name="message" class="form-control form-control-borderbg form-control-borderbg-secondcolor" id="message" rows="6" placeholder="Your comment*"></textarea>
                                     </div>
                                  </div>
                               </div>
                               <div class="input-checkbox input-checkbox-secondcolor mb-20">
                                  <input type="checkbox" id="contact1">
                                  <label for="contact1">Save my name and email in this browser for the next time I comment.</label>
                               </div>
                               <div class="form-button">
                                  <button class="btn main-btn main-btn-secondary" type="submit">Send A Review</button>
                                  <div id="msgSubmit"></div>
                               </div>
                            </form>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>



 <section class="related-product-section pb-100">
    <div class="container">
       <div class="product-info-header product-info-header-two product-info-header-borderless">
          <h2>@if(session()->get('language') == 'arabic') المنتجات ذات الصلة  @else Related Product @endif</h2>
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

        @foreach($related_products as $product)
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
@endsection
