@extends('frontend.partial_master')

@section('partial_content')
<div class="body-content">
    <div class="container user-container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-5 my-4">

                <div class="card">
                    <div class="card-header"><h4>Shipping Details</h4></div>
                   <hr>
                   <div class="card-body shipping_details">
                     <table class="table">
                      <tr>
                        <th> Shipping Name : </th>
                         <th> {{ $order->name }} </th>
                      </tr>
          
                       <tr>
                        <th> Shipping Phone : </th>
                         <th> {{ $order->phone }} </th>
                      </tr>
          
                       <tr>
                        <th> Shipping Email : </th>
                         <th> {{ $order->email }} </th>
                      </tr>
          
                       <tr>
                        <th> Division : </th>
                         <th> {{ $order->division->division_name }} </th>
                      </tr>
          
                       <tr>
                        <th> District : </th>
                         <th> {{ $order->district->district_name }} </th>
                      </tr>
          
                       <tr>
                        <th> State : </th>
                         <th>{{ $order->state->state_name }} </th>
                      </tr>
          
                      <tr>
                        <th> Post Code : </th>
                         <th> {{ $order->post_code }} </th>
                      </tr>
          
                      <tr>
                        <th> Order Date : </th>
                         <th> {{ $order->order_date }} </th>
                      </tr>
                       
                     </table>
          
          
                   </div> 
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
