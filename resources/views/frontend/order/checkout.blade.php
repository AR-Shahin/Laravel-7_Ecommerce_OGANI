@extends('layouts.frontmaster')
@section('title', 'Checkout Page')

@section('main_content')
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg" style="background-image: url(&quot;img/breadcrumb.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">

                {{--<form action="{{ url('order.confirm') }}" method="post">--}}
                {{--@csrf--}}
                {{--<div class="row">--}}
                {{--<div class="col-lg-8 col-md-6">--}}
                {{--<div class="row">--}}
                {{--<div class="col-lg-12">--}}
                {{--<div class="checkout__input">--}}
                {{--<p>Fist Name<span>*</span></p>--}}
                {{--<input type="text" name="name">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{----}}
                {{--</div>--}}
                {{----}}
                {{--<div class="row">--}}
                {{--<div class="col-lg-6">--}}
                {{--<div class="checkout__input">--}}
                {{--<p>Phone<span>*</span></p>--}}
                {{--<input type="text" name="phone">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-6">--}}
                {{--<div class="checkout__input">--}}
                {{--<p>Email<span>*</span></p>--}}
                {{--<input type="text" name="email">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4 col-md-6 align-self-end">--}}
                {{--<button class="btn btn-block btn-success">Confirm Order</button>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</form>--}}


                <div class="row justify-content-center">
                    <div class="col-12 col-md-4">
                        <a href="{{route('cart')}}" class="btn btn-info">Back</a>
                        <a href="{{route('host_ssl')}}" class="btn btn-success">Confirm Order</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection