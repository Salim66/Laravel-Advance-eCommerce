<!DOCTYPE html>
<html lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta name="description" content="Outo">
      <meta name="keywords" content="HTML,CSS,JavaScript">
      <meta name="author" content="EnvyTheme">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
      <title>Outo - Furniture Shop</title>
      <link rel="icon" href="{{ asset('frontend/assets') }}/images/favicon.png" type="image/png" sizes="16x16">
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/bootstrap.min.css" type="text/css" media="all" />
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/animate.min.css" type="text/css" media="all" />
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/owl.carousel.min.css" type="text/css" media="all" />
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/owl.theme.default.min.css" type="text/css" media="all" />
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/meanmenu.min.css" type="text/css" media="all" />
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/magnific-popup.min.css" type="text/css" media="all" />
      <link rel='stylesheet' href='{{ asset('frontend/assets') }}/css/flaticon.css' type="text/css" media="all" />
      <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/nice-select.css" type="text/css" media="all" />
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

      @include('frontend.body.partial_header')

      @section('partial_content')
      @show

      @include('frontend.body.partial_footer')

      <div class="scroll-top" id="scrolltop">
         <div class="scroll-top-inner scroll-top-inner-secondcolor">
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
      <script src="{{ asset('frontend/assets') }}/js/script.js"></script>
   </body>
</html>
