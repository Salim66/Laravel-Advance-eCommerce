<footer class="footer bg-yellow bg-shape">
    <div class="footer-upper pt-100 pb-70 position-relative">
       <div class="container">
          <div class="row">
             <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="footer-content-item">
                   <div class="footer-logo">
                      <a href="index.html"><img src="{{ asset('frontend/assets') }}/images/logo.png" alt="logo"></a>
                   </div>
                   <div class="footer-details">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      <ul class="footer-payment-list">
                         <li>
                            <a href="https://www.americanexpress.com/">
                            <img src="{{ asset('frontend/assets') }}/images/american-express-sign.png" alt="payment">
                            </a>
                         </li>
                         <li>
                            <a href="https://en.wikipedia.org/wiki/Cirrus_(interbank_network)">
                            <img src="{{ asset('frontend/assets') }}/images/cirrus.png" alt="payment">
                            </a>
                         </li>
                         <li>
                            <a href="https://www.mastercard.us/en-us.html">
                            <img src="{{ asset('frontend/assets') }}/images/mastercard.png" alt="payment">
                            </a>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="footer-content-list footer-content-item desk-pad-left-70">
                   <div class="footer-content-title">
                      <h3>About Us</h3>
                   </div>
                   <ul class="footer-details footer-list">
                      <li>
                         <a href="contact.html">Contact Us</a>
                      </li>
                      <li>
                         <a href="terms-conditions.html">Terms & Conditions</a>
                      </li>
                      <li>
                         <a href="privacy-policy.html">Privacy & Policy</a>
                      </li>
                      <li>
                         <a href="blogs-grid.html">Latest Blogs</a>
                      </li>
                      <li>
                         <a href="shops-grid.html">Our Latest Shops</a>
                      </li>
                   </ul>
                </div>
             </div>
             <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="footer-content-list footer-content-item desk-pad-left-70">
                   <div class="footer-content-title">
                      <h3>Quick Links</h3>
                   </div>
                   <ul class="footer-details footer-list">
                      <li>
                         <a href="faqs.html">FAQ</a>
                      </li>
                      <li>
                         <a href="order-tracking.html">Order Tracking</a>
                      </li>
                      <li>
                         <a href="login.html">Authentication</a>
                      </li>
                      <li>
                         <a href="cart.html">My Cart</a>
                      </li>
                      <li>
                         <a href="wishlist.html">My Wishlist</a>
                      </li>
                   </ul>
                </div>
             </div>
             <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="footer-content-list footer-content-item desk-pad-left-70">
                   <div class="footer-content-title">
                      <h3>Useful Links</h3>
                   </div>
                   <ul class="footer-details footer-list">
                      <li>
                         <a href="shops-grid.html">New Arrivals</a>
                      </li>
                      <li>
                         <a href="about-us.html">About Us</a>
                      </li>
                      <li>
                         <a href="404.html">404 Error Page</a>
                      </li>
                      <li>
                         <a href="coming-soon-page.html">Coming Soon Page</a>
                      </li>
                      <li>
                         <a href="search-page.html">Search Page</a>
                      </li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="container">
       <div class="footer-lower">
          <div class="footer-lower-item">
             <div class="footer-copyright-text">
                <p>Copyright ©2022 Outo. Designed & Developed By <a href="https://techdynobd.com/" target="_blank">Techdyno BD</a></p>
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
                         <a href="#" class="btn main-btn main-btn-radius" onclick="addToCart()">Add To Cart</a>
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


@php
    $product = App\Models\Product::where('status', 1)->where('special_offer', 1)->latest()->first();
@endphp

<div class="newsletter-popup-wrapepr">
    <div class="newsletter-modal">
       <div class="close-btn newsletter-modal-close">
          <i class="flaticon-close"></i>
       </div>
       <div class="row align-items-center">
          <div class="col-md-6 pb-30">
             <div class="newsletter-item">
                <div class="section-title section-title-left text-md-start">
                    @php
                    $amount = $product->selling_price - $product->discount_price;
                    $discount = round(($amount/$product->selling_price)*100);
                    @endphp
                   <small>Get {{ $discount }}% offer in first buy.</small>
                   <h2>
                    @if(session()->get('language') == 'arabic')
                    {{ $product->product_name_ar }}
                    @else
                    {{ $product->product_name_en }}
                    @endif
                   </h2>
                   <p>
                    @if(session()->get('language') == 'arabic')
                    {{ $product->short_descp_ar }}
                    @else
                    {{ $product->short_descp_en }}
                    @endif
                   </p>
                </div>
                <form class="newsletter-form">
                   <div class="form-group form-group-radius">
                      <input type="text" placeholder="Enter email" class="form-control form-control-background" id="email" name="EMAIL" required>
                      <button class="btn main-btn main-btn-radius" type="submit">Subscribe Now</button>
                   </div>
                </form>
             </div>
          </div>
          <div class="col-md-6 pb-30 d-none d-md-block">
             <div class="newsletter-item text-center">
                <img src="{{ URL::to($product->product_thumbnail) }}" alt="newsletter">
             </div>
          </div>
       </div>
    </div>
