@php
    $id = Auth::user()->id;
    $data = App\Models\User::find($id);
@endphp
<div class="col-md-2"><br>
    <img class="user-top-image" src="{{ (!empty($data->profile_photo_path))? URL::to($data->profile_photo_path) : URL::to('upload/no_image.png') }}" alt=""><br><br>
    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block mb-1">Home</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block mb-1">Profile Update</a>
        <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block mb-1">Change Password</a>
        <a href="{{ route('my.order') }}" class="btn btn-primary btn-sm btn-block mb-1">My Orders</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
    </ul>
</div>
