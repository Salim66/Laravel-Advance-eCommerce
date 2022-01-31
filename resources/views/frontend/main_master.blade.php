<!DOCTYPE html>
<html lang="zxx">
   <!-- Mirrored from templates.envytheme.com/outo/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Jan 2022 13:35:03 GMT -->
   <head>
      <meta charset="utf-8">
      <meta name="description" content="Outo">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="keywords" content="HTML,CSS,JavaScript">
      <meta name="author" content="EnvyTheme">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
      <title>@yield('title') - Furniture Shop</title>
      <link rel="icon" href="{{ asset('frontend/assets') }}/images/favicon.png" type="image/png" sizes="16x16">
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/bootstrap.min.css" type="text/css" media="all" />
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/animate.min.css" type="text/css" media="all" />
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/owl.carousel.min.css" type="text/css" media="all" />
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/owl.theme.default.min.css" type="text/css" media="all" />
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/meanmenu.min.css" type="text/css" media="all" />
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/magnific-popup.min.css" type="text/css" media="all" />
      <link rel='stylesheet' href='{{ asset('frontend/assets') }}/css/flaticon.css' type="text/css" media="all" />
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/nice-select.css" type="text/css" media="all" />
      <!-- Toastr CSS -->
	  <link rel="stylesheet" href="{{ asset('backend/css/toastr.min.css') }}">
      <!-- Fontawesome -->
	  <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.min.css') }}">

      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/style.css" type="text/css" media="all" />
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/responsive.css" type="text/css" media="all" />
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/custom.css" type="text/css" media="all" />

   </head>
   <body>
      <div class="preloader">
         <div class="preloader-wrapper">
            <div class="preloader-content">
               <div class="blob-1"></div>
               <div class="blob-2"></div>
            </div>
         </div>
      </div>

      @include('frontend.body.home_header')

      @section('content')
      @show

      @include('frontend.body.home_footer')

      <div class="scroll-top" id="scrolltop">
         <div class="scroll-top-inner">
            <i class="flaticon-up-arrow"></i>
         </div>
      </div>
      <script src="{{ asset('frontend/assets') }}/js/jquery-3.6.0.min.js"></script>
      <script src="{{ asset('frontend/assets') }}/js/bootstrap.bundle.min.js"></script>
      <script src="{{ asset('frontend/assets') }}/js/jquery-ui.js"></script>
      <script src="{{ asset('frontend/assets') }}/js/jquery.magnific-popup.min.js"></script>
      <script src="{{ asset('frontend/assets') }}/js/owl.carousel.min.js"></script>
      <script src="{{ asset('frontend/assets') }}/js/jquery.nice-select.min.js"></script>
      <script src="{{ asset('frontend/assets') }}/js/isotope.pkgd.min.js"></script>
      <script src="{{ asset('frontend/assets') }}/js/jquery.ajaxchimp.min.js"></script>
      <script src="{{ asset('frontend/assets') }}/js/form-validator.min.js"></script>
      <script src="{{ asset('frontend/assets') }}/js/contact-form-script.js"></script>
      <script src="{{ asset('frontend/assets') }}/js/jquery.meanmenu.min.js"></script>
      <script src="{{ asset('frontend/assets') }}/js/fontawesome.min.js"></script>
      <script src="{{ asset('frontend/assets') }}/js/script.js"></script>

      <!-- Sweetalert -->
      <script src="{{ asset('frontend/assets') }}/js/sweetalert2@11.js"></script>

      <!-- Toastr JS -->
	<script src="{{ asset('backend/js/toastr.min.js') }}"></script>
    <script type="text/javascript">
        @if(Session::has('message'))
         let type = "{{ Session::get('alert-type', 'info') }}"
         switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

              case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
        }
        @endif
    </script>


    <script type="text/javascript">
        // Start Mini Add to Cart function
        function miniCart(){
            
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response){
                    // console.log(response);

                    $('#cart_qty').text(response.cartQty);
                    $('#cart_sub_totla').text(response.cartTotal);

                    let miniCart = "";

                    $.each(response.carts, function(key,value){
                        console.log(value);
                        miniCart += `<div class="cart-modal-product">
                                        <div class="cart-product-info">
                                            <a href="single-shop.html">
                                                <div class="cart-product-thumb">
                                                    <img src="/${value.options.image}" alt="product">
                                                </div>
                                                <div class="cart-product-details">
                                                    <h3>
                                                        ${
                                                            (() => {
                                                                if(value.options.size_ar == null) {
                                                                    return value.name;

                                                                } else {
                                                                    return value.options.name_ar;

                                                                }

                                                            })()

                                                        }    
                                                    </h3>
                                                    <p>Price: <span>$${value.price}</span></p>
                                                    <p>Qty: <span>${value.qty} pcs</span></p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="cart-product-remove">
                                            <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)">
                                            <i class="flaticon-delete"></i>
                                            </button>
                                        </div>
                                    </div>`;
                    });

                    $('#midiCart').html(miniCart);

                }
            });
        }
        // End Mini Add to Cart function
        miniCart();


        // Start Mini Cart Remove
        function miniCartRemove(rowId){
            
            $.ajax({
                type:"GET",
                url:"/minicart/product-remove/"+rowId,
                dataType:"json",
                success:function(data){
                    miniCart();

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                        })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // End Message 

                }
            });

        }
        // End Mini Cart Remove

    </script>
   </body>
   <!-- Mirrored from templates.envytheme.com/outo/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Jan 2022 13:36:04 GMT -->
</html>
