<footer class="footer bg-yellow bg-shape">
    <div class="footer-upper pt-100 pb-70 position-relative">
       <div class="container">
          <div class="row">
             <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="footer-content-item">
                   <div class="footer-logo">
                      <a href="index.html"><img src="{{ asset('frontend/assets') }}/images/logo.png" alt="logo"></a>
                   </div>
                   <div class="footer-details">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                   </div>
                </div>
             </div>
             <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                <div class="footer-content-list footer-content-item desk-pad-left-70">
                   <div class="footer-content-title">
                      <h3>About Us</h3>
                   </div>
                   <ul class="footer-details footer-list">
                      <li>
                         <a href="contact.html">Contact Us</a>
                      </li>
                      <li>
                        <a href="privacy-policy.html">Privacy & Policy</a>
                      </li>
                      <li>
                        <a href="blogs-grid.html">Return Policy</a>
                      </li>
                      <li>
                         <a href="terms-conditions.html">Terms & Conditions</a>
                      </li>                      
                   </ul>
                </div>
             </div>             
             </div>
          </div>
       </div>
    </div>
    <div class="container">
       <div class="footer-lower">
          <div class="footer-lower-item">
             <div class="footer-copyright-text">
                <p>Copyright ©2022 Elegant Furnitur QR. Designed & Developed By <a href="https://techdynobd.com/" target="_blank">Techdyno BD</a></p>
             </div>
          </div>
          <div class="footer-lower-item">
             <ul class="social-list">
                <li>
                   <a href="https://www.facebook.com/" target="_blank"><i class="flaticon-facebook"></i></a>
                </li>
                <li>
                   <a href="https://www.instagram.com/" target="_blank"><i class="flaticon-instagram"></i></a>
                </li>
                <li>
                   <a href="https://twitter.com/" target="_blank"><i class="flaticon-twitter"></i></a>
                </li>
                <li>
                   <a href="https://www.pinterest.com/" target="_blank"><i class="flaticon-pinterest"></i></a>
                </li>
             </ul>
          </div>
       </div>
    </div>
</footer>

<!-- Start Quick Add To Cart Product -->
<div class="quick-add-to-cart-wrapper">
    <div class="quick-view-modal">
       <div class="close-btn quick-add-to-cart-close" id="closeCartModal">
          <i class="flaticon-close"></i>
       </div>
       <div class="quick-view-body">
          <div class="row align-items-center">
             <div class="col-12 col-md-5 col-lg-6">
                <div class="quick-view-product-carousel owl-carousel owl-theme default-carousel pimg-cart">
                   {{-- <div class="item">
                      <img src="{{ asset('frontend/assets') }}/images/products/product-13.png" alt="product">
                   </div> --}}
                </div>
             </div>
             <div class="col-12 col-md-7 col-lg-6">
                <div class="quick-view-product-content">
                   <div class="product-status product-status__cart"></div>

                   @if(session()->get('language') == 'arabic')
                   <h3 class="pname_cart-ar"></h3>
                   @else  
                   <h3 class="pname_cart-en"></h3>
                   @endif

                   <div>@if(session()->get('language') == 'arabic') سعر المنتج: @else Product Price: @endif<strong class="product-price_cart"></strong></div>
                   <h6>@if(session()->get('language') == 'arabic') سعر المنتج: @else Product Code: @endif<strong class="pcode_cart"></strong></h6>

                   @if(session()->get('language') == 'arabic')
                   <h6>فئة المنتج: <strong class="pcat_cart-ar"></strong></h6>
                   @else    
                   <h6>Product Category: <strong class="pcat_cart-en"></strong></h6>
                   @endif

                   @if(session()->get('language') == 'arabic')
                   <h6>العلامة التجارية المنتج: <strong class="pbrand_cart-ar"></strong></h6>
                   @else 
                   <h6>Product Brand: <strong class="pbrand_cart-en"></strong></h6>
                   @endif 
                   
                   @if(session()->get('language') == 'arabic')
                   <h6>مخزون المنتج: <strong class="pstock_cart"> </strong></h6>
                   @else 
                   <h6>Product Stock: <strong class="pstock-cart"></strong></h6>
                   @endif

                   <div class="product-choice">
                      <div class="product-choice-item">
                        <label>@if(session()->get('language') == 'arabic') حدد الألوان @else Select Colors @endif</label>
                        @if(session()->get('language') == 'arabic')
                         <select class="form-control product-color-ar" name="color-ar">

                         </select>
                         @else   
                         <select class="form-control product-color-en" name="color-en">

                         </select>
                         @endif
                      </div>

                      <div class="product-choice-item">
                        <label>@if(session()->get('language') == 'arabic') أختر الحجم @else Select Size @endif</label>
                        @if(session()->get('language') == 'arabic')
                         <select class="form-control product-size-ar" class="size-ar">
                            
                         </select>
                         @else     
                         <select class="form-control product-size-en" class="size-en">
                            
                         </select>
                         @endif
                      </div>

                      <div class="product-choice-item mt-3">
                        <label>@if(session()->get('language') == 'arabic') حدد الكمية @else Select Quantity @endif</label>
                        <div class="cart-quantity">
                           <button class="qu-btn dec">-</button>
                           <input type="text" class="qu-input" id="qty" value="1">
                           <button class="qu-btn inc">+</button>
                        </div>
                      </div>
                   </div>
                   <input type="hidden" id="product_id">
                   <div class="product-action">
                      <div class="product-action-item">
                         <button type="submit" class="btn main-btn main-btn-radius" onclick="addToCart()">Add To Cart</button>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>
