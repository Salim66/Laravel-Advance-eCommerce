<!-- Header Home -->
<div class="nav-main">
    <div class="topbar">
       <div class="container">
          <div class="topbar-inner">
             <div class="row align-items-center justify-content-center justify-content-lg-between">
                <div class="topbar-item">
                   <div class="topbar-brand">
                      <a href="index.html">
                      <img src="{{ asset('frontend/assets') }}/images/logo.png" alt="logo">
                      </a>
                   </div>
                </div>
                <div class="topbar-item">
                   <div class="topbar-search">
                      <form>
                        <input type="text" class="form-control" placeholder="@if(session()->get('language') == 'arabic') البحث عن المنتج @else Search product @endif">
                        <button class="btn main-btn" type="submit">
                         @if(session()->get('language') == 'arabic') بحث @else Search @endif   
                         </button>
                      </form>
                   </div>
                </div>
                <div class="topbar-item topbar-item-rightside">
                   <div class="topbar-action">
                      <div class="topbar-action-item">
                          @auth
                         <a href="login.html">
                            <i class="flaticon-user"></i>

                            <span>@if(session()->get('language') == 'arabic') ملف تعريفي للمستخدم @else User Profile @endif</span>
                         </a>
                         @else
                         <a href="{{ route('login') }}">
                            <i class="flaticon-user"></i>
                            <span>@if(session()->get('language') == 'arabic') تسجيل الدخول @else Login @endif</span>
                         </a>
                         @endauth

                      </div>
                      <div class="topbar-action-item">
                         <a href="wishlist.html">
                         <i class="flaticon-like"></i>
                         <span>@if(session()->get('language') == 'arabic') قائمة الرغبات @else Wishlist @endif</span>
                         <span class="topbar-action-counter">05</span>
                         </a>
                      </div>
                      <div class="topbar-action-item cart-option-dropdown">
                         <a href="#" class="cartbtn">
                         <i class="flaticon-shopping-cart"></i>
                         <span>@if(session()->get('language') == 'arabic') عربة التسوق @else Cart @endif</span>
                         <span class="topbar-action-counter">02</span>
                         </a>
                         <div class="cart-modal">
                            <div class="cart-close-btn close-btn">
                               <i class="flaticon-close"></i>
                            </div>
                            <div class="cart-modal-products">
                               <div class="cart-modal-product">
                                  <div class="cart-product-info">
                                     <a href="single-shop.html">
                                        <div class="cart-product-thumb">
                                           <img src="{{ asset('frontend/assets') }}/images/products/product-13.png" alt="product">
                                        </div>
                                        <div class="cart-product-details">
                                           <h3>Stylish Chair</h3>
                                           <p>Price: <span>$200.0</span></p>
                                           <p>Qty: <span>2 pcs</span></p>
                                        </div>
                                     </a>
                                  </div>
                                  <div class="cart-product-remove">
                                     <a href="#">
                                     <i class="flaticon-delete"></i>
                                     </a>
                                  </div>
                               </div>
                               <div class="cart-modal-product">
                                  <div class="cart-product-info">
                                     <a href="single-shop.html">
                                        <div class="cart-product-thumb">
                                           <img src="{{ asset('frontend/assets') }}/images/products/product-15.png" alt="product">
                                        </div>
                                        <div class="cart-product-details">
                                           <h3>Furnished Sofa</h3>
                                           <p>Price: <span>$300.0</span></p>
                                           <p>Qty: <span>1 pc</span></p>
                                        </div>
                                     </a>
                                  </div>
                                  <div class="cart-product-remove">
                                     <a href="#">
                                     <i class="flaticon-delete"></i>
                                     </a>
                                  </div>
                               </div>
                            </div>
                            <div class="cart-details">
                               <div class="cart-total-box">
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
                               <a href="cart.html" class="btn main-btn full-width">Add To Cart</a>
                               <a href="checkout.html" class="btn main-btn full-width main-btn-bgless">Checkout</a>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>

    <!-- //////////// Get Category Data ///////////// -->
    @php
        $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
    @endphp

    <div class="navbar-area">
       <div class="container">
          <div class="mobile-nav">
             <div class="mobile-nav-category">
                <div class="navbar-category">
                   <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                       <ul class="navbar-nav mx-auto">
                        <li class="nav-item">

                            <div class="category-button">
                              <i class="flaticon-menu"></i>
                              <a href="javascript:void(0)" class="nav-link dropdown-toggle">
                                @if(session()->get('language') == 'arabic') التصنيفات @else Categories @endif         
                                </a>
                            </div>
                           <ul class="dropdown-menu">

                            @foreach($categories as $category)
                              <li class="nav-item nav-item__border">
                                 <a href="javascript:void(0)" class="nav-link dropdown-toggle">
                                    @if(session()->get('language') == 'arabic') 
                                    {{ $category->category_name_ar }}
                                    @else 
                                    {{ $category->category_name_en }}
                                    @endif                                     
                                 </a>
                                 <ul class="dropdown-menu">

                                    @php
                                         $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                                    @endphp

                                    @foreach($subcategories as $sub)
                                    <li class="nav-item nav-item__border">
                                        <a href="javascript:void(0)" class="nav-link dropdown-toggle">
                                            @if(session()->get('language') == 'arabic') 
                                            {{ $sub->subcategory_name_ar }}
                                            @else 
                                            {{ $sub->subcategory_name_en }}
                                            @endif
                                            
                                        </a>
                                       <ul class="dropdown-menu">

                                        @php
                                            $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $sub->id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                                        @endphp

                                        @foreach($subsubcategories as $subsub)
                                           <li class="nav-item nav-item__border">
                                            <a href="login.html" class="nav-link">
                                                @if(session()->get('language') == 'arabic') 
                                                {{ $subsub->subsubcategory_name_ar }}
                                                @else 
                                                {{ $subsub->subsubcategory_name_en }}
                                                @endif
                                            </a>
                                           </li>
                                        @endforeach

                                        </ul>
                                    </li>
                                    @endforeach

                                 </ul>
                              </li>
                            @endforeach

                           </ul>
                         </li>
                       </ul>
                    </div>
                </div>
             </div>
             <a href="index.html" class="mobile-brand d-lg-none">
             <img src="{{ asset('frontend/assets') }}/images/logo.png" alt="logo" class="logo">
             </a>
             <div class="navbar-option">
                <div class="navbar-option-item d-none mobile-nav-sidebar">
                   <a href="#" class="mobile-option-dot">
                   <i class="flaticon-more"></i>
                   </a>
                   <div class="mobile-option-dropdown">
                      <div class="navbar-option-item">
                         <div class="navbar-language dropdown language-option">
                            <button class="dropdown-toggle" type="button" id="language2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-worldwide"></i>
                            <span>@if(session()->get('language') == 'arabic') لغة @else Language @endif</span>
                            </button>
                            <div class="dropdown-menu language-dropdown-menu" aria-labelledby="language1">
                            @if(session()->get('language') == 'arabic')
                            <a class="dropdown-item" href="{{ route('english.language') }}">
                            <img src="{{ asset('frontend/assets') }}/images/uk.png" alt="flag">
                            English
                            </a>
                            @else
                            <a class="dropdown-item" href="{{ route('arabic.language') }}">
                            <img src="{{ asset('frontend/assets') }}/images/uae.png" alt="flag">
                            العربيّة
                            </a>
                            @endif
                            </div>
                         </div>
                      </div>
                      <div class="navbar-option-item">
                         <a href="login.html">
                         <i class="flaticon-user"></i>
                         </a>
                      </div>
                      <div class="navbar-option-item dropdown">
                         <button type="button" id="search2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="flaticon-search"></i>
                         </button>
                         <div class="dropdown-menu mobile-search" aria-labelledby="search2">
                            <form>
                               <input type="text" class="form-control" placeholder="@if(session()->get('language') == 'arabic') البحث عن المنتج @else Search product @endif">
                               <button class="btn main-btn" type="submit">
                                @if(session()->get('language') == 'arabic') بحث @else Search @endif   
                                </button>
                            </form>
                         </div>
                      </div>
                      <div class="navbar-option-item">
                         <a href="wishlist.html" class="navbar-add-cart">
                         <i class="flaticon-like"></i>
                         <span class="topbar-action-counter">05</span>
                         </a>
                      </div>
                   </div>
                </div>
                <div class="navbar-option-item d-none d-md-block">
                   <div class="navbar-language dropdown language-option">
                      <button class="dropdown-toggle" type="button" id="language1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="flaticon-worldwide"></i>
                      <span>@if(session()->get('language') == 'arabic') لغة @else Language @endif</span>
                      </button>
                      <div class="dropdown-menu language-dropdown-menu" aria-labelledby="language1">
                        @if(session()->get('language') == 'arabic')
                        <a class="dropdown-item" href="{{ route('english.language') }}">
                        <img src="{{ asset('frontend/assets') }}/images/uk.png" alt="flag">
                        English
                        </a>
                        @else
                        <a class="dropdown-item" href="{{ route('arabic.language') }}">
                        <img src="{{ asset('frontend/assets') }}/images/uae.png" alt="flag">
                        العربيّة
                        </a>
                        @endif
                      </div>
                   </div>
                </div>
                <div class="navbar-option-item d-none d-lg-none d-md-block">
                   <a href="login.html">
                   <i class="flaticon-user"></i>
                   </a>
                </div>
                <div class="navbar-option-item d-none d-lg-none d-md-block">
                   <button type="button" id="search1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="flaticon-search"></i>
                   </button>
                   <div class="dropdown-menu mobile-search" aria-labelledby="search1">
                      <form>
                         <input type="text" class="form-control" placeholder="Search product">
                         <button class="btn main-btn" type="submit">Search</button>
                      </form>
                   </div>
                </div>
                <div class="navbar-option-item d-none d-lg-none d-md-block">
                   <a href="wishlist.html" class="navbar-add-cart">
                   <i class="flaticon-like"></i>
                   <span class="topbar-action-counter">05</span>
                   </a>
                </div>
                <div class="navbar-option-item d-lg-none d-md-block cart-option-dropdown">
                   <a href="#" class="navbar-add-cart cartbtn">
                   <i class="flaticon-shopping-cart"></i>
                   <span class="topbar-action-counter">02</span>
                   </a>
                   <div class="cart-modal">
                      <div class="cart-close-btn close-btn">
                         <i class="flaticon-close"></i>
                      </div>
                      <div class="cart-modal-products">
                         <div class="cart-modal-product">
                            <div class="cart-product-info">
                               <a href="single-shop.html">
                                  <div class="cart-product-thumb">
                                     <img src="{{ asset('frontend/assets') }}/images/products/product-13.png" alt="product">
                                  </div>
                                  <div class="cart-product-details">
                                     <h3>Stylish Chair</h3>
                                     <p>Price: <span>$200.0</span></p>
                                     <p>Qty: <span>2 pcs</span></p>
                                  </div>
                               </a>
                            </div>
                            <div class="cart-product-remove">
                               <a href="#">
                               <i class="flaticon-delete"></i>
                               </a>
                            </div>
                         </div>
                         <div class="cart-modal-product">
                            <div class="cart-product-info">
                               <a href="single-shop.html">
                                  <div class="cart-product-thumb">
                                     <img src="{{ asset('frontend/assets') }}/images/products/product-15.png" alt="product">
                                  </div>
                                  <div class="cart-product-details">
                                     <h3>Furnished Sofa</h3>
                                     <p>Price: <span>$300.0</span></p>
                                     <p>Qty: <span>1 pc</span></p>
                                  </div>
                               </a>
                            </div>
                            <div class="cart-product-remove">
                               <a href="#">
                               <i class="flaticon-delete"></i>
                               </a>
                            </div>
                         </div>
                      </div>
                      <div class="cart-details">
                         <div class="cart-total-box">
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
                         <a href="cart.html" class="btn main-btn full-width">Add To Cart</a>
                         <a href="checkout.html" class="btn main-btn full-width main-btn-bgless">Checkout</a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- //////////// Get Category Data ///////////// -->
       @php
            $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
       @endphp
       <div class="main-nav">
          <div class="container">
             <nav class="navbar navbar-expand-md navbar-light">
                <div class="navbar-category">
                   <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                      <ul class="navbar-nav mx-auto">
                       <li class="nav-item">
                          <div class="category-button">
                              <i class="flaticon-menu"></i>
                              <a href="javascript:void(0)" class="nav-link dropdown-toggle">
                                @if(session()->get('language') == 'arabic') التصنيفات @else Categories @endif         
                                </a>
                           </div>
                           <ul class="dropdown-menu">

                            @foreach($categories as $category)
                              <li class="nav-item nav-item__border">
                                 <a href="javascript:void(0)" class="nav-link dropdown-toggle">
                                    @if(session()->get('language') == 'arabic') 
                                    {{ $category->category_name_ar }}
                                    @else 
                                    {{ $category->category_name_en }}
                                    @endif                                     
                                 </a>
                                 <ul class="dropdown-menu">

                                    @php
                                         $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                                    @endphp

                                    @foreach($subcategories as $sub)
                                    <li class="nav-item nav-item__border">
                                        <a href="javascript:void(0)" class="nav-link dropdown-toggle">
                                            @if(session()->get('language') == 'arabic') 
                                            {{ $sub->subcategory_name_ar }}
                                            @else 
                                            {{ $sub->subcategory_name_en }}
                                            @endif
                                            
                                        </a>
                                       <ul class="dropdown-menu">

                                        @php
                                            $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $sub->id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                                        @endphp

                                        @foreach($subsubcategories as $subsub)
                                           <li class="nav-item nav-item__border">
                                            <a href="login.html" class="nav-link">
                                                @if(session()->get('language') == 'arabic') 
                                                {{ $subsub->subsubcategory_name_ar }}
                                                @else 
                                                {{ $subsub->subsubcategory_name_en }}
                                                @endif
                                            </a>
                                           </li>
                                        @endforeach

                                        </ul>
                                    </li>
                                    @endforeach

                                 </ul>
                              </li>
                            @endforeach

                           </ul>
                        </li>
                      </ul>
                   </div>

                </div>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                   <ul class="navbar-nav mx-auto">
                      <li class="nav-item">
                         <a href="{{ url('/') }}" class="nav-link">
                            @if(session()->get('language') == 'arabic') مسكن @else Home @endif
                            </a>
                      </li>

                        <!-- //////////// Get Category Data ///////////// -->
                        @php
                            $categories_h = App\Models\Category::orderBy('category_name_en', 'ASC')->take(5)->get();
                        @endphp
                      
                      @foreach($categories_h as $category)
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link dropdown-toggle">
                                    @if(session()->get('language') == 'arabic') {{ $category->category_name_ar }} 
                                    @else 
                                    {{ $category->category_name_en }} 
                                    @endif
                                </a>
                                <ul class="dropdown-menu">

                                @php
                                        $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                                @endphp

                                @foreach($subcategories as $sub)
                                <li class="nav-item nav-item__border">
                                    <a href="javascript:void(0)" class="nav-link dropdown-toggle">
                                        @if(session()->get('language') == 'arabic') 
                                        {{ $sub->subcategory_name_ar }}
                                        @else 
                                        {{ $sub->subcategory_name_en }}
                                        @endif
                                        
                                    </a>
                                    <ul class="dropdown-menu">

                                    @php
                                        $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $sub->id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                                    @endphp

                                    @foreach($subsubcategories as $subsub)
                                        <li class="nav-item nav-item__border">
                                            <a href="login.html" class="nav-link">
                                                @if(session()->get('language') == 'arabic') 
                                                {{ $subsub->subsubcategory_name_ar }}
                                                @else 
                                                {{ $subsub->subsubcategory_name_en }}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach

                                    </ul>
                                </li>
                                @endforeach

                                </ul>
                            </li>
                        @endforeach
                      
                   </ul>
                </div>
                <div class="navbar-option">
                   <div class="navbar-option-item navbar-language dropdown language-option">
                      <button class="dropdown-toggle" type="button" id="language3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="flaticon-worldwide"></i>
                      <span>@if(session()->get('language') == 'arabic') لغة @else Language @endif</span>
                      </button>
                      <div class="dropdown-menu language-dropdown-menu" aria-labelledby="language3">
                         @if(session()->get('language') == 'arabic')
                         <a class="dropdown-item" href="{{ route('english.language') }}">
                         <img src="{{ asset('frontend/assets') }}/images/uk.png" alt="flag">
                         English
                         </a>
                         @else
                         <a class="dropdown-item" href="{{ route('arabic.language') }}">
                         <img src="{{ asset('frontend/assets') }}/images/uae.png" alt="flag">
                         العربيّة
                         </a>
                         @endif
                      </div>
                   </div>
                </div>
             </nav>
          </div>
       </div>
    </div>
 </div>
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
