@extends('admin.admin_master')

@section('main-content')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- Edit Social Page  -->
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Social Media</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('social.update', $data->id) }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $data->id }}">

                            <div class="form-group">
								<h5>Social Media Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="social_name" id="select" class="form-control">
										<option value="flaticon-facebook" {{ $data->social_name == 'flaticon-facebook'? 'selected' : '' }}>Facebook</option>
										<option value="flaticon-instagram" {{ $data->social_name == 'flaticon-instagram'? 'selected' : '' }}>Instagram</option>
										<option value="flaticon-twitter" {{ $data->social_name == 'flaticon-twitter'? 'selected' : '' }}>Twitter</option>
										<option value="flaticon-pinterest" {{ $data->social_name == 'flaticon-pinterest'? 'selected' : '' }}>Pinterest</option>
									</select>
                                    @error('social_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
                            <div class="form-group">
                                <h5>Social Media Link <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="social_link" class="form-control" value="{{ $data->social_link }}">
                                    @error('social_link')
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
