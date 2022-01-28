@extends('frontend.main_master')

@section('content')


{{-- <section class="featured-product-section pb-70">
    <div class="container">
       <div class="section-title">
          <h2>@if(session()->get('language') == 'arabic') منتجات جديدة @else New Products @endif</h2>
       </div>
       <ul class="product-selection-tab">

          <li class="active" data-filter="*">@if(session()->get('language') == 'arabic') الجميع <br> العنصر @else All <br> Item @endif</li>

          @foreach($categories as $category)
          <li data-filter=".category{{ $category->id }}">
             <i class="flaticon-armchair"></i>
             @if(session()->get('language') == 'arabic')
             {{ $category->category_name_ar }}
             @else
             {{ $category->category_name_en }}
             @endif
          </li>
          @endforeach
       
       </ul>
       <div class="product-tab-gallery row">


    @foreach($categories as $category)


        @php
            $cat_products = App\Models\Product::where('status', 1)->where('category_id', $category->id)->latest()->get();
            // dd($cat_products);
        @endphp
        @foreach($cat_products as $key => $product)
            @if($key < 12)
          <div class="col-sm-6 col-lg-3 pb-30 product-item element-item category{{ $category->id }}">
             <div class="product-card-flat">
                <div class="product-card-thumb">
                   <a href="single-shop.html">
                   <img src="{{ URL::to($product->product_thumbnail) }}" alt="product">
                   </a>
                   <ul class="product-card-action">
                      <li>
                         <a href="#">
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
                         <a href="#">
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
                   <div class="product-status">New</div>
                   @else
                   <div class="product-status">{{ $discount }}</div>
                   @endif

                </div>
                <div class="product-card-content">
                   <h3>
                      <a href="single-shop.html">
                        @if(session()->get('language') == 'arabic')
                        {{ $product->product_name_ar }}
                        @else
                        {{ $product->product_name_en }}
                        @endif
                      </a>
                   </h3>
                   <p class="product-id">N23HN456</p>
                   <div class="product-price">$200.0 <del>$270.0</del></div>
                </div>
             </div>
          </div>
          @endif
        @endforeach
         
    @endforeach



   


       </div>
    </div>
 </section> --}}



 <section class="recent-arrival pb-100">
    <div class="container">
       <div class="section-title">
          <h2>@if(session()->get('language') == 'arabic') منتجات جديدة @else New Products @endif</h2>
       </div>
       <div class="recent-arrival-gallery">
          <div class="row">
            @foreach($products as $key => $product)
             <div class="col-sm-6 col-lg-3 pb-30 recent-product-item">
                <div class="product-card-flat">
                   <div class="product-card-thumb">
                      <a href="single-shop.html">
                      <img src="{{ URL::to($product->product_thumbnail) }}" alt="product">
                      </a>
                      <ul class="product-card-action">
                         <li>
                            <a href="#">
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
                            <a href="#">
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
                         <a href="single-shop.html">
                            @if(session()->get('language') == 'arabic')
                            {{ $product->product_name_ar }}
                            @else
                            {{ $product->product_name_en }}
                            @endif
                         </a>
                      </h3>
                      <p class="product-id">N23HN456</p>
                      @if($product->discount_price == NULL)
                      <div class="product-price">${{ $product->selling_price }}</div>
                      @else
                      <div class="product-price">${{ $product->selling_price }} <del>${{ $product->discount_price }}</del></div>
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



<section class="special-offer-banner pb-100">
    <div class="container">
       <div class="product-banner product-banner-7 product-banner-full">
          <a href="single-shop.html" class="product-banner-image">
          </a>
          <div class="product-banner-content product-banner-content-sm">
             <small>Sitting chair with flower table</small>
             <h3>New Arrival Products</h3>
             <div class="product-price">$200.50 <del>$230.0</del></div>
             <a href="single-shop.html" class="btn main-btn main-btn-radius">Shop Now</a>
          </div>
       </div>
    </div>
</section>

@include('frontend.body.brand')

