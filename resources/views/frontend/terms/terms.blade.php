@extends('frontend.partial_master')

@section('title')
Terms & Conditions Page
@endsection

@section('partial_content')

<header class="header header-page-bg">
    <div class="container">
       <div class="header-page-content">
          <div class="row align-items-center">
             <div class="col-md-7">
                <div class="header-content">
                   <h1>@if(session()->get('language') == 'arabic') البنود و الظروف @else Terms & Conditions @endif</h1>
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{ url('/') }}">@if(session()->get('language') == 'arabic') مسكن @else Home @endif </a></li>
                         <li class="breadcrumb-item active" aria-current="page">@if(session()->get('language') == 'arabic') البنود و الظروف @else Terms & Conditions @endif</li>
                      </ol>
                   </nav>
                </div>
             </div>
             <div class="col-md-5 d-none d-md-block">
                <div class="header-content-image header-content-abs-image header-content-abs-image-lg">
                   <img src="{{ URL::to('frontend/') }}/assets/images/inner-page-header/page-8.png" alt="page">
                </div>
             </div>
          </div>
       </div>
    </div>
</header>
<section class="privacy-policy-section p-tb-100">
    <div class="container">
       <div class="forum-details">
        @if(session()->get('language') == 'arabic') {!! $terms->terms_descp_ar !!}  @else {!! $terms->terms_descp_en !!}  @endif
       </div>
    </div>
</section>

@endsection