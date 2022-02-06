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

            <div class="col-md-5 my-4">
                <div class="card">
                  <div class="card-header"><h4>Order Details
                        <span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
                  </div>
                 <hr>
                 <div class="card-body shipping_details">
                   <table class="table">
                    <tr>
                      <th>  Name : </th>
                       <th> {{ $order->user->name }} </th>
                    </tr>
        
                     <tr>
                      <th>  Phone : </th>
                       <th> {{ $order->user->phone }} </th>
                    </tr>
        
                     <tr>
                      <th> Payment Type : </th>
                       <th> {{ $order->payment_method }} </th>
                    </tr>
        
                     <tr>
                      <th> Invoice  : </th>
                       <th class="text-danger"> {{ $order->invoice_no }} </th>
                    </tr>
        
                     <tr>
                      <th> Order Total : </th>
                       <th>${{ $order->amount }} </th>
                    </tr>
        
                    <tr>
                      <th> Order : </th>
                       <th>   
                        <span class="badge badge-pill badge-warning order_status">{{ $order->status }} </span> </th>
                    </tr>
        
                   
                     
                   </table>
        
        
                 </div> 
                  
                </div>
                
            </div> <!-- // 2ND end col md -5 -->
            <div class="col-md-2 my-4">
            </div>
            <div class="col-md-10 my-4">
                <div class="table-responsive">
                    <table class="table">
                      <tbody>
            
                        <tr class="shipping_details">
                          <td class="col-md-1">
                            <label for=""> Image</label>
                          </td>
          
                          <td class="col-md-3">
                            <label for=""> Product Name </label>
                          </td>
          
                          <td class="col-md-3">
                            <label for=""> Product Code</label>
                          </td>
          
          
                          <td class="col-md-2">
                            <label for=""> Color </label>
                          </td>
          
                           <td class="col-md-2">
                            <label for=""> Size </label>
                          </td>
          
                           <td class="col-md-1">
                            <label for=""> Quantity </label>
                          </td>
          
                          <td class="col-md-1">
                            <label for=""> Price </label>
                          </td>
          
                           <td class="col-md-1">
                            <label for=""> Download </label>
                          </td>
                          
                        </tr>
          
          
                        @foreach($orderItem as $item)
                 <tr>
                          <td class="col-md-1">
                            <label for=""><img src="{{ URL::to($item->product->product_thumbnail) }}" height="50px;" width="50px;"> </label>
                          </td>
          
                          <td class="col-md-3">
                            <label for=""> {{ $item->product->product_name_en }}</label>
                          </td>
          
          
                           <td class="col-md-3">
                            <label for=""> {{ $item->product->product_code }}</label>
                          </td>
          
                          <td class="col-md-2">
                            <label for=""> {{ $item->color }}</label>
                          </td>
          
                          <td class="col-md-2">
                            <label for=""> {{ $item->size }}</label>
                          </td>
          
                           <td class="col-md-2">
                            <label for=""> {{ $item->qty }}</label>
                          </td>
          
                    <td class="col-md-2">
                            <label for=""> ${{ $item->price }}  ( $ {{ $item->price * $item->qty}} ) </label>
                          </td>
          
          
          @php 
          $file = App\Models\Product::where('id',$item->product_id)->first();
          @endphp
          
                       <td class="col-md-1">
                        @if($order->status == 'pending')  
                        <strong>
           <span class="badge badge-pill badge-success" style="background: #418DB9;"> No File</span>  </strong> 
                          
                        @elseif($order->status == 'confirm')  
          
          <a target="_blank" href="{{ asset('upload/pdf/'.$file->digital_file) }}">  
            <strong>
           <span class="badge badge-pill badge-success" style="background: #FF0000;"> Download Ready</span>  </strong> </a> 
                        @endif
          
          
                          </td>
          
          
          
          
                          
                        </tr>
                        @endforeach
          
          
          
          
          
                      </tbody>
                      
                    </table>
                    
                  </div>
                
            </div> <!-- // 2ND end col md -5 -->

        </div>
    </div>
</div>
@endsection
