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
                    <a href="#" class="btn btn-primary btn-sm btn-block mb-1">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6 my-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center"><span class="text-danger">Hi.....</span><strong>{{ Auth::user()->name }}</strong> Update Your Profile</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-20">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control bg-input" value="{{ $data->name }}">
                            </div>
                            <div class="form-group mb-20">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control bg-input" value="{{ $data->email }}">
                            </div>
                            <div class="form-group mb-20">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control bg-input" value="{{ $data->phone }}">
                            </div>
                            <div class="form-group mb-20">
                                <label for="">User Image</label>
                                <input type="file" name="profile_photo_path" class="form-control bg-input">
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