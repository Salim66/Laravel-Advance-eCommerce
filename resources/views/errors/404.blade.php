@extends('frontend.partial_master')

@section('title')
404 error Page
@endsection

@section('partial_content')
<header class="header header-page-bg">
    <div class="container">
       <div class="header-page-content">
          <div class="row align-items-center">
             <div class="col-md-7">
                <div class="header-content">
                   <h1>404 Error Page</h1>
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                         <li class="breadcrumb-item active" aria-current="page">404 Error Page</li>
                      </ol>
                   </nav>
                </div>
             </div>
             <div class="col-md-5 d-none d-md-block">
                <div class="header-content-image header-content-abs-image header-content-abs-top">
                   <img src="{{ URL::to('/frontend/') }}/assets/images/inner-page-header/page-1.png" alt="page">
                </div>
             </div>
          </div>
       </div>
    </div>
 </header>
 <section class="error-page-section p-tb-100">
    <div class="container">
       <div class="error-page-content text-center">
          <img src="{{ URL::to('/frontend/') }}/assets/images/404.png" alt="404">
          <h2>Error 404: Page Not found</h2>
          <p>The page you were looking for could not be found.</p>
          <a href="{{ url('/') }}" class="btn main-btn main-btn-secondary">Go To Homepage</a>
       </div>
    </div>
 </section>
@endsection