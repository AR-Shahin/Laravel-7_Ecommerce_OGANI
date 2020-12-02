@extends('layouts.frontmaster')


@section('title', 'Search Product Product')

@section('main_content')

    <div class="row">
        <div class="col-12 text-center">
            <h2 class="text-danger m-5 p-5">Not Found this <b style="font-size: 22px">{{$data['notFound']}}</b> Product</h2>
        </div>
    </div>
@endsection