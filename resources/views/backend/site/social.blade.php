@extends('layouts.backmaster')
@section('title', 'Social Links')

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item">Social Links</a>
    </nav>
@endsection
{{--main content  --}}
@section('main_content')
    <div class="card">
        <div class="card-header">
            <h3>Social Links</h3>
        </div>
        <div class="row card-body">
            <div class="col-12 col-md-6">
                <h5 class="text-info">All Links</h5>
                @if($count == 0)
                    <table class="table table-bordered">
                        <tr><th>Phone</th><td></td></tr>
                        <tr><th>Email</th><td></td></tr>
                        <tr><th>Facebook</th><td></td></tr>
                        <tr><th>Twitter</th><td></td></tr>
                        <tr><th>Instagram</th><td></td></tr>
                    </table>
                @else
                    @foreach($links as $link)
                        <table class="table table-bordered">
                            <tr><th>Phone</th><td>{{$link->phone}}</td></tr>
                            <tr><th>Email</th><td>{{$link->email}}</td></tr>
                            <tr><th>Facebook</th><td>{{$link->fb}}</td></tr>
                            <tr><th>Twitter</th><td>{{$link->tw}}</td></tr>
                            <tr><th>Instagram</th><td>{{$link->ins}}</td></tr>
                        </table>
                    @endforeach
                @endif
            </div>
            @if($count == 0)
                <div class="col-12 col-md-6">{{-- insert--}}
                    <h5 class="text-info">Insert Link</h5>
                    <form action="{{route('social.store')}}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr><th>Phone</th><td><input type="text" class="form-control" name="phone" placeholder="Phone" value="{{old('phone')}}"></td></tr>
                            <tr><th>Email</th><td><input type="text" class="form-control" name="email" placeholder="Email" value="{{old('email')}}"></td></tr>
                            <tr><th>Facebook</th><td><input type="text" class="form-control" name="fb" placeholder="facebook" value="{{old('fb')}}"></td></tr>
                            <tr><th>Twitter</th><td><input type="text" class="form-control" name="tw" placeholder="twitter" value="{{old('tw')}}"></td></tr>
                            <tr><th>Instagram</th><td><input type="text" class="form-control" name="ins" placeholder="instagram" value="{{old('ins')}}"></td></tr>
                                <td colspan="2"><button class="btn btn-block btn-success"><i class="fa fa-plus"></i> Save</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            @else
                <div class="col-12 col-md-6">{{-- update--}}
                    <h5 class="text-info">Update Links </h5>
                    <form action="{{route('social.update')}}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <input type="hidden" value="{{$link->id}}" name="id">
                            <tr><th>Phone</th><td><input type="text" class="form-control" name="phone" placeholder="Phone" value="{{$link->phone}}"></td></tr>
                            <tr><th>Email</th><td><input type="text" class="form-control" name="email" placeholder="Email" value="{{$link->email}}"></td></tr>
                            <tr><th>Facebook</th><td><input type="text" class="form-control" name="fb" placeholder="facebook" value="{{$link->fb}}"></td></tr>
                            <tr><th>Twitter</th><td><input type="text" class="form-control" name="tw" placeholder="twitter" value="{{$link->tw}}"></td></tr>
                            <tr><th>Instagram</th><td><input type="text" class="form-control" name="ins" placeholder="instagram" value="{{$link->ins}}"></td></tr>
                            <tr>
                                <td colspan="2"><button class="btn btn-block btn-success"><i class="fa fa-edit"></i> Update</button></td>
                            </tr>
                        </table>
                        <input type="hidden" value="{{$link->id}}" name="id">
                    </form>
                </div>
            @endif

        </div>
    </div>
@endsection



