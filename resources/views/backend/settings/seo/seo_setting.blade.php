@extends('admin.admin_master')

@section('main-content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- Edit Seo Setting Page  -->
        <div class="col-8">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Seo Setting</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('update.seosettings') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $data->id }}">

                            <div class="form-group">
                                <h5>Meta Title <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="meta_title" class="form-control" value="{{ $data->meta_title }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Meta Author <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="meta_author" class="form-control" value="{{ $data->meta_author }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Meta Keyword <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="meta_keyword" class="form-control" value="{{ $data->meta_keyword }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Meta Description <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="meta_description" id="textarea" class="form-control">{{ $data->meta_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Google Analytics <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="google_analytics" id="textarea" class="form-control" required>{{ $data->google_analytics }}</textarea>
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
