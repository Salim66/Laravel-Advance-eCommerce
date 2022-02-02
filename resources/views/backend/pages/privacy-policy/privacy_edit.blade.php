@extends('admin.admin_master')

@section('main-content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- Edit Privacy Policy Page  -->
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Privacy Policy</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('privacy-policy.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $data->id }}">

                            <div class="form-group">
                                <div class="form-group">
                                    <h5>Privacy Policy English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="privacy_descp_en" id="editor5" class="form-control" required>{{ $data->privacy_descp_en }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Privacy Policy Arabic <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="privacy_descp_ar" id="editor6" class="form-control" required>{{ $data->privacy_descp_ar }}</textarea>
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
