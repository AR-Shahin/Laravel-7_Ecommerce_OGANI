@extends('layouts.backmaster')
@section('title', 'Site Identity')

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item">Site Identity</a>
    </nav>
@endsection
{{--main content  --}}
@section('main_content')

    <div class="card">
        <div class="card-header">
            <h3>Site Identity</h3>
        </div>
        <div class="row card-body">
            <div class="col-12 col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th>Logo</th>
                        <th>Top Text</th>
                        <th>Address</th>
                        <th>Shop Name</th>
                        <th>Copyright</th>
                    </tr>
                    @foreach($siteIdentity as $site)
                        <tr>
                            <td width="20%"><img src="{{asset($site->logo)}}" alt=""></td>
                            <td>{{$site->top_txt}}</td>
                            <td>{{$site->address}}</td>
                            <td>{{$site->shop_name}}</td>
                            <td>{{$site->copyright}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <style>
                .form-control{
                    border-radius: 0px;
                }
            </style>
            @if($count == 0)
                <div class="col-12 col-md-4">
                    <form action="{{route('site.identity')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h4>Add Details</h4>
                        <div class="form-group">
                            <input type="file" class="form-control" name="logo">
                            <span class="text-danger">{{($errors->has('logo')) ? ($errors->first('logo')) : ' '}}</span>
                        </div>
                        <div class="form-group">
                            <textarea name="top_txt" id="" cols="30" rows="3" class="form-control" placeholder="Top Text"></textarea>
                            <span class="text-danger">{{($errors->has('top_txt')) ? ($errors->first('top_txt')) : ' '}}</span>
                        </div>
                        <div class="form-group">
                            <textarea name="copyright" id="" cols="30" rows="3" class="form-control" placeholder="Copyright Text"></textarea>
                            <span class="text-danger">{{($errors->has('copyright')) ? ($errors->first('copyright')) : ' '}}</span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Address">
                            <span class="text-danger">{{($errors->has('address')) ? ($errors->first('copyright')) : ' '}}</span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="shop" placeholder="Shop Name">
                            <span class="text-danger">{{($errors->has('shop')) ? ($errors->first('copyright')) : ' '}}</span>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-block"><i class="fa fa-add"></i> Save</button>
                        </div>
                    </form>
                </div>
            @else

                <div class="col-12 col-md-4">
                    <form action="{{route('site.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$site->id}}">
                        <h4>Update Details</h4>
                        <div class="form-group">
                            <input type="file" class="form-control" name="logo">
                            <span class="text-danger">{{($errors->has('logo')) ? ($errors->first('logo')) : ' '}}</span>
                            <input type="hidden" value="{{$site->logo}}" name="old_img">
                            <input type="hidden" value="{{$site->id}}" name="id">
                        </div>
                        <div class="form-group">
                            <textarea name="top_txt" id="" cols="30" rows="3" class="form-control">{{$site->top_txt}}</textarea>
                            <span class="text-danger">{{($errors->has('top_txt')) ? ($errors->first('top_txt')) : ' '}}</span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" value="{{$site->address}}">
                            <span class="text-danger">{{($errors->has('address')) ? ($errors->first('address')) : ' '}}</span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="shop_name" value="{{$site->shop_name}}">
                            <span class="text-danger">{{($errors->has('shop_name')) ? ($errors->first('shop_name')) : ' '}}</span>
                        </div>
                        <div class="form-group">
                            <textarea name="copyright" id="" cols="30" rows="3" class="form-control" >{{$site->copyright}}</textarea>
                            <span class="text-danger">{{($errors->has('copyright')) ? ($errors->first('copyright')) : ' '}}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block"><i class="fa fa-add"></i> Update</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection



