@extends('admin.admin_master')

@section('main-content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- Edit District Page  -->
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit District</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('district.update', $data->id) }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $data->id }}">

                            <div class="form-group">
								<h5>Division Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="division_id" id="select" class="form-control">
										<option value="" selected disabled>Select Division</option>
                                        @foreach($divisions as $division)
										<option value="{{ $division->id }}" {{ $division->id == $data->division_id ? 'selected' : '' }}>{{ $division->division_name }}</option>
                                        @endforeach
									</select>
                                    @error('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
                            <div class="form-group">
                                <h5>District Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="district_name" class="form-control" value="{{ $data->district_name }}">
                                    @error('district_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
