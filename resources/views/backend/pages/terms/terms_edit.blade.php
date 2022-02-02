@extends('admin.admin_master')

@section('main-content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- Edit Terms Page  -->
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Terms & Condition</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('terms.update', $data->id) }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $data->id }}">

                            <div class="form-group">
                                <div class="form-group">
                                    <h5>Terms & Condition English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="terms_descp_en" id="editor5" class="form-control" required>{{ $data->terms_descp_en }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Terms & Condition Arabic <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="terms_descp_ar" id="editor6" class="form-control" required>{{ $data->terms_descp_ar }}</textarea>
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