<div class="new-product-section pb-70">
    <div class="container">
       <div class="row">
          <div class="col-sm-6 col-lg-4 pb-30">
             <div class="product-info-header product-info-header-borderless">
                <h2>Best Seller</h2>
                <div class="carousel-control-arrows">
                   <button class="bestseller-control-left carousel-control-arrow carousel-control-arrow-radius">
                   <i class="flaticon-back"></i>
                   </button>
                   <button class="bestseller-control-right carousel-control-arrow carousel-control-arrow-radius">
                   <i class="flaticon-next"></i>
                   </button>
                </div>
             </div>
             <div class="best-seller-carousel owl-carousel">
                <div class="item">
                   <div class="product-info-card product-info-card-green mb-30">
                      <div class="product-info-card-thumb">
                         <img src="{{ asset('frontend/assets') }}/images/products/product-2.png" alt="product">
                      </div>
                      <div class="product-info-card-content">
                         <h3>
                            <a href="single-shop.html">New Micro <br> Chairs</a>
                         </h3>
                         <ul class="review-star">
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                         </ul>
                         <a href="#" class="redirect-link">Add To Cart</a>
                      </div>
                   </div>
                   <div class="product-info-card product-info-card-violet">
                      <div class="product-info-card-thumb">
                         <img src="{{ asset('frontend/assets') }}/images/products/product-19.png" alt="product">
                      </div>
                      <div class="product-info-card-content">
                         <h3>
                            <a href="single-shop.html">New Micro <br> Lamps</a>
                         </h3>
                         <ul class="review-star">
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                         </ul>
                         <a href="#" class="redirect-link">Add To Cart</a>
                      </div>
                   </div>
                </div>
                <div class="item">
                   <div class="product-info-card product-info-card-yellow mb-30">
                      <div class="product-info-card-thumb">
                         <img src="{{ asset('frontend/assets') }}/images/products/product-3.png" alt="product">
                      </div>
                      <div class="product-info-card-content">
                         <h3>
                            <a href="single-shop.html">Best Warm <br> Chair</a>
                         </h3>
                         <ul class="review-star">
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                         </ul>
                         <a href="#" class="redirect-link">Add To Cart</a>
                      </div>
                   </div>
                   <div class="product-info-card product-info-card-blue">
                      <div class="product-info-card-thumb">
                         <img src="{{ asset('frontend/assets') }}/images/products/product-1.png" alt="product">
                      </div>
                      <div class="product-info-card-content">
                         <h3>
                            <a href="single-shop.html">New Hold <br> Lamps</a>
                         </h3>
                         <ul class="review-star">
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                            <li class="full-star"><i class="flaticon-star"></i></li>
                         </ul>
                         <a href="#" class="redirect-link">Add To Cart</a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-lg-8 pb-30">
             <div class="product-info-header product-info-header-borderless">
                <h2>Daily Sales</h2>
                <div class="carousel-control-arrows">
                   <button class="dailysale-control-left carousel-control-arrow carousel-control-arrow-radius">
                   <i class="flaticon-back"></i>
                   </button>
                   <button class="dailysale-control-right carousel-control-arrow carousel-control-arrow-radius">
                   <i class="flaticon-next"></i>
                   </button>
                </div>
             </div>
             <div class="daily-sales-carousel owl-carousel">
                <div class="item">
                   <div class="product-card-flat">
                      <div class="product-card-thumb">
                         <a href="single-shop.html">
                         <img src="{{ asset('frontend/assets') }}/images/products/product-7.png" alt="product">
                         </a>
                         <ul class="product-card-action">
                            <li>
                               <a href="#">
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
                               <a href="#">
                               <i class="flaticon-like"></i>
                               <span>Add Wishlist</span>
                               </a>
                            </li>
                         </ul>
                         <div class="product-status">New</div>
                         <div class="product-counter daily-counter-1">
                            <div class="product-counter-item day1"></div>
                            <div class="product-counter-item hour1"></div>
                            <div class="product-counter-item min1"></div>
                            <div class="product-counter-item sec1"></div>
                         </div>
                      </div>
                      <div class="product-card-content">
                         <h3>
                            <a href="single-shop.html">Plastic Sitting Chair</a>
                         </h3>
                         <p class="product-id">N23HN456</p>
                         <div class="product-price">$20.0 <del>$33.0</del></div>
                      </div>
                   </div>
                </div>
                <div class="item">
                   <div class="product-card-flat">
                      <div class="product-card-thumb">
                         <a href="single-shop.html">
                         <img src="{{ asset('frontend/assets') }}/images/products/product-6.png" alt="product">
                         </a>
                         <ul class="product-card-action">
                            <li>
                               <a href="#">
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
                               <a href="#">
                               <i class="flaticon-like"></i>
                               <span>Add Wishlist</span>
                               </a>
                            </li>
                         </ul>
                         <div class="product-status">New</div>
                         <div class="product-counter daily-counter-2">
                            <div class="product-counter-item day2"></div>
                            <div class="product-counter-item hour2"></div>
                            <div class="product-counter-item min2"></div>
                            <div class="product-counter-item sec2"></div>
                         </div>
                      </div>
                      <div class="product-card-content">
                         <h3>
                            <a href="single-shop.html">Mini Table</a>
                         </h3>
                         <p class="product-id">R24HER324</p>
                         <div class="product-price">$120.0 <del>$150.0</del></div>
                      </div>
                   </div>
                </div>
                <div class="item">
                   <div class="product-card-flat">
                      <div class="product-card-thumb">
                         <a href="single-shop.html">
                         <img src="{{ asset('frontend/assets') }}/images/products/product-10.png" alt="product">
                         </a>
                         <ul class="product-card-action">
                            <li>
                               <a href="#">
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
                               <a href="#">
                               <i class="flaticon-like"></i>
                               <span>Add Wishlist</span>
                               </a>
                            </li>
                         </ul>
                         <div class="product-status">New</div>
                         <div class="product-counter daily-counter">
                            <div class="product-counter-item day1"></div>
                            <div class="product-counter-item hour1"></div>
                            <div class="product-counter-item min1"></div>
                            <div class="product-counter-item sec1"></div>
                         </div>
                      </div>
                      <div class="product-card-content">
                         <h3>
                            <a href="single-shop.html">Park Sitting Chair</a>
                         </h3>
                         <p class="product-id">R23HY45</p>
                         <div class="product-price">$150.0 <del>$170.0</del></div>
                      </div>
                   </div>
                </div>
                <div class="item">
                   <div class="product-card-flat">
                      <div class="product-card-thumb">
                         <a href="single-shop.html">
                         <img src="{{ asset('frontend/assets') }}/images/products/product-8.png" alt="product">
                         </a>
                         <ul class="product-card-action">
                            <li>
                               <a href="#">
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
                               <a href="#">
                               <i class="flaticon-like"></i>
                               <span>Add Wishlist</span>
                               </a>
                            </li>
                         </ul>
                         <div class="product-status">New</div>
                         <div class="product-counter daily-counter-2">
                            <div class="product-counter-item day2"></div>
                            <div class="product-counter-item hour2"></div>
                            <div class="product-counter-item min2"></div>
                            <div class="product-counter-item sec2"></div>
                         </div>
                      </div>
                      <div class="product-card-content">
                         <h3>
                            <a href="single-shop.html">Simple Sitting Chair</a>
                         </h3>
                         <p class="product-id">TN232EN</p>
                         <div class="product-price">$250.0 <del>$350.0</del></div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <section class="testimonial-section p-tb-100 bg-yellow bg-shape">
    <div class="container">
       <div class="section-title">
          <h2>Our Customer Feedback</h2>
       </div>
       <div class="testimonial-carousel-3 owl-carousel default-carousel owl-theme">
          <div class="item">
             <div class="client-feedback client-feedback-3">
                <div class="client-feedback-paragraph">
                   <img src="{{ asset('frontend/assets') }}/images/quote-secondcolor.png" alt="quote">
                   <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.</p>
                </div>
                <div class="client-feedback-autor">
                   <div class="client-feedback-thumb">
                      <img src="{{ asset('frontend/assets') }}/images/clients/client-1.jpg" alt="client">
                   </div>
                   <div class="client-feedback-author-info">
                      <h3 class="client-feedback-name">Juanita Jensen</h3>
                      <p class="client-feedback-designation">Manager, eCommerce</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="item">
             <div class="client-feedback client-feedback-3">
                <div class="client-feedback-paragraph">
                   <img src="{{ asset('frontend/assets') }}/images/quote-secondcolor.png" alt="quote">
                   <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.</p>
                </div>
                <div class="client-feedback-autor">
                   <div class="client-feedback-thumb">
                      <img src="{{ asset('frontend/assets') }}/images/clients/client-2.jpg" alt="client">
                   </div>
                   <div class="client-feedback-author-info">
                      <h3 class="client-feedback-name">Jesse Speer</h3>
                      <p class="client-feedback-designation">CEO, Help company.</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="item">
             <div class="client-feedback client-feedback-3">
                <div class="client-feedback-paragraph">
                   <img src="{{ asset('frontend/assets') }}/images/quote-secondcolor.png" alt="quote">
                   <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.</p>
                </div>
                <div class="client-feedback-autor">
                   <div class="client-feedback-thumb">
                      <img src="{{ asset('frontend/assets') }}/images/clients/client-3.jpg" alt="client">
                   </div>
                   <div class="client-feedback-author-info">
                      <h3 class="client-feedback-name">Brianna Norwood</h3>
                      <p class="client-feedback-designation">E-Commerce specialist</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="item">
             <div class="client-feedback client-feedback-3">
                <div class="client-feedback-paragraph">
                   <img src="{{ asset('frontend/assets') }}/images/quote-secondcolor.png" alt="quote">
                   <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.</p>
                </div>
                <div class="client-feedback-autor">
                   <div class="client-feedback-thumb">
                      <img src="{{ asset('frontend/assets') }}/images/clients/client-4.jpg" alt="client">
                   </div>
                   <div class="client-feedback-author-info">
                      <h3 class="client-feedback-name">Albert Adinson</h3>
                      <p class="client-feedback-designation">CEO, eCommerce</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="item">
             <div class="client-feedback client-feedback-3">
                <div class="client-feedback-paragraph">
                   <img src="{{ asset('frontend/assets') }}/images/quote-secondcolor.png" alt="quote">
                   <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.</p>
                </div>
                <div class="client-feedback-autor">
                   <div class="client-feedback-thumb">
                      <img src="{{ asset('frontend/assets') }}/images/clients/client-5.jpg" alt="client">
                   </div>
                   <div class="client-feedback-author-info">
                      <h3 class="client-feedback-name">Ressea Juker</h3>
                      <p class="client-feedback-designation">HR, Shop company.</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="item">
             <div class="client-feedback client-feedback-3">
                <div class="client-feedback-paragraph">
                   <img src="{{ asset('frontend/assets') }}/images/quote-secondcolor.png" alt="quote">
                   <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.</p>
                </div>
                <div class="client-feedback-autor">
                   <div class="client-feedback-thumb">
                      <img src="{{ asset('frontend/assets') }}/images/clients/client-6.jpg" alt="client">
                   </div>
                   <div class="client-feedback-author-info">
                      <h3 class="client-feedback-name">Josep Fransis</h3>
                      <p class="client-feedback-designation">Marketing specialist</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="item">
             <div class="client-feedback client-feedback-3">
                <div class="client-feedback-paragraph">
                   <img src="{{ asset('frontend/assets') }}/images/quote-secondcolor.png" alt="quote">
                   <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.</p>
                </div>
                <div class="client-feedback-autor">
                   <div class="client-feedback-thumb">
                      <img src="{{ asset('frontend/assets') }}/images/clients/client-7.jpg" alt="client">
                   </div>
                   <div class="client-feedback-author-info">
                      <h3 class="client-feedback-name">Julecia Rom</h3>
                      <p class="client-feedback-designation">Specialist, Shop</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="item">
             <div class="client-feedback client-feedback-3">
                <div class="client-feedback-paragraph">
                   <img src="{{ asset('frontend/assets') }}/images/quote-secondcolor.png" alt="quote">
                   <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.</p>
                </div>
                <div class="client-feedback-autor">
                   <div class="client-feedback-thumb">
                      <img src="{{ asset('frontend/assets') }}/images/clients/client-8.jpg" alt="client">
                   </div>
                   <div class="client-feedback-author-info">
                      <h3 class="client-feedback-name">Angelina Disuza</h3>
                      <p class="client-feedback-designation">CEO, myfy.com</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="item">
             <div class="client-feedback client-feedback-3">
                <div class="client-feedback-paragraph">
                   <img src="{{ asset('frontend/assets') }}/images/quote-secondcolor.png" alt="quote">
                   <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.</p>
                </div>
                <div class="client-feedback-autor">
                   <div class="client-feedback-thumb">
                      <img src="{{ asset('frontend/assets') }}/images/clients/client-9.jpg" alt="client">
                   </div>
                   <div class="client-feedback-author-info">
                      <h3 class="client-feedback-name">Devit M. Kotlin</h3>
                      <p class="client-feedback-designation">HR, sweetshop.com</p>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
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
 <section class="recent-arrival pb-100">
    <div class="container">
       <div class="section-title">
          <h2>Our Recent Arrivals</h2>
       </div>
       <div class="recent-arrival-gallery">
          <div class="row">
             <div class="col-sm-6 col-lg-3 pb-30 recent-product-item">
                <div class="product-card-flat">
                   <div class="product-card-thumb">
                      <a href="single-shop.html">
                      <img src="{{ asset('frontend/assets') }}/images/products/product-5.png" alt="product">
                      </a>
                      <ul class="product-card-action">
                         <li>
                            <a href="#">
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
                            <a href="#">
                            <i class="flaticon-like"></i>
                            <span>Add Wishlist</span>
                            </a>
                         </li>
                      </ul>
                      <div class="product-status">-20%</div>
                   </div>
                   <div class="product-card-content">
                      <h3>
                         <a href="single-shop.html">Relaxation Sofa</a>
                      </h3>
                      <p class="product-id">N23HN456</p>
                      <div class="product-price">$300.0 <del>$330.0</del></div>
                   </div>
                </div>
             </div>
             <div class="col-sm-6 col-lg-3 pb-30 recent-product-item">
                <div class="product-card-flat">
                   <div class="product-card-thumb">
                      <a href="single-shop.html">
                      <img src="{{ asset('frontend/assets') }}/images/products/product-4.png" alt="product">
                      </a>
                      <ul class="product-card-action">
                         <li>
                            <a href="#">
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
                            <a href="#">
                            <i class="flaticon-like"></i>
                            <span>Add Wishlist</span>
                            </a>
                         </li>
                      </ul>
                      <div class="product-status">New</div>
                   </div>
                   <div class="product-card-content">
                      <h3>
                         <a href="single-shop.html">Book Self</a>
                      </h3>
                      <p class="product-id">M43HG435</p>
                      <div class="product-price">$50.0 <del>$80.0</del></div>
                   </div>
                </div>
             </div>
             <div class="col-sm-6 col-lg-3 pb-30 recent-product-item">
                <div class="product-card-flat">
                   <div class="product-card-thumb">
                      <a href="single-shop.html">
                      <img src="{{ asset('frontend/assets') }}/images/products/product-2.png" alt="product">
                      </a>
                      <ul class="product-card-action">
                         <li>
                            <a href="#">
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
                            <a href="#">
                            <i class="flaticon-like"></i>
                            <span>Add Wishlist</span>
                            </a>
                         </li>
                      </ul>
                      <div class="product-status">-20%</div>
                   </div>
                   <div class="product-card-content">
                      <h3>
                         <a href="single-shop.html">Relax Chairs</a>
                      </h3>
                      <p class="product-id">R23HY45</p>
                      <div class="product-price">$220.0 <del>$250.0</del></div>
                   </div>
                </div>
             </div>
             <div class="col-sm-6 col-lg-3 pb-30 recent-product-item">
                <div class="product-card-flat">
                   <div class="product-card-thumb">
                      <a href="single-shop.html">
                      <img src="{{ asset('frontend/assets') }}/images/products/product-3.png" alt="product">
                      </a>
                      <ul class="product-card-action">
                         <li>
                            <a href="#">
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
                            <a href="#">
                            <i class="flaticon-like"></i>
                            <span>Add Wishlist</span>
                            </a>
                         </li>
                      </ul>
                      <div class="product-status">-33%</div>
                   </div>
                   <div class="product-card-content">
                      <h3>
                         <a href="single-shop.html">Relax Sofa</a>
                      </h3>
                      <p class="product-id">TM232EN</p>
                      <div class="product-price">$320.0 <del>$330.0</del></div>
                   </div>
                </div>
             </div>
             <div class="col-sm-6 col-lg-3 pb-30 recent-product-item">
                <div class="product-card-flat">
                   <div class="product-card-thumb">
                      <a href="single-shop.html">
                      <img src="{{ asset('frontend/assets') }}/images/products/product-9.png" alt="product">
                      </a>
                      <ul class="product-card-action">
                         <li>
                            <a href="#">
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
                            <a href="#">
                            <i class="flaticon-like"></i>
                            <span>Add Wishlist</span>
                            </a>
                         </li>
                      </ul>
                      <div class="product-status">New</div>
                   </div>
                   <div class="product-card-content">
                      <h3>
                         <a href="single-shop.html">Gaming Chair</a>
                      </h3>
                      <p class="product-id">M43HG435</p>
                      <div class="product-price">$320.0 <del>$340.0</del></div>
                   </div>
                </div>
             </div>
             <div class="col-sm-6 col-lg-3 pb-30 recent-product-item">
                <div class="product-card-flat">
                   <div class="product-card-thumb">
                      <a href="single-shop.html">
                      <img src="{{ asset('frontend/assets') }}/images/products/product-17.png" alt="product">
                      </a>
                      <ul class="product-card-action">
                         <li>
                            <a href="#">
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
                            <a href="#">
                            <i class="flaticon-like"></i>
                            <span>Add Wishlist</span>
                            </a>
                         </li>
                      </ul>
                      <div class="product-status">New</div>
                   </div>
                   <div class="product-card-content">
                      <h3>
                         <a href="single-shop.html">Hanging Chair</a>
                      </h3>
                      <p class="product-id">N23GH345</p>
                      <div class="product-price">$250.0 <del>$350.0</del></div>
                   </div>
                </div>
             </div>
             <div class="col-sm-6 col-lg-3 pb-30 recent-product-item">
                <div class="product-card-flat">
                   <div class="product-card-thumb">
                      <a href="single-shop.html">
                      <img src="{{ asset('frontend/assets') }}/images/products/product-8.png" alt="product">
                      </a>
                      <ul class="product-card-action">
                         <li>
                            <a href="#">
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
                            <a href="#">
                            <i class="flaticon-like"></i>
                            <span>Add Wishlist</span>
                            </a>
                         </li>
                      </ul>
                      <div class="product-status">New</div>
                   </div>
                   <div class="product-card-content">
                      <h3>
                         <a href="single-shop.html">3 Leg Chair</a>
                      </h3>
                      <p class="product-id">TN232EN</p>
                      <div class="product-price">$110.0 <del>$120.0</del></div>
                   </div>
                </div>
             </div>
             <div class="col-sm-6 col-lg-3 pb-30 recent-product-item">
                <div class="product-card-flat">
                   <div class="product-card-thumb">
                      <a href="single-shop.html">
                      <img src="{{ asset('frontend/assets') }}/images/products/product-18.png" alt="product">
                      </a>
                      <ul class="product-card-action">
                         <li>
                            <a href="#">
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
                            <a href="#">
                            <i class="flaticon-like"></i>
                            <span>Add Wishlist</span>
                            </a>
                         </li>
                      </ul>
                      <div class="product-status">-23%</div>
                   </div>
                   <div class="product-card-content">
                      <h3>
                         <a href="single-shop.html">Dining Table</a>
                      </h3>
                      <p class="product-id">N23GH345</p>
                      <div class="product-price">$200.0 <del>$230.0</del></div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="text-center load-more">
          <button class="btn main-btn main-btn-radius load-more-btn">
          <i class="flaticon-loading"></i>
          Load More
          </button>
       </div>
    </div>
 </section>
 <section class="reach-us-section pb-70">
    <div class="container">
       <div class="row">
          <div class="col-sm-6 pb-30">
             <div class="reach-us-card reach-us-card-1">
                <h3>Connect Us</h3>
                <p>Need help? Call <a href="tel:00910-395-5297">+910-395-5297</a> <br> We always ready to help.</p>
                <a href="contact.html" class="redirect-link">Contact Us</a>
             </div>
          </div>
          <div class="col-sm-6 pb-30">
             <div class="reach-us-card reach-us-card-2">
                <h3>Follow Us</h3>
                <p>You can easily connect to our social <br> Instagram pages.</p>
                <a href="https://www.instagram.com/" class="redirect-link">Instagram</a>
             </div>
          </div>
       </div>
    </div>
 </section>

@endsection
