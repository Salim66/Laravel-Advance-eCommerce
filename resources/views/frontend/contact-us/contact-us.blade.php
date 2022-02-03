@extends('frontend.partial_master')

@section('title')
Contact Us Page
@endsection

@section('partial_content')

<header class="header header-page-bg">
    <div class="container">
       <div class="header-page-content">
          <div class="row align-items-center">
             <div class="col-md-7">
                <div class="header-content">
                   <h1>@if(session()->get('language') == 'arabic') اتصل بنا @else Contact Us @endif</h1>
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{ url('/') }}">@if(session()->get('language') == 'arabic') مسكن @else Home @endif </a></li>
                         <li class="breadcrumb-item active" aria-current="page">@if(session()->get('language') == 'arabic') اتصل بنا @else Contact Us @endif</li>
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

@php
    $contact = App\Models\ContactInfo::latest()->first();
@endphp

<div class="contact-info-section pt-100 pb-70 box-width-870">
    <div class="container">
       <div class="row">
          <div class="col-sm-6 col-lg-4 pb-30">
             <div class="contact-card">
                <h3>Address</h3>
                <p>{{ $contact->address }}</p>
             </div>
          </div>
          <div class="col-sm-6 col-lg-4 pb-30">
             <div class="contact-card">
                <h3>Call Number</h3>
                <p><a href="tel:{{ $contact->cell_number }}">{{ $contact->cell_number }}</a></p>
             </div>
          </div>
          <div class="col-sm-6 col-lg-4 pb-30 offset-lg-0 offset-sm-3">
             <div class="contact-card">
                <h3>Contact Email</h3>
                <p>{{ $contact->email_address }}</p>
             </div>
          </div>
       </div>
    </div>
</div>
<div class="map-section pb-100">
    <div class="container">
       <div class="contact-map">
          <iframe src="{{ $contact->google_address_map_link }}"></iframe>
       </div>
    </div>
</div>
<section class="contact-form-section pb-70">
    <div class="container">
       <div class="row">
          <div class="col-lg-6 pb-30">
             <div class="contact-form-item contact-form-image"></div>
          </div>
          <div class="col-lg-6 pb-30">
             <div class="contact-form-item contact-form-bg">
                <div class="sub-section-title">
                   <h2 class="sub-section-title-heading">Message</h2>
                </div>
                <form action="{{ route('contact-us.store') }}" method="POST">
                    @csrf
                   <div class="row">
                      <div class="col-sm-6">
                         <div class="form-group mb-20">
                            <label>Name</label>
                            <input type="text" name="name" id="name" class="form-control form-control-background-white" placeholder="Your name*" required data-error="Please enter your name" />
                            <div class="help-block with-errors"></div>
                         </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group mb-20">
                            <label>Phone number</label>
                            <input type="text" name="phone" id="phone" class="form-control form-control-background-white" placeholder="+125-40-5655" />
                         </div>
                      </div>
                      <div class="col-12">
                         <div class="form-group mb-20">
                            <label>Email address</label>
                            <input type="text" name="email" id="email" class="form-control form-control-background-white" placeholder="Email address*" required data-error="Please enter your email" />
                            <div class="help-block with-errors"></div>
                         </div>
                      </div>
                      <div class="col-12">
                         <div class="form-group mb-20">
                            <label>Email subject</label>
                            <input type="text" name="subject" id="subject" class="form-control form-control-background-white" placeholder="Email subject*" required data-error="Please enter your subject" />
                            <div class="help-block with-errors"></div>
                         </div>
                      </div>
                      <div class="col-12">
                         <div class="form-group mb-20">
                            <label>Message</label>
                            <textarea name="message" class="form-control form-control-background-white" id="message" rows="6" placeholder="Message"></textarea>
                         </div>
                      </div>
                      <div class="col-12">
                         <div class="input-checkbox input-checkbox-secondcolor mb-20">
                            <input type="checkbox" id="contact1" name="agree">
                            <label for="contact1">I have read all <a href="terms-condition.html">terms & condition</a> & <a href="privacy-policy.html">privacy policy</a>.</label>
                         </div>
                      </div>
                      <div class="col-12">
                         <button class="btn main-btn main-btn-secondary full-width" type="submit">Send Message</button>
                         <div id="msgSubmit"></div>
                      </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </div>
</section>

@endsection