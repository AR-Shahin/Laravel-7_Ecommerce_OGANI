@extends('layouts.frontmaster')
@section('title', 'Home Page')

@section('main_content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul>
                            @foreach($data['cats'] as $cat)
                                <li><a href="{{ url('category.product').'/'.$cat->cat_name }}">{{ ucwords($cat->cat_name)}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>

                    <div class="slider hero_slider owl-carousel ">
                        @foreach($data['sliders'] as $slider)
                        <div class="hero__item set-bg" data-setbg="{{ asset($slider->image) }}">
                            <div class="hero__text p-4" style="background-color:rgba(242, 241, 242,.8)">
                                <span>{{$slider->text_1}}</span>
                                <h2>{{$slider->text_2}}</h2>
                                <h2>{{$slider->text_3}}</h2>
                                <p class="text-waring">{{$slider->text_4}}</p>
                                <a href="{{ url('shop')}}" class="primary-btn">SHOP NOW</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>

    <style>
        .hero_slider{
            background: #7fad39;
        }
        .hero_slider.owl-carousel .owl-nav button {
            font-size: 18px;
            color: #1c1c1c;
            height: 70px;
            width: 30px;
            line-height: 70px;
            text-align: center;
            border: 1px solid #ebebeb;
            position: absolute;
            left: -35px;
            top: 50%;
            -webkit-transform: translateY(-35px);
            background: #ffffff;
        }
        .hero_slider.owl-carousel .owl-nav button.owl-next {
            left: auto;
            right: -35px;
        }
    </style>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($data['cats'] as $cat)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="{{ asset($cat->cat_img) }}">
                                <h5><a href="{{ url('category.product').'/'.$cat->cat_name }}"> {{ $cat->cat_name }}</a></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach($data['cats'] as $cat)
                                <li data-filter=".filter-{{ $cat->id}}">{{ ucwords($cat->cat_name)}}</li>
                            @endforeach
                            {{--  <li data-filter=".oranges">Oranges</li>
                              <li data-filter=".fresh-meat">Fresh Meat</li>
                              <li data-filter=".vegetables">Vegetables</li>
                              <li data-filter=".fastfood">Fastfood</li>
                              --}}
                        </ul>
                    </div>
                </div>
            </div>
            {{--{{ $data['cartProduct']}}--}}
            <div class="row featured__filter">
                @foreach($data['catwise_products']  as $cat_pro)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix filter-{{ $cat_pro->category->id }} fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="{{ asset($cat_pro->main_image) }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ url('single_product').'/'.$cat_pro->slug }}"><i class="fa fa-retweet"></i></a></li>
                                    <li>

                                        <form action="{{ url('addToCart').'/'.$cat_pro->id }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="price" value="{{ $cat_pro->price }}">
                                            <input type="hidden" name="image" value="{{ $cat_pro->main_image }}">
                                            @if( $data['cartProduct'] ==0)
                                                <input type="hidden" name="expid" value="1">
                                            @endif
                                            <input type="hidden" name="product_name" value="{{ $cat_pro->product_name }}">
                                            <button style="background: transparent;border:none"><a><i class="fa fa-shopping-cart"></i></a></button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="#">{{ $cat_pro->product_name}}</a></h6>
                                <h5>${{ $cat_pro->price}}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('images/hero/img2 (2).jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('images/hero/img2 (1).jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($data['latest_products'] as $l_product)
                                    <a href="{{ url('single_product').'/'.$l_product->slug }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset($l_product->main_image) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ucwords($l_product->product_name)}}</h6>
                                            <span>${{$l_product->price}}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($data['top_products'] as $t_product)
                                    <a href="{{ url('single_product').'/'.$t_product->slug }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset($t_product->main_image) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ucwords($t_product->product_name)}}</h6>
                                            <span>${{$t_product->price}}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>    <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($data['rands'] as $l_product)
                                    <a href="{{ url('single_product').'/'.$l_product->slug }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset($l_product->main_image) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ucwords($l_product->product_name)}}</h6>
                                            <span>${{$l_product->price}}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('images/blog/b1.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('images/blog/b2.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('images/blog/b1.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection