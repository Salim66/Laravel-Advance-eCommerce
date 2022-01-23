@extends('frontend.partial_master')

@section('partial_content')
<div class="body-content">
    <div class="container user-container">
        <div class="row">
            <div class="col-md-2"><br>
                <img class="user-top-image" src="{{ (!empty($data->profile_photo_path))? URL::to('upload/user_images/'.$data->profile_photo_path) : URL::to('upload/no_image.png') }}" alt=""><br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block mb-1">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block mb-1">Profile Update</a>
                    <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block mb-1">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>
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