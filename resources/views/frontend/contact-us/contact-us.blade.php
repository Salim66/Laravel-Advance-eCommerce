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

<div class="contact-info-section pt-100 pb-70 box-width-870">
    <div class="container">
       <div class="row">
          <div class="col-sm-6 col-lg-4 pb-30">
             <div class="contact-card">
                <h3>Address</h3>
                <p>3227 Millbrook Road, UK</p>
                <p>4532 Millbrook Road, UK</p>
             </div>
          </div>
          <div class="col-sm-6 col-lg-4 pb-30">
             <div class="contact-card">
                <h3>Call Number</h3>
                <p><a href="tel:+1-456-7890-3524">+1 456 7890 3524</a></p>
                <p><a href="tel:+1-322-7498-1256">+1 322 7498 1256</a></p>
             </div>
          </div>
          <div class="col-sm-6 col-lg-4 pb-30 offset-lg-0 offset-sm-3">
             <div class="contact-card">
                <h3>Contact Info</h3>
                <p><a href="https://templates.envytheme.com/cdn-cgi/l/email-protection#5a323f3636350533343c351a352f2e353d28352f2a74393537"><span class="__cf_email__" data-cfemail="f29a979e9e9dad9b9c949db29d87869d95809d8782dc919d9f">[email&#160;protected]</span></a></p>
                <p><a href="https://templates.envytheme.com/cdn-cgi/l/email-protection#85ede0e9e9eadaecebe3eac5eaf0f1eae4e2e0ebe6fcabe6eae8"><span class="__cf_email__" data-cfemail="127a777e7e7d4d7b7c747d527d67667d7375777c716b3c717d7f">[email&#160;protected]</span></a></p>
             </div>
          </div>
       </div>
    </div>
</div>
<div class="map-section pb-100">
    <div class="container">
       <div class="contact-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317718.69319292053!2d-0.3817765050863085!3d51.528307984912544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2sbd!4v1615369385967!5m2!1sen!2sbd"></iframe>
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
                <form class="contact-form" id="contactForm">
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
                            <input type="checkbox" id="contact1">
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