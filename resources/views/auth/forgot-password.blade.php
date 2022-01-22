@extends('frontend.partial_master')

@section('partial_content')
<header class="header header-page-bg">
    <div class="container">
       <div class="header-page-content">
          <div class="row align-items-center">
             <div class="col-md-7">
                <div class="header-content">
                   <h1>Forget Password</h1>
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Forget Password</li>
                      </ol>
                   </nav>
                </div>
             </div>
             <div class="col-md-5 d-none d-md-block">
                <div class="header-content-image header-content-abs-image header-content-abs-image-lg">
                   <img src="{{ URL::to('frontend/') }}/assets/images/inner-page-header/page-5.png" alt="page">
                </div>
             </div>
          </div>
       </div>
    </div>
 </header>
 <div class="authentication-section p-tb-100">
    <div class="container">
       <div class="sub-section-title text-center">
          <p>Lost your password? Please enter your email address. <br> You will receive a link to create a new password via email.</p>
       </div>
       <div class="authentication-box">
          <div class="authentication-box-inner">

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group input-group-bg mb-20">
                   <span class="input-group-text" id="basic-addon1"><i class="flaticon-user"></i></span>
                   <input type="email" id="email" name="email" class="form-control" placeholder="Email address" aria-label="Email" aria-describedby="basic-addon1" :value="old('email')" required autofocus />
                </div>
                <button type="submit" class="btn main-btn main-btn-secondary full-width">Reset Password</button>
             </form>

          </div>
       </div>
    </div>
 </div>
 @endsection
