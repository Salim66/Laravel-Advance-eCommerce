@extends('frontend.partial_master')

@section('partial_content')
<div class="body-content">
    <div class="container user-container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-1"></div>
            <div class="col-md-9 my-4">

                <div class="table-responsive">
                    <table class="table">
                      <tbody>

                        <tr class="table_header">
                          <td class="col-md-1" width="30%">
                            <label for=""> Date</label>
                          </td>

                          <td class="col-md-3">
                            <label for=""> Total</label>
                          </td>

                          <td class="col-md-3">
                            <label for=""> Payment</label>
                          </td>


                          <td class="col-md-2">
                            <label for=""> Invoice</label>
                          </td>

                           <td class="col-md-2">
                            <label for=""> Order</label>
                          </td>

                           <td class="col-md-1">
                            <label for=""> Action </label>
                          </td>

                        </tr>


                        @foreach($orders as $order)
                 <tr>
                          <td class="col-md-1" width="30%">
                            <label for=""> {{ $order->order_date }}</label>
                          </td>

                          <td class="col-md-3">
                            <label for=""> ${{ $order->amount }}</label>
                          </td>


                           <td class="col-md-3">
                            <label for=""> {{ $order->payment_method }}</label>
                          </td>

                          <td class="col-md-2">
                            <label for=""> {{ $order->invoice_no }}</label>
                          </td>

                   <td class="col-md-2">
                    <label for="">

                        @if($order->status == 'pending')
                            <span class="badge badge-pill badge-warning pending"> Pending </span>
                        @elseif($order->status == 'confirm')
                            <span class="badge badge-pill badge-warning confirm"> Confirm </span>

                        @elseif($order->status == 'processing')
                            <span class="badge badge-pill badge-warning processing"> Processing </span>

                        @elseif($order->status == 'picked')
                            <span class="badge badge-pill badge-warning picked"> Picked </span>

                        @elseif($order->status == 'shipped')
                            <span class="badge badge-pill badge-warning shipped"> Shipped </span>

                        @elseif($order->status == 'delivered')
                            <span class="badge badge-pill badge-warning delivered"> Delivered </span>

                                @if($order->return_order == 1)
                                <span class="badge badge-pill badge-warning return-request">Return Requested </span>

                                @endif

                        @else
                                <span class="badge badge-pill badge-warning cancel"> Cancel </span>

                        @endif
                      </label>
                  </td>

                   <td class="col-md-1">
                    <a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>

                     <a target="_blank" href="{{ url('user/invoice_download/'.$order->id ) }}" class="btn btn-sm btn-danger download"><i class="fa fa-download invoice"></i> Invoice </a>

                  </td>

                        </tr>
                        @endforeach





                      </tbody>

                    </table>

                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