</div>


{{-- Produc Add to Cart Script  --}}
<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })

    // Product add to cart modal
    function productAddToCart(id){
        // alert(id);

        $.ajax({
            type: 'GET',
            url: '/product/add-to-cart/modal/'+id,
            dataType:'json',
            success:function(data){
                // console.log(data);
                $('.pimg-cart').empty();

                $('.pname_cart-en').text(data.product.product_name_en);
                $('.pname_cart-ar').text(data.product.product_name_ar);
                $('.pcode_cart').text(data.product.product_code);
                $('.pcat_cart-en').text(data.product.category.category_name_en);
                $('.pcat_cart-ar').text(data.product.category.category_name_ar);
                $('.pbrand_cart-en').text(data.product.brand.brand_name_en);
                $('.pbrand_cart-ar').text(data.product.brand.brand_name_ar);

                $('#product_id').val(id);
                $('#qty').val(1);

                $('.pstock-cart').empty; 
                if(data.product.product_qty > 0){                    
                    $('.pstock-cart').html('<span id="available" class="badge badge-pill badge-success bg-success">Available</span>');
                }else {
                    $('.pstock-cart').html('<span id="available" class="badge badge-pill badge-danger bg-danger">Stockout</span>');
                }

                if(data.product.discount_price == null){
                    $('.product-price_cart').html('$'+data.product.selling_price);
                    
                }else {
                    $('.product-price_cart').html(`$`+data.product.discount_price+` <del>$`+data.product.selling_price+`</del>`);
                }

                let amount = data.product.selling_price - data.product.discount_price;
                let discount = Math.round((amount/data.product.selling_price) * 100);
                if(data.product.discount_price == null){
                    $('.product-status__cart').text('New');
                }else {
                    $('.product-status__cart').text(discount+'%');
                }
                $('.pimg-cart').html(`
                        <div class="item">
                            <img src="${data.product.product_thumbnail}" alt="product">
                        </div>`);
                
                $('.product-color-en').empty();
                $.each(data.color_en, function(key,value){
                    $('.product-color-en').append('<option value="'+value+'">'+value+'</option>');
                });

                $('.product-color-ar').empty();
                $.each(data.color_ar, function(key,value){
                    $('.product-color-ar').append('<option value="'+value+'">'+value+'</option>');
                });

                $('.product-size-en').empty();
                $.each(data.size_en, function(key,value){
                    $('.product-size-en').append('<option value="'+value+'">'+value+'</option>');
                });

                $('.product-size-ar').empty();
                $.each(data.size_ar, function(key,value){
                    $('.product-size-ar').append('<option value="'+value+'">'+value+'</option>');
                });
                        

            }
        });

    }// End Product add to cart modal

    // Add to Cart function 
    function addToCart(){
        let product_name_en = $('.pname_cart-en').text();
        let product_name_ar = $('.pname_cart-ar').text();
        let product_code = $('.pcode_cart').text();
        let color_en = $('.product-color-en option:selected').text();
        let color_ar = $('.product-color-ar option:selected').text();
        let size_en = $('.product-size-en option:selected').text();
        let size_ar = $('.product-size-ar option:selected').text();
        let id = $('#product_id').val();
        let quantity = $('#qty').val();

        $.ajax({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            dataType:'json',
            data: {
                product_name_en:product_name_en, product_name_ar:product_name_ar, product_code:product_code, color_en:color_en, color_ar:color_ar, size_en:size_en, size_ar:size_ar, quantity:quantity
            },
            url: "/cart/data/store/"+id,
            success: function(data){
                $('#closeCartModal').click();
                console.log(data);
            }
        });

    }// End Add to Cart function 

</script>
