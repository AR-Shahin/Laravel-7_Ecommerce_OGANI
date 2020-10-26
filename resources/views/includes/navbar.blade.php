<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__auth">
                            <div class="d-flex">
                                <a href="{{ url('customer.login') }}" style="display: inline-block"><i class="fa fa-user"></i> Login</a>
                                <div class="mx-2"></div>
                                <a href="{{ url('customer.registration') }}"><i class="fa fa-user"></i> Registration</a>
                            </div>
                           
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
                    <a href="{{ route('home') }}"><img src="{{ asset('frontend') }}/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                        <li class="{{ request()->is('shop') ? 'active' : '' }}" ><a href="{{ route('shop') }}">Shop</a></li>
                       
                        <li><a href="{{ url('order.index') }}">Order Page</a></li>
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