<!-- End Quick Add To Cart Product -->

<!-- Start Quick View Product -->
<div class="quick-view-wrapper">
    <div class="quick-view-modal">
       <div class="close-btn quick-view-close">
          <i class="flaticon-close"></i>
       </div>
       <div class="quick-view-body">
          <div class="row align-items-center">
             <div class="col-12 col-md-5 col-lg-6">
                <div class="quick-view-product-carousel owl-carousel owl-theme default-carousel">
                   <div class="item">
                      <img src="{{ asset('frontend/assets') }}/images/products/product-13.png" alt="product">
                   </div>
                   <div class="item">
                      <img src="{{ asset('frontend/assets') }}/images/products/product-14.png" alt="product">
                   </div>
                   <div class="item">
                      <img src="{{ asset('frontend/assets') }}/images/products/product-15.png" alt="product">
                   </div>
                </div>
             </div>
             <div class="col-12 col-md-7 col-lg-6">
                <div class="quick-view-product-content">
                   <div class="product-status">-20%</div>
                   <h3>Stylish Chair</h3>
                   <p>Lorem ipsum dolor sit amet consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt labore et dolore magna aliquyam erat sed diam voluptua.</p>
                   <div class="product-price">$200.0 <del>$270.0</del></div>
                   <div class="share-post">
                      <h4>Share:</h4>
                      <ul class="social-list">
                         <li>
                            <a href="https://www.facebook.com/" target="_blank"><i class="flaticon-facebook"></i></a>
                         </li>
                         <li>
                            <a href="https://www.instagram.com/" target="_blank"><i class="flaticon-instagram"></i></a>
                         </li>
                         <li>
                            <a href="https://twitter.com/" target="_blank"><i class="flaticon-twitter"></i></a>
                         </li>
                         <li>
                            <a href="https://www.pinterest.com/" target="_blank"><i class="flaticon-pinterest"></i></a>
                         </li>
                      </ul>
                   </div>
                   <div class="product-choice">
                      <div class="product-choice-item">
                         <label>Select Colors</label>
                         <select class="form-control product-color">
                            <option value="1">Available colors</option>
                            <option value="2">Blue</option>
                            <option value="3">Green</option>
                         </select>
                      </div>
                      <div class="product-choice-item">
                         <label>Select Amount</label>
                         <select class="form-control product-color">
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                         </select>
                      </div>
                   </div>
                   <div class="product-action">
                      <div class="product-action-item">
                         <a href="#" class="btn main-btn main-btn-radius">Add To Cart</a>
                      </div>
                      <div class="product-action-item">
                         <a href="#" class="btn main-btn main-btn-radius main-btn-bgless">
                         <i class="flaticon-like"></i>
                         </a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>
<!-- End Quick View Product -->







