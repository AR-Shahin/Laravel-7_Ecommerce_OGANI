@extends('layouts.backmaster')
@section('title', 'Add Product')


{{--breadcrumb  --}}
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
    <a class="breadcrumb-item" href="{{ url('products ') }}">Manage Product</a>
    <a class="breadcrumb-item">Add Product</a>
</nav>
@endsection

{{--main content  --}}
@section('main_content')
<div class="row no-gutters">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-body p-2">
                <h3 class="mb-0 pb-0" style ="display:inline-block">Add New Product</h3>
                <hr class ="mb-0">
                <div class="container">
                    <form method ="post" action="{{ route('products.store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <label for="inputName" class="col-sm-1-12 col-form-label">Product Name : </label>
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" id="inputName" placeholder="Product Name " value="{{ old('product_name') }}">
                                @error('product_name')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <label for="inputName" class="col-sm-1-12 col-form-label">Category : </label>
                                <select class="form-control select2  @error('cat_id') is-invalid @enderror" data-placeholder="Choose Category" name="cat_id">
                                    <option value="">Choose Category</option>
                                @foreach($data['categories'] as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                @endforeach
                                </select>
                                @error('cat_id')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputName" class="col-sm-1-12 col-form-label">Brand : </label>
                                <select class="form-control select2 @error('brand_id') is-invalid @enderror" data-placeholder="Choose Category" name="brand_id">
                                    <option value="">Choose Brand</option>
                                    @foreach($data['brands'] as $brnd)
                                    <option value="{{ $brnd->id }}">{{ $brnd->brand_name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <label for="inputName" class="col-sm-1-12 col-form-label">Price : </label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"  id="inputName" placeholder="Price" name="price" value="{{ old('price') }}">
                                @error('price')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputName" class="col-sm-1-12 col-form-label">Avilable Quantity : </label>
                                <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="inputName" placeholder="Quantity" value="{{ old('quantity') }}">
                                 @error('quantity')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <label for="inputName" class="col-sm-1-12 col-form-label">Short Description : </label>       
                                <textarea class="form-control @error('short_des') is-invalid @enderror" name="short_des" id="" rows="2">
                                    {{ old('short_des') }}
                                </textarea>
                                 @error('short_des')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <label for="inputName" class="col-sm-1-12 col-form-label">Long Description : </label>       
                                <textarea class="form-control @error('long_des') is-invalid @enderror" name="long_des" id="" rows="3">
                                  {{ old('long_des') }}
                                </textarea>
                                   @error('long_des')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <label for="inputName" class="col-sm-1-12 col-form-label">Main Image : </label>
                                <input type="file" class="form-control @error('main_image') is-invalid @enderror" name="main_image" value="{{ old('main_image') }}">
                                    @error('main_image')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputName" class="col-sm-1-12 col-form-label">Slider Image : </label>
                                <input type="file" class="form-control @error('slider_images') is-invalid @enderror" name="slider_images[]" multiple value="{{ old('slider_images') }}">
                                        @error('slider_images')
                                <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-12">
                                <button class="btn btn-block btn-primary"><i class="fa fa-pencil-square mr-1"></i> Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection


