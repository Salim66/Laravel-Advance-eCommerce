@extends('admin.admin_master')

@section('main-content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Product List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name English</th>
                            <th>Product Name Arabic</th>
                            <th>Quantity</th>
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
                            <td>{{ $data->product_name_ar }}</td>
                            <td>{{ $data->product_qty }}</td>
                            <td width="30%">
                                <a title="Edit Data" href="{{ route('category.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <a title="Delete Data" href="{{ route('category.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
