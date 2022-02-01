@extends('admin.admin_master')

@section('main-content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- Edit State Page  -->
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit State</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('state.update', $data->id) }}" method="POST">
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
								<h5>District Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="district_id" id="select" class="form-control">
                                        @foreach($districts as $district)
										<option value="{{ $district->id }}" {{ $district->id == $data->district_id ? 'selected' : '' }}>{{ $district->district_name }}</option>
                                        @endforeach                                        
									</select>
                                    @error('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
                            <div class="form-group">
                                <h5>State Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="state_name" class="form-control" value="{{ $data->state_name }}">
                                    @error('state_name')
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
