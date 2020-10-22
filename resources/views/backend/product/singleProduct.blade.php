@extends('layouts.backmaster')
@section('title', 'Single Product')

{{--breadcrumb  --}}
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('products.index') }}">Mange Product</a>
    <span class="breadcrumb-item active">Single Product</span>
  </nav>
@endsection


{{--main content  --}}
@section('main_content')
<div class="card">
    <div class="card-body">
        @foreach($data['product'] as $key )
        <table class="table table-striped  table-bordered table-hover">
            <tbody>
                <tr>
                    <th>Product Name</th>
                    <td>{{ ucwords($key->product_name) }}</td>
                </tr>
                <tr>
                    <th>Category </th>
                    <td>{{ ucwords($key->category->cat_name) }}</td>
                </tr>
                <tr>
                    <th>Brand</th>
                    <td>{{ ucwords($key->brand->brand_name) }}</td>
                </tr> 
                 <tr>
                    <th>Price</th>
                    <td>$ {{ $key->price }}</td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>{{ $key->quantity }}</td>
                </tr>
                <tr>
                    <th>Count</th>
                    <td>{{ $key->count }}</td>
                </tr>
                <tr>
                    <th>Short Description</th>
                    <td>{{ $key->short_des }}</td>
                </tr>
                <tr>
                    <th>Long Desctiption</th>
                    <td>{{ $key->long_des }}</td>
                </tr>
                <tr>
                    <th>Main Image</th>
                    <td><img src="{{ asset($key->main_image ) }}" alt=""></td>
                </tr>
                <tr>
                    <th>Slider Images</th>
                    <td>
                        @foreach($data['slider_images'] as $k )
                        <img src="{{ asset($k->images ) }}" alt="" class="ml-1 mb-1" style="width:15%">
                        @endforeach
                       
                    </td>
                </tr>
            </tbody>
          </table>
          @endforeach
    </div>
</div>
@endsection


