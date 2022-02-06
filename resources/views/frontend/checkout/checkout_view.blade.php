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
                   <h3 class="sub-section-title-heading">@if(session()->get('language') == 'arabic') تفاصيل الشحن @else Shipping Details @endif </h3>
                </div>
                <div class="checkout-form">
                   <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                      <div class="row">
                         <div class="col-sm-6">
                            <div class="form-group mb-20">
                               <label>@if(session()->get('language') == 'arabic') اسم @else Name @endif </label>
                               <input type="text" name="name" class="form-control form-control-background-white" required placeholder="Name*" value="{{ Auth::user()->name }}">
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="form-group mb-20">
                               <label>@if(session()->get('language') == 'arabic') بريد الالكتروني @else Email @endif </label>
                               <input type="text" name="email" class="form-control form-control-background-white" required placeholder="Email address*" value="{{ Auth::user()->email }}">
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="form-group mb-20">
                               <label>@if(session()->get('language') == 'arabic') هاتف @else Phone @endif </label>
                               <input type="number" name="phone" class="form-control form-control-background-white" required placeholder="Phone number*" value="{{ Auth::user()->phone }}">
                            </div>
                         </div>
                         <div class="col-sm-12 col-lg-6">
                            <div class="form-group mb-20">
                               <label>Postcode</label>
                               <input type="text" name="post_code" class="form-control  form-control-background-white" required placeholder="Postcode*">
                            </div>
                         </div>
                         <div class="col-sm-12">
                            <div class="form-group mb-20">
                               <label>@if(session()->get('language') == 'arabic') اختيار القسم @else Division Select @endif</label>
                               <select name="division_id" class="form-control form-control-background-white">
                                  <option selected disabled>-Select-</option>
                                @foreach($divisions as $division)
                                  <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                @endforeach
                               </select>
                            </div>
                         </div>
                         <div class="col-sm-12">
                            <div class="form-group mb-20">
                               <label>@if(session()->get('language') == 'arabic') تحديد المنطقة @else District Select @endif</label>
                               <select name="district_id" class="form-control form-control-background-white">
                                  <option selected disabled>-Select-</option>

                               </select>
                            </div>
                         </div>
                         <div class="col-sm-12">
                            <div class="form-group mb-20">
                               <label>@if(session()->get('language') == 'arabic') تحديد الدولة @else State Select @endif</label>
                               <select name="state_id" class="form-control form-control-background-white">
                                  <option selected disabled>-Select-</option>

                               </select>
                            </div>
                         </div>
                         <div class="col-sm-12">
                            <div class="form-group m-0">
                               <label>@if(session()->get('language') == 'arabic') ترتيب ملاحظات @else Order Notes @endif</label>
                               <textarea name="notes" class="form-control  form-control-background-white" rows="10" placeholder="Order notes*"></textarea>
                            </div>
                         </div>
                      </div>

                </div>
             </div>
          </div>
          <div class="col-lg-5 pb-30">
             <div class="checkout-item">
                <div class="sub-section-title">
                   <h3 class="sub-section-title-heading">@if(session()->get('language') == 'arabic') ملخص الطلب @else Order Summary @endif </h3>
                </div>
                <div class="cart-details">
                   <div class="cart-total-box cart-total-box-secondcolor mb-30">
                      <div class="cart-total-item">
                         <h4 class="checkout-total-title">@if(session()->get('language') == 'arabic') اسم المنتج @else Product Name @endif </h4>
                         <p class="checkout-total-title">@if(session()->get('language') == 'arabic') مجموع @else Total @endif</p>
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
                       @if(Session::has('coupon'))
                       <div class="cart-total-item">
                            <h4>@if(session()->get('language') == 'arabic') المجموع الفرعي @else Subtotal @endif  </h4>
                            <p>${{ $cartTotal }}</p>
                        </div>
                       <div class="cart-total-item">
                            <h4>@if(session()->get('language') == 'arabic') اسم القسيمة @else Coupon Name @endif  </h4>
                            <p>{{ session()->get('coupon')['coupon_name'] }} ({{ session()->get('coupon')['coupon_discount'] }}%)</p>
                        </div>
                       <div class="cart-total-item">
                            <h4>@if(session()->get('language') == 'arabic') خصم القسيمة @else Coupon Discount @endif  </h4>
                            <p>${{ session()->get('coupon')['coupon_amount'] }}</p>
                        </div>
                        <div class="cart-total-item">
                            <h4>@if(session()->get('language') == 'arabic') مجموع @else Total @endif </h4>
                            <p>${{ session()->get('coupon')['total_amount'] }}</p>
                        </div>
                       @else
                        <div class="cart-total-item">
                            <h4>@if(session()->get('language') == 'arabic') المجموع الفرعي @else Subtotal @endif  </h4>
                            <p>${{ $cartTotal }}</p>
                        </div>
                        <div class="cart-total-item">
                            <h4>@if(session()->get('language') == 'arabic') مجموع @else Total @endif </h4>
                            <p>${{ $cartTotal }}</p>
                        </div>
                      @endif
                   </div>
                </div>
                <div class="checkout-box checkout-payment-area">
                   <div class="sub-section-title">
                      <h3 class="sub-section-title-heading">What's Payment Method</h3>
                   </div>
                   <div class="checkout-payment-form">
                         <div class="input-checkbox input-checkbox-secondcolor mb-20">
                            <input type="radio" id="check3" name="cash">
                            <label for="check3">Cash</label>
                         </div>
                         <div class="sub-section-title">
                            <h3 class="sub-section-title-heading">Payment</h3>
                         </div>
                         <div class="row">
                            <div class="col-12">
                               <button class="btn main-btn main-btn-secondary full-width" type="submit">
                               Make Payment
                               </button>
                            </div>
                         </div>
                   </div>
                </div>
            </form>
             </div>
          </div>
       </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        // alert();
        // sub category find
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{  url('/get-division/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="state_id"]').html('');
                        var d =$('select[name="district_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                            });
                    },
                });
            } else {
                alert('danger');
            }
        });

        // sub sub category find
        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/get-state/ajax') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="state_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                            });
                    },
                });
            } else {
                alert('danger');
            }
        });

  });
</script>

@endsection
