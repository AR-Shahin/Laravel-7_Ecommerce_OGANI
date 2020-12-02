@extends('layouts.backmaster')
@section('title', 'Admin Profile')
{{--main content  --}}
@section('main_content')
    <div class="row no-gutters justify-content-center">
        <div class="col-12 col-md-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3">My Profile</h3>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <td colspan="2">
                                <img src="{{asset($admin->image)}}" alt="" class="w-25 rounded-circle">
                            </td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ucwords($admin->name)}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$admin->email}}</td>
                        </tr>
                        <tr>
                            <th>Joined Date</th>
                            <td>{{ucwords($admin->created_at)}}</td>
                        </tr>
                        <tr>
                            <th>Last Profile Updated </th>
                            <td>{{$admin->updated_at->diffForHumans()}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="{{route('admin.update')}}"  class="btn btn-success btn-block"><i class="fa fa-edit"></i> Update Profile</a></td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



