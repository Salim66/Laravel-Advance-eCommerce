@extends('admin.admin_master')

@section('main-content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-8">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Slider List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Slider Img</th>
                            <th>Title En</th>
                            <th>Descp En</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $data)
                        <tr>
                            <td>
                                <img class="brand__img-table" src="{{ URL::to($data->slider_img) }}" alt="">
                            </td>
                            <td>
                                @if($data->slider_title_en == NULL)
                                <span class="badge badge-pill badge-danger">No Title</span>
                                @else
                                {{ $data->slider_title_en }}</td>
                                @endif
                            </td>
                            <td>
                                @if($data->slider_descp_en == NULL)
                                <span class="badge badge-pill badge-danger">No Description</span>
                                @else
                                {{ $data->slider_descp_en }}</td>
                                @endif
                            <td>
                                @if($data->status == 1)
                                <span class="badge badge-pill badge-success">Active</span>
                                @else
                                <span class="badge badge-pill badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td width="30%">
                                <a title="Edit Data" href="{{ route('slider.edit', $data->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                <a title="Delete Data" href="{{ route('slider.delete', $data->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                @if($data->status == 1)
                                <a title="Inactive Slider" href="{{ route('slider.inactive', $data->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-down"></i></a>
                                @else
                                <a title="Active Slider" href="{{ route('slider.active', $data->id) }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-up"></i></a>
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

        <!-- Add Slider Page  -->
        <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Slider</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Slider Title English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="slider_title_en" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Slider Title Arabic <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="slider_title_ar" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Slider Description English<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="slider_descp_en" id="textarea" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Slider Description Arabic<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="slider_descp_ar" id="textarea" class="form-control"></textarea>
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
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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
