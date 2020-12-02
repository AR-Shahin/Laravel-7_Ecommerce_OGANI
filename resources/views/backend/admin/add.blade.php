@extends('layouts.backmaster')
@section('title', 'Add Admin')
{{--breadcrumb  --}}
@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item">Add New Admin</a>
    </nav>
@endsection


{{--main content  --}}
@section('main_content')
    <div class="row no-gutters justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3 d-inline">Add New Admin</h3>
                    <a href="{{route('view.admin')}}" style="float: right;" class="btn btn-info"><i class="fa fa-angle-double-left"></i> Back</a>
                    <hr>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('admin.store') }}" method="POST" enctype="multipart/form-data">
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
                        <button type="submit" class="btn btn-info btn-block">Add New Admin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection




