@extends('admin.admin_master')

@section('main-content')
<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Admin Profile Edit</h4>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form novalidate="">
                     <div class="row">
                       <div class="col-12">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Admin User Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" required="" value="{{ $data->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Admin Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" required="" value="{{ $data->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Profile Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="profile_photo_path" class="form-control" required="" aria-invalid="false">
                                            <div class="help-block"></div></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img class="admin-profile_edit_photo" src="{{ (!empty($data->profile_photo_path))? URL::to('upload/admin_images/'.$data->profile_photo_path) : URL::to('upload/admin_images/no_image.png') }}" >
                                </div>
                            <div>
                        </div>

                     </div>
                       <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                       </div>
                    </div>
                   </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
@endsection
