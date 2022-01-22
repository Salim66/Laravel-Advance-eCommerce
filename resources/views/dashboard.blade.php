@extends('frontend.partial_master')

@section('partial_content')
<div class="body-content">
    <div class="container user-container">
        <div class="row">
            <div class="col-md-2"><br>
                <img class="user-top-image" src="{{ (!empty($data->profile_photo_path))? URL::to('upload/admin_images/'.$data->profile_photo_path) : URL::to('upload/no_image.png') }}" alt=""><br><br>
                <ul class="list-group list-group-flush">
                    <a href="#" class="btn btn-primary btn-sm btn-block mb-1">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block mb-1">Profile Update</a>
                    <a href="#" class="btn btn-primary btn-sm btn-block mb-1">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8 my-5">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi.....</span><strong>{{ Auth::user()->name }}</strong> Welcome to Elegant Furnitur QR</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
