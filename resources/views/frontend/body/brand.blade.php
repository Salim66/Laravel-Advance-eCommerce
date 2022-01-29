@php
    $brands = App\Models\Brand::orderBy('id', 'DESC')->limit(8)->get();
@endphp
<div class="partner-section pb-100">
    <div class="container">
       <div class="partner-carousel owl-carousel">

        @foreach($brands as $brand)
          <div class="item">
             <a href="contact.html">
             <img src="{{ URL::to($brand->brand_image) }}" alt="partner">
             </a>
          </div>
        @endforeach
          
       </div>
    </div>
</div>
