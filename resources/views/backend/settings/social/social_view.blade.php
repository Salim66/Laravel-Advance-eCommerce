@extends('admin.admin_master')

@section('main-content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-8">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Social List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Social Name</th>
                            <th>Social Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($socials as $data)
                        <tr>
                            <td>{{ $data->social_name }}</td>
                            <td>{{ $data->social_link }}</td>
                            <td width="30%">
                                <a title="Edit Data" href="{{ route('social.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <a title="Delete Data" href="{{ route('social.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

        <!-- Add Social Page  -->
        <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Social Media</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('social.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
								<h5>Social Media Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="social_name" id="select" class="form-control">
										<option value="" selected disabled>Select Name</option>
										<option value="flaticon-facebook">Facebook</option>
										<option value="flaticon-instagram">Instagram</option>
										<option value="flaticon-twitter">Twitter</option>
										<option value="flaticon-pinterest">Pinterest</option>
									</select>
                                    @error('social_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
                            <div class="form-group">
                                <h5>Social Media Link <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="social_link" class="form-control">
                                    @error('social_link')
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
