@extends('admin.admin_master')

@section('main-content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Product List <span class="badge badge-pill badge-danger"> {{ count($products) }} </span> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product En</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $data)
                        <tr>
                            <td>
                                <img src="{{ URL::to($data->product_thumbnail) }}" class="backend_table_product-img" alt="">
                            </td>
                            <td>{{ $data->product_name_en }}</td>
                            <td>{{ $data->selling_price }} $</td>
                            <td>{{ $data->product_qty }} pcs</td>
                            <td>
                                @if($data->discount_price == NULL)
                                <span class="badge badge-pill badge-danger">No Discount</span>
                                @else
                                @php
                                    $amount = $data->selling_price - $data->discount_price;
                                    $discount = ($amount/$data->selling_price) * 100;
                                @endphp
                                <span class="badge badge-pill badge-danger">{{ round($discount) }} %</span>
                                @endif
                            </td>
                            <td>
                                @if($data->status == 1)
                                <span class="badge badge-pill badge-success">Active</span>
                                @else
                                <span class="badge badge-pill badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td width="30%">
                                <a title="View Product Data" href="{{ route('product.view', $data->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                <a title="Edit Data" href="{{ route('product.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <a title="Delete Data" href="{{ route('product.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                @if($data->status == 1)
                                <a title="Inactive Product" href="{{ route('product.inactive', $data->id) }}" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>
                                @else
                                <a title="Active Product" href="{{ route('product.active', $data->id) }}" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
                                @endif
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

      <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
@endsection
