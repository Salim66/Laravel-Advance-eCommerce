<div class="topbar">
    <div class="container">
       <div class="topbar-inner">
          <div class="row align-items-center justify-content-center justify-content-lg-between">
             <div class="topbar-item">
                <div class="topbar-brand">
                   <a href="{{ url('/') }}">
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