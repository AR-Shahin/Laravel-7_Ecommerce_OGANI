  @extends('layouts.backorginmaster')
  @section('title','Log in')

  @section('orgin_content')
  <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        @if(session('success'))
        <div class="alert alert-info" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>success!</strong> {{ session('success') }}</span>
          </div><!-- d-flex -->
        </div>
        @endif
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">shaHin <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  <form action="{{ url('admin.login') }}" method ="post">
      @csrf
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter your email" name="email">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Enter your password" name="password">
          <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign In</button>

        <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ url('e-registraion') }}" class="tx-info">Sign Up</a></div>
      </div><!-- login-wrapper -->
  </form>
    </div>
  @endsection