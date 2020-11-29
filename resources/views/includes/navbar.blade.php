<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> {{$data['link']->email}}</li>
                            <li>{{$data['site']->top_txt}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="{{$data['link']->fb}}"><i class="fa fa-facebook"></i></a>
                            <a href="{{$data['link']->tw}}"><i class="fa fa-twitter"></i></a>
                            <a href="{{$data['link']->ins}}"><i class="fa fa-instagram"></i></a>
                            |
                            @if(Auth::check())
                                <a href="{{route('logOut_cus')}}"><i class="fa fa-lock mr-2"></i> Logout</a>
                            @else
                                <a href="{{route('cus.log')}}"><i class="fa fa-user ml-3"></i> Login</a>
                                <a href="{{route('cus.reg')}}"><i class="fa fa-user"></i> Registration</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('home_page') }}"><img src="{{ asset($data['site']->logo) }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home_page') }}">Home</a></li>
                        <li class="{{ request()->is('shop') ? 'active' : '' }}" ><a href="{{ route('shop') }}">Shop</a></li>

                        @if(@Auth::check() && Auth::user()->userTye == 'customer')
                            <li><a href="{{ route('cus/home') }}">Dashboard</a></li>
                            @endif
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    @php
                        $total = App\Models\Cart::all()->where('user_ip',request()->ip())->sum(function($sum){
                            return $sum->price* $sum->qty;
                        });
                        $qty = App\Models\Cart::all()->where('user_ip',request()->ip())->sum('qty');
                    @endphp
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-bag"></i> <span>{{ $qty }}</span></a></li>
                    </ul>
                    <div class="header__cart__price">Total: <span>${{ $total }}</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>

        @if(session('Cart_insert'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center justify-content-center">
                    <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Success!</strong> {{ session('Cart_insert') }}</span>
                </div><!-- d-flex -->
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center justify-content-center">
                    <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span> {{ session('warning') }}</span>
                </div><!-- d-flex -->
            </div>
        @endif
    </div>
</header>
