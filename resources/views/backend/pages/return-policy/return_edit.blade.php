@extends('admin.admin_master')

@section('main-content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- Edit Return Policy Page  -->
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Return Policy</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('return-policy.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $data->id }}">

                            <div class="form-group">
                                <div class="form-group">
                                    <h5>Return Policy English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="return_policy_descp_en" id="editor5" class="form-control" required>{{ $data->return_policy_descp_en }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Return Policy Arabic <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="return_policy_descp_ar" id="editor6" class="form-control" required>{{ $data->return_policy_descp_ar }}</textarea>
                                    </div>
                                </div>
                            </div>
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                           </div>
                        </form>
                   </div>
               </div>
               <!-- /.box-body -->
             </div>
           </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
@endsection
