@extends('layouts.backmaster')
@section('title', 'Update Profile')
{{--main content  --}}
@section('main_content')
    <div class="row mt-3">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Update Profile</h3>
                </div>
                <form action="{{route('admin.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <td><input type="text" class="form-control" value="{{$admin->name}}" name ="name"></td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><input type="file" class="form-control" name="image"></td>
                                <input type="hidden" class="form-control" name="old_image" value="{{$admin->image}}">
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button class="btn btn-success btn-block"><i class="fa fa-edit"> </i> Update Profile</button>
                                </td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Change Password</h3>
                </div>
                <form action="{{route('admin.change.password')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Old Password</th>
                                <td><input type="password" class="form-control @error('old_pass') is-invalid @enderror" name="old_pass"> <span class="text-danger">{{($errors->has('old_pass'))? ($errors->first('old_pass')) : ''}}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>New Password</th>
                                <td><input type="password" class="form-control @error('password') is-invalid @enderror" name="password"> <span class="text-danger">{{($errors->has('password'))? ($errors->first('password')) : ''}}</span></td>
                            </tr>
                            <tr>
                                <th>Confirm Password</th>
                                <td><input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"> <span class="text-danger">{{($errors->has('password_confirmation'))? ($errors->first('password_confirmation')) : ''}}</span></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button class="btn btn-success btn-block"><i class="fa fa-edit"> </i> Change Password</button>
                                </td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



