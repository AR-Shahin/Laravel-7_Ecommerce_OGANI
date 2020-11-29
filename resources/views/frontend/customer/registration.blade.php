@extends('layouts.frontmaster')
@section('title', 'Registration Page')

@section('main_content')
    <hr>
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ">

        <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse"> <span class="tx-info tx-normal"></span></div>
            <div class="tx-center mb-3 display-4 text-info">Registration Form</div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('customer.store') }}" method="POST" enctype="multipart/form-data" class="mb-3">
                @csrf
                <div class="form-group">
                    <label for="">Name : </label>
                    <input type="text" class="form-control" placeholder="Enter your name" name="name">
                </div><!-- form-group -->
                <div class="form-group">
                    <label for="">Email : </label>
                    <input type="email" class="form-control" placeholder="Enter your email" name="email">
                </div><!-- form-group -->
                <div class="form-group">
                    <label for="">Image : </label>
                    <input type="file"  name="image" class="form-control">
                </div><!-- form-group -->
                <div class="form-group">
                    <label for="">Password : </label>
                    <input type="password" class="form-control" placeholder="Enter your password" name="password" name="password">
                </div><!-- form-group -->
                <div class="form-group">
                    <label for="">Confirm Password : </label>
                    <input type="password" class="form-control" placeholder="Enter confirm password" name="password_confirmation">
                </div><!-- form-group -->
                <button type="submit" class="btn btn-info btn-block">Sign Up</button>
            </form>
            <div class="mg-t-40 tx-center">Already have an account? <a href="{{ url('customer.login') }}" class="tx-info">Sign In</a></div>
        </div><!-- login-wrapper -->
    </div>
@endsection
