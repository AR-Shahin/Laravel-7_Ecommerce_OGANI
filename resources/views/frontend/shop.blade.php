@extends('layouts.frontmaster')

@section('title', 'Shop Page')

@section('main_content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>ars Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/')}}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10 ">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                            @foreach($data['products_slider'] as $s)
                                 <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{ asset($s->main_image) }}">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="{{ url('single_product').'/'.$s->slug }}"><i class="fa fa-retweet"></i></a></li>
                                                <li>
                                                    <form action="{{ url('addToCart').'/'.$s->id }}" method="POST">
                                                    @csrf
                                                       <input type="hidden" name="image" value="{{ $s->main_image }}">
                                    <input type="hidden" name="product_name" value="{{ $s->product_name }}">
                                                    <input type="hidden" name="price" value="{{ $s->price }}">
                                                    <button style="background: transparent;border:none"><a><i class="fa fa-shopping-cart"></i></a></button>      
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            
                                            <h5><a href="#">{{ ucwords($s->product_name)}}</a></h5>
                                            <div class="product__item__price">${{ $s->price}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{$data['count']}}</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($data['products'] as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset($product->main_image) }}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="{{ url('single_product').'/'.$product->slug }}"><i class="fa fa-retweet"></i></a></li>
                                        <li>
                                            <form action="{{ url('addToCart').'/'.$product->id }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="image" value="{{ $product->main_image }}">
                                    <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                            <button style="background: transparent;border:none"><a><i class="fa fa-shopping-cart"></i></a></button>      
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">{{ $product->product_name }}</a></h6>
                                    <h5>${{ $product->price }}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{ $data['products']->links() }}
                  {{--    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

@endsection