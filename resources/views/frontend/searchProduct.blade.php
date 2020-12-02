@extends('layouts.frontmaster')


@section('title', 'Search Product Product')

@section('main_content')


    <!-- Hero Section Begin -->

    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2> {{ $data['product']->category->cat_name  }}’s Package </h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/')}}">Home</a>
                            <a href="./index.html">{{ $data['product']->category->cat_name  }}</a>
                            <span>{{ $data['product']->category->cat_name  }}’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                 src="{{ asset($data['product']->main_image) }}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach($data['slider_images'] as $image)
                                <img data-imgbigurl="{{ asset($image->images) }}"
                                     src="{{ asset($image->images) }}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $data['product']->product_name  }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">${{ $data['product']->price  }}</div>
                        <p>{{ $data['product']->short_des  }}</p>
                        @if($data['product']->quantity != 0)

                            <form action="{{ url('addToCart').'/'.$data['product']->id }}" method="POST" style="display: inline-block">
                                @csrf
                                <input type="hidden" name="image" value="{{ $data['product']->main_image }}">
                                <input type="hidden" name="product_name" value="{{ $data['product']->product_name }}">
                                <input type="hidden" name="price" value="{{ $data['product']->price }}">
                                <button style="background: transparent;border:none"> <a  class="primary-btn" >ADD TO CARD</a></button>
                            </form>


                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        @endif
                        <ul>
                            <li><b>Availability</b>
                                @if($data['product']->quantity == 0)
                                    <span class="text-danger">Out of Stock<span>
                            @else
                                                <span>In Stock <b>[{{ $data['product']->quantity  }}]</b></span>
                                @endif
                            </li>
                            <li><b>Category</b> <span>{{ $data['product']->category->cat_name  }}</span></li>
                            <li><b>Brand</b> <span>{{ $data['product']->brand->brand_name  }}</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                   aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                   aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                   aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>{{ $data['product']->long_des  }}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
    <!-- Related Product Section Begin -->

    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($data['count_similar_product'] == 0)
                    <div class="section-title related__product__title">
                        <div class="row justify-content-center">
                            <span class ="text-center text-danger display-4 ml-5 pl-5" style ="padding-left:50px;display:inline-block">Not Avilable Related Product !! :)</span>
                        </div>

                    </div>
                @else
                    @foreach($data['related_products'] as $related)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset($related->main_image) }}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="{{ url('single_product').'/'.$related->slug }}"><i class="fa fa-retweet"></i></a></li>
                                        <li>
                                            <form action="{{ url('addToCart').'/'.$related->id }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="image" value="{{ $related->main_image }}">
                                                <input type="hidden" name="product_name" value="{{ $related->product_name }}">
                                                <input type="hidden" name="price" value="{{ $related->price }}">
                                                <button style="background: transparent;border:none"><a><i class="fa fa-shopping-cart"></i></a></button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">{{ $related->product_name }}</a></h6>
                                    <h5>${{ $related->price }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!-- Related Product Section End -->


@endsection