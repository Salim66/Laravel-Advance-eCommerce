@extends('frontend.partial_master')

@section('partial_content')
<div class="body-content">
    <div class="container user-container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-2"></div>
            <div class="col-md-8 my-4">
                <div class="card py-5 px-3 mt-4">
                    <h3 class="text-center"><span class="text-danger">Hi.....</span><strong>{{ Auth::user()->name }}</strong> Welcome to Elegant Furnitur QR</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
