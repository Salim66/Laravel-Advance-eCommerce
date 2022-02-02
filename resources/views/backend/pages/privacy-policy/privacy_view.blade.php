@extends('admin.admin_master')

@section('main-content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Privacy Policy List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Privacy Policy English</th>
                            <th>Privacy Policy English</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($polices as $data)
                        <tr>
                            <td width="40%">{!! $data->privacy_descp_en !!}</td>
                            <td width="40%">{!! $data->privacy_descp_ar !!}</td>
                            <td width="20%">
                                <a title="Edit Data" href="{{ route('privacy-policy.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <a title="Delete Data" href="{{ route('privacy-policy.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

        <!-- Add Privacy Policy Page  -->
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Privacy Policy</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('privacy-policy.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Privacy Policy English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="privacy_descp_en" id="editor5" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Privacy Policy Arabic <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="privacy_descp_ar" id="editor6" class="form-control" required></textarea>
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
