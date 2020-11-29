@extends('layouts.frontmaster')
@section('title', 'Cart Page')

@section('main_content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    @if($data['subTotal'] ==0 )
        <div class="container py-5 my-5">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4 class="text-danger" >Your Cart is Empty!!</h4>
                    <p>Please buy something......</p>
                    <a class="btn btn-link" href="shop">Click here</a>

                </div>
            </div>
        </div>
    @else
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['carts'] as $cart)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="{{ asset($cart->image) }}" alt="" width="60px">
                                            <h5>{{ ucwords($cart->product_name)}}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            ${{ $cart->price}}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <form method ="post" action ="cart/update/{{ $cart->id}}">
                                                @csrf
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" value="{{ $cart->qty}}" name ="qty">
                                                    </div>
                                                    <button class="btn  btn-info" style="display:inline-block">Update</button>
                                            </form>
                        </div>

                        </td>
                        <td class="shoping__cart__total">
                            ${{ $cart->qty*$cart->price }}
                        </td>
                        <td class="shoping__cart__item__close">
                            <a href ="cart/delete/{{ $cart->id}}" onclick="return confirm('Are you sure ?')">
                                <span class="icon_close"></span></a>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ url('/') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    @if(session()->has('coupon'))
                    @else
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="{{ url('applycoupon') }}" method="post">
                                    @csrf
                                    <input type="text" placeholder="Enter your coupon code" name="coupon_name">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            @if(session()->has('coupon'))
                                <li>Subtotal <span>${{$data['subTotal']}}</span></li>
                                <li>
                                    <div class="row">
                                        <div class ="col-6">
                                            Coupon Name : <span> {{ session()->get('coupon')['coupon_name']}}%)</span>
                                        </div>
                                        <div class ="col-6 text-right">
                                            <a href ="{{  url('destroy.coupon') }}" onclick="return confirm('Are you sure ?')" class="btn btn-danger ">Remove Coupon</a>
                                        </div>
                                    </div>
                                </li>
                                <li>Discount <span>({{ session()->get('coupon')['discount']}}%)- $
                                        {{$discount = (session()->get('coupon')['discount'] *$data['subTotal'])/100  }}
                            </span></li>
                                <li>Total <span>${{$data['subTotal'] - $discount}}</span></li>
                            @else
                                <li>Subtotal <span>${{$data['subTotal']}}</span></li>
                                <li>Total <span>${{$data['subTotal']}}</span></li>
                            @endif


                        </ul>
                        @if(Auth::check())
                            <a href="{{ url('checkout.index') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                        @else
                            <a href="{{ route('cus.log')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                        @endif
                    </div>
                </div>
            </div>
            </div>
        </section>
    @endif

    <!-- Shoping Cart Section End -->


@endsection

