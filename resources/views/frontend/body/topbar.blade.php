<div class="topbar">
    <div class="container">
       <div class="topbar-inner">
          <div class="row align-items-center justify-content-center justify-content-lg-between">
             <div class="topbar-item">
                <div class="topbar-brand">
                    @php
                        $logo = App\Models\Logo::latest()->first();
                    @endphp
                   <a href="{{ url('/') }}">
                   <img src="{{ asset($logo->logo) }}" alt="logo">
                   </a>
                </div>
             </div>
             <div class="topbar-item">
                <div class="topbar-search">
                   <form action="{{ route('product.search') }}" method="POST">
                    @csrf
                     <input type="text" id="search" name="search" class="form-control" placeholder="@if(session()->get('language') == 'arabic') البحث عن المنتج @else Search product @endif" onfocus="search_result_show()" onblur="search_result_hide()">
                     <button class="btn main-btn" type="submit">
                      @if(session()->get('language') == 'arabic') بحث @else Search @endif
                      </button>
                   </form>
                   <div id="searchProducts"></div>
                </div>
             </div>
             <div class="topbar-item topbar-item-rightside">
                <div class="topbar-action">
                   <div class="topbar-action-item">
                       @auth
                      <a href="{{ route('dashboard') }}">
                         <i class="flaticon-user"></i>

                         <span>@if(session()->get('language') == 'arabic') ملفي @else My Profile @endif</span>
                      </a>
                      @else
                      <a href="{{ route('login') }}">
                         <i class="flaticon-user"></i>
                         <span>@if(session()->get('language') == 'arabic') تسجيل الدخول @else Login @endif</span>
                      </a>
                      @endauth

                   </div>
                   <div class="topbar-action-item">
                      <a href="{{ route('wishlist') }}">
                      <i class="flaticon-like"></i>
                      <span>@if(session()->get('language') == 'arabic') قائمة الرغبات @else Wishlist @endif</span>
                      <span class="topbar-action-counter" id="wishlist_count"></span>
                      </a>
                   </div>
                   <div class="topbar-action-item cart-option-dropdown">
                      <a href="#" class="cartbtn">
                      <i class="flaticon-shopping-cart"></i>
                      <span>@if(session()->get('language') == 'arabic') عربة التسوق @else Cart @endif</span>
                      <span class="topbar-action-counter" id="cart_qty"></span>
                      </a>
                      <div class="cart-modal">
                         <div class="cart-close-btn close-btn">
                            <i class="flaticon-close"></i>
                         </div>
                         <div class="cart-modal-products">
                            {{-- // Mini Cart Load --}}
                            <div id="midiCart">


                            </div>

                         </div>
                         <div class="cart-details">
                            <div class="cart-total-box">
                               <div class="cart-total-item">
                                  <h4>@if(session()->get('language') == 'arabic') المجموع الفرعي @else Subtotal @endif </h4>
                                  <p>$<span id="cart_sub_totla"></span></p>
                               </div>
                            </div>
                            <a href="{{ route('my-cart') }}" class="btn main-btn full-width main-btn-bgless">@if(session()->get('language') == 'arabic') الدفع @else Checkout @endif </a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>
