@extends('admin.admin_master')

@section('main-content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Delivered Order List <span class="badge badge-pill badge-danger"> {{ count($orders) }} </span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Invoice</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $data)
                        <tr>
                            <td>{{ $data->order_date }}</td>
                            <td>{{ $data->invoice_no }}</td>
                            <td>${{ $data->amount }}</td>
                            <td>{{ $data->payment_method }}</td>
                            <td><span class="badge badge-pill badge-success">{{ $data->status }}</span></td>
                            <td width="25%">
                                <a title="Order Details" href="{{ route('pending.order.detials', $data->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>

                                <a target="_blank" href="{{ route('invoice.download',$data->id) }}" class="btn btn-danger" title="Invoice Download">
                                    <i class="fa fa-download"></i></a>
                                    <a title="Order Delete" id="delete" href="{{ route('pending.order.delete', $data->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <!-- /.col -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
@endsection
