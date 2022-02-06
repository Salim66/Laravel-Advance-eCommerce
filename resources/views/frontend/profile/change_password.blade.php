@extends('frontend.partial_master')

@section('partial_content')
<div class="body-content">
    <div class="container user-container">
        <div class="row">
            @include('frontend.return-policy.return-policy')
            <div class="col-md-2"></div>
            <div class="col-md-6 my-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center"><span class="text-danger">Change Password</span></h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.password.update') }}" method="POST">
                            @csrf

                            <div class="form-group mb-20">
                                <label for="current_password">Current Password</label>
                                <input type="password" id="current_password" name="current_password" class="form-control bg-input">
                            </div>
                            <div class="form-group mb-20">
                                <label for="password">New Password <span class="text-danger"> (Password must be 8 length)</span></label>
                                <input type="password" id="password" name="password" class="form-control bg-input">
                            </div>
                            <div class="form-group mb-20">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control bg-input">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger" value="Update">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
