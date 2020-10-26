@extends('layouts.frontmaster')
@section('title', 'Login Page')

@section('main_content')

   <hr>
<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      @if(session('success'))
      <div class="alert alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <div class="d-flex align-items-center justify-content-start">
          <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
          <span><strong></strong> {{ session('success') }}</span>
        </div><!-- d-flex -->
      </div>
      @endif
      @if(session('error'))
      <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <div class="d-flex align-items-center justify-content-start">
          <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
          <span><strong></strong> {{ session('error') }}</span>
        </div><!-- d-flex -->
      </div>
      @endif
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse my-4"> <span class="tx-info tx-normal text-center"><h3 class="text-info">Login</h3></span></div>
 
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
<form action="{{ url('customer.login') }}" method ="post" class="mb-4">
    @csrf
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Enter your email" name="email">
      </div><!-- form-group -->
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Enter your password" name="password">
        <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
      </div><!-- form-group -->
      <button type="submit" class="btn btn-info btn-block">Sign In</button>

      <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ url('customer.registration') }}" class="tx-info">Sign Up</a></div>
    </div><!-- login-wrapper -->
</form>
  </div>
   

@endsection