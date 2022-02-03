@extends('frontend.partial_master')

@section('partial_content')
<header class="header header-page-bg">
    <div class="container">
       <div class="header-page-content">
          <div class="row align-items-center">
             <div class="col-md-7">
                <div class="header-content">
                   <h1>Register</h1>
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Register</li>
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
       <div class="authentication-header mb-30">
          <ul>
             <li>
                <a href="{{ route('login') }}">Login</a>
             </li>
             <li>
                <a href="{{ route('register') }}" class="active">Register</a>
             </li>
          </ul>
       </div>
       <div class="authentication-box">
          <div class="authentication-box-inner">

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-group input-group-bg mb-20">
                   <span class="input-group-text" id="basic-addon1"><i class="flaticon-user"></i></span>
                   <input type="text" id="name" name="name" class="form-control" placeholder="Name" aria-describedby="basic-addon1" :value="old('name')" required autofocus autocomplete="name" >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group input-group-bg mb-20">
                   <span class="input-group-text" id="basic-addon2"><i class="flaticon-user"></i></span>
                   <input type="email" id="email" name="email" class="form-control" required placeholder="Email address" aria-describedby="basic-addon2" :value="old('email')" >
                   @error('email')
                       <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                </div>
                <div class="input-group input-group-bg mb-20">
                    <span class="input-group-text" id="basic-addon5"><i class="flaticon-user"></i></span>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" aria-describedby="basic-addon5" :value="old('phone')" required autofocus autocomplete="phone" >
                    @error('phone')
                       <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                 </div>
                <div class="input-group input-group-bg mb-20">
                   <span class="input-group-text" id="basic-addon3"><i class="flaticon-key"></i></span>
                   <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" aria-describedby="basic-addon3" required autocomplete="new-password">
                   @error('password')
                       <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                </div>
                <div class="input-group input-group-bg mb-20">
                   <span class="input-group-text" id="basic-addon4"><i class="flaticon-key"></i></span>
                   <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Enter password" aria-describedby="basic-addon4" required autocomplete="new-password">
                   @error('password_confirmation')
                       <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                </div>
                <div class="authentication-account-access mb-20">
                   <div class="authentication-account-access-item">
                      <div class="input-checkbox input-checkbox-secondcolor">
                         <input type="checkbox" id="check1">
                         <label for="check1">Accept <a href="terms-conditions.html">terms & conditions</a> & <a href="privacy-policy.html">privacy policy</a>.</label>
                      </div>
                   </div>
                   <div class="authentication-account-access-item">
                      <div class="authentication-link">
                         Already have an account? <a href="{{ route('login') }}">Login</a>
                      </div>
                   </div>
                </div>
                <button type="submit" class="btn main-btn main-btn-secondary full-width">Register Now</button>
             </form>

             {{-- <div class="authentication-divider">
                <span>OR</span>
             </div>
             <ul class="social-list social-list-btn">
                <li class="social-btn-fb">
                   <a href="https://www.facebook.com/" target="_blank">
                   <i class="flaticon-facebook"></i>
                   </a>
                </li>
                <li class="social-btn-gm">
                   <a href="https://mail.google.com/" target="_blank">
                   <i class="flaticon-google-plus-logo"></i>
                   </a>
                </li>
             </ul> --}}
          </div>
       </div>
    </div>
</div>
@endsection
