@extends('frontend.partial_master')

@section('title')
Payment Page
@endsection

@section('partial_content')
<header class="header header-page-bg">
    <div class="container">
       <div class="header-page-content">
          <div class="row align-items-center">
             <div class="col-md-7">
                <div class="header-content">
                   <h1>@if(session()->get('language') == 'arabic') دفع @else Payment @endif </h1>
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{ url('/') }}">@if(session()->get('language') == 'arabic') مسكن @else Home @endif</a></li>
                         <li class="breadcrumb-item"><a href="{{ url('/') }}">@if(session()->get('language') == 'arabic') محلات @else Shops @endif</a></li>
                         <li class="breadcrumb-item active" aria-current="page">@if(session()->get('language') == 'arabic') دفع @else Payment @endif </li>
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
       <div class="row d-flex justify-content-center">
          <div class="col-lg-5 pb-30">
             <div class="checkout-item">
                <div class="sub-section-title text-center">
                   <h3 class="sub-section-title-heading">@if(session()->get('language') == 'arabic') مبلغ الشحن الخاص بك @else Your Shipping Amount @endif </h3>
                </div>
                <div class="cart-details">
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
                   <div class="checkout-payment-form">
                        <form action="{{ route('cash.order') }}" method="post" id="payment-form">
                         @csrf
                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                            <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                            <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                         <div class="row">
                            <div class="col-12">
                               <button class="btn main-btn main-btn-secondary full-width" type="submit">
                               Submit Payment
                               </button>
                            </div>
                         </div>
                        </form>
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
