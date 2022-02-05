@extends('frontend.partial_master')

@section('title')
Checkout Page
@endsection

@section('partial_content')
<header class="header header-page-bg">
    <div class="container">
       <div class="header-page-content">
          <div class="row align-items-center">
             <div class="col-md-7">
                <div class="header-content">
                   <h1>@if(session()->get('language') == 'arabic') الدفع @else Checkout @endif </h1>
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{ url('/') }}">@if(session()->get('language') == 'arabic') مسكن @else Home @endif</a></li>
                         <li class="breadcrumb-item"><a href="{{ url('/') }}">@if(session()->get('language') == 'arabic') محلات @else Shops @endif</a></li>
                         <li class="breadcrumb-item active" aria-current="page">@if(session()->get('language') == 'arabic') الدفع @else Checkout @endif </li>
                      </ol>
                   </nav>
                </div>
             </div>
             <div class="col-md-5 d-none d-md-block">
                <div class="header-content-image header-content-abs-image header-content-abs-image-lg">
                   <img src="{{ URL::to('/frontend/') }}/assets/images/inner-page-header/page-7.png" alt="page">
                </div>
             </div>
          </div>
       </div>
    </div>
</header>
<section class="checkout-section pt-100 pb-70">
    <div class="container">
       <div class="product-info-header product-info-header-three product-info-header-borderless">
          <h2>@if(session()->get('language') == 'arabic') الدفع @else Checkout @endif</h2>
          <a href="{{ url('/') }}" class="btn main-btn main-btn-secondary m-0">@if(session()->get('language') == 'arabic') العودة للتسوق @else Back To Shop @endif</a>
       </div>
       <div class="row">
          <div class="col-lg-7 pb-30">
             <div class="checkout-box desk-pad-right-30">
                <div class="sub-section-title">
                   <h3 class="sub-section-title-heading">Billing Details</h3>
                </div>
                <div class="checkout-form">
                   <form>
                      <div class="row">
                         <div class="col-sm-6">
                            <div class="form-group mb-20">
                               <label>Email</label>
                               <input type="text" name="email" class="form-control form-control-background-white" required placeholder="Email address*">
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="form-group mb-20">
                               <label>Phone</label>
                               <input type="text" name="phone" class="form-control form-control-background-white" required placeholder="Phone number*">
                            </div>
                         </div>
                         <div class="col-sm-12">
                            <div class="input-checkbox input-checkbox-secondcolor mb-20">
                               <input type="checkbox" id="check1">
                               <label for="check1">Get alert of product updates & offers</label>
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="form-group mb-20">
                               <label>First Name</label>
                               <input type="email" name="name" class="form-control form-control-background-white" required placeholder="First name*">
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="form-group mb-20">
                               <label>Last Name</label>
                               <input type="email" name="name" class="form-control form-control-background-white" required placeholder="Last name*">
                            </div>
                         </div>
                         <div class="col-sm-12">
                            <div class="form-group mb-20">
                               <label>Your Country</label>
                               <select name="country" class="form-control form-control-background-white">
                                  <option value="1">Your country*</option>
                                  <option value="2">USA</option>
                                  <option value="3">UK</option>
                                  <option value="4">Germany</option>
                               </select>
                            </div>
                         </div>
                         <div class="col-sm-12">
                            <div class="form-group mb-20">
                               <label>Company Name</label>
                               <input type="text" name="company-name" class="form-control form-control-background-white" placeholder="Company name">
                            </div>
                         </div>
                         <div class="col-sm-12">
                            <div class="form-group mb-20">
                               <label>Address</label>
                               <input type="text" name="company-name" class="form-control form-control-background-white" placeholder="Address">
                            </div>
                         </div>
                         <div class="col-sm-12">
                            <div class="form-group mb-20">
                               <label>Town/City</label>
                               <select name="country" class="form-control form-control-background-white">
                                  <option value="1">Town/City*</option>
                                  <option value="2">USA</option>
                                  <option value="3">UK</option>
                                  <option value="4">Germany</option>
                               </select>
                            </div>
                         </div>
                         <div class="col-sm-12 col-lg-6">
                            <div class="form-group mb-20">
                               <label>State / Country</label>
                               <input type="text" name="state-country" class="form-control  form-control-background-white" required placeholder="State / Country*">
                            </div>
                         </div>
                         <div class="col-sm-12 col-lg-6">
                            <div class="form-group mb-20">
                               <label>Postcode / Zip</label>
                               <input type="email" name="postcode-zip" class="form-control  form-control-background-white" required placeholder="Postcode / Zip*">
                            </div>
                         </div>
                         <div class="col-sm-12">
                            <div class="input-checkbox input-checkbox-secondcolor mb-20">
                               <input type="checkbox" id="check2">
                               <label for="check2" class="weight-600">Ship to a different address?</label>
                            </div>
                         </div>
                         <div class="col-sm-12">
                            <div class="form-group m-0">
                               <label>Order Notes</label>
                               <textarea name="order" class="form-control  form-control-background-white" rows="10" placeholder="Order notes*"></textarea>
                            </div>
                         </div>
                      </div>
                   </form>
                </div>
             </div>
          </div>
          <div class="col-lg-5 pb-30">
             <div class="checkout-item">
                <div class="sub-section-title">
                   <h3 class="sub-section-title-heading">Order Summary</h3>
                </div>
                <div class="cart-details">
                   <div class="cart-total-box cart-total-box-secondcolor mb-30">
                      <div class="cart-total-item">
                         <h4 class="checkout-total-title">Product Name</h4>
                         <p class="checkout-total-title">Total</p>
                      </div>

                      @foreach ($carts as $data)

                          @if(Session::has('coupon'))

                            <div class="cart-total-item">
                                <div class="cart-total-item-info">
                                <div class="product-table-thumb">
                                    <div class="cart-product-number">{{ $data->qty }}</div>
                                    <img src="{{ $data->options->image }}" alt="product">
                                </div>
                                @if($data->options->size_ar == null)
                                <h4>{{ $data->name }}</h4>
                                @else
                                <h4>{{ $data->options->name_ar }}</h4>
                                @endif
                                </div>
                                <p>${{ $data->price }}</p>
                            </div>

                          @else
                            <div class="cart-total-item">
                                <div class="cart-total-item-info">
                                <div class="product-table-thumb">
                                    <div class="cart-product-number">{{ $data->qty }}</div>
                                    <img src="{{ $data->options->image }}" alt="product">
                                </div>
                                @if($data->options->size_ar == null)
                                <h4>{{ $data->name }}</h4>
                                @else
                                <h4>{{ $data->options->name_ar }}</h4>
                                @endif
                                </div>
                                <p>${{ $data->price }}</p>
                            </div>
                          @endif

                      @endforeach




                   </div>
                   <div class="cart-total-box cart-total-box-secondcolor mb-30">
                      <div class="cart-total-item">
                         <h4>@if(session()->get('language') == 'arabic') المجموع الفرعي @else Subtotal @endif  </h4>
                         <p>${{ $cartTotal }}</p>
                      </div>
                      <div class="cart-total-item">
                         <h4>@if(session()->get('language') == 'arabic') مجموع @else Total @endif </h4>
                         <p>${{ $cartTotal }}</p>
                      </div>
                   </div>
                </div>
                <div class="checkout-box checkout-payment-area">
                   <div class="sub-section-title">
                      <h3 class="sub-section-title-heading">What's Payment Method</h3>
                   </div>
                   <div class="checkout-payment-form">
                      <form>
                         <div class="input-checkbox input-checkbox-secondcolor mb-20">
                            <input type="radio" id="check3" name="payment">
                            <label for="check3">Bank Transfer</label>
                         </div>
                         <div class="input-checkbox input-checkbox-secondcolor mb-20">
                            <input type="radio" id="check4" name="payment">
                            <label for="check4">Paypal</label>
                         </div>
                         <div class="input-checkbox input-checkbox-secondcolor mb-20">
                            <input type="radio" id="check5" name="payment">
                            <label for="check5">Visa</label>
                         </div>
                         <div class="sub-section-title">
                            <h3 class="sub-section-title-heading">Payment</h3>
                         </div>
                         <div class="row">
                            <div class="col-12">
                               <div class="form-group mb-20">
                                  <label>Card Holder Name</label>
                                  <input type="text" name="email" class="form-control form-control-background-white" required placeholder="Name on the card*">
                               </div>
                            </div>
                            <div class="col-12">
                               <div class="form-group mb-20">
                                  <label>Card Number</label>
                                  <input type="text" name="email" class="form-control form-control-background-white" required placeholder="1234 4567 7890">
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group mb-20">
                                  <label>Card Expire</label>
                                  <input type="text" name="number" class="form-control form-control-background-white" required placeholder="Card expire*">
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group mb-20">
                                  <label>CVC</label>
                                  <input type="text" name="number" class="form-control form-control-background-white" required placeholder="123*">
                               </div>
                            </div>
                            <div class="col-12">
                               <button class="btn main-btn main-btn-secondary full-width" type="submit">
                               Make Payment
                               </button>
                            </div>
                         </div>
                      </form>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
</section>

@endsection
