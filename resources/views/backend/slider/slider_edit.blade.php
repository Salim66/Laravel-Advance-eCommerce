@extends('admin.admin_master')

@section('main-content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- Edit Slider Page  -->
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Slider</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('slider.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <input type="hidden" name="old_image" value="{{ $data->slider_img }}">

                            <div class="form-group">
                                <h5>Slider Title English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="slider_title_en" class="form-control" value="{{ $data->slider_title_en }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Slider Title Arabic <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="slider_title_ar" class="form-control" value="{{ $data->slider_title_ar }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Slider Description English<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="slider_descp_en" id="textarea" class="form-control">{{ $data->slider_descp_en }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Slider Description Arabic<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="slider_descp_ar" id="textarea" class="form-control">{{ $data->slider_descp_ar }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Slider Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="slider_img" class="form-control">
                                    @error('slider_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Slider Link <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="slider_link" class="form-control" value="{{ $data->slider_link }}">
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
