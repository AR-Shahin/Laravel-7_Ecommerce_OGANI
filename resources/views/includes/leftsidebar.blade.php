<!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo"><a href="{{ route('dashboard') }}"><i class="icon ion-android-star-outline"></i> Admin Pannel</a></div>
<div class="sl-sideleft">
    <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
         <button class="btn"><i class="fa fa-search"></i></button>
       </span><!-- input-group-btn -->
    </div><!-- input-group -->

    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
        <a href="{{ route('dashboard') }}" class="sl-menu-link {{ request()->is('admin') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-home tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ route('home') }}" class="sl-menu-link" target="_blank">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon fa fa-share  tx-22"></i>
                <span class="menu-item-label">Visit Site</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ route('categories.index') }}" class="sl-menu-link {{ request()->is('categories') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon fa fa-tags tx-20"></i>
                <span class="menu-item-label">Categories</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ route('brands.index') }}" class="sl-menu-link {{ request()->is('brands') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon fa fa-leaf tx-20"></i>
                <span class="menu-item-label">Brands</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="#" class="sl-menu-link {{ request()->is('products') ? 'active' : '' }} {{ request()->is('products') ? 'show-sub' : '' }} {{ request()->is('products/create') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-cube tx-20"></i>
                <span class="menu-item-label">Products</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link active {{ request()->is('products') ? 'active' : '' }}">Manage Products</a></li>
        </ul>
        <a href="{{ url('coupons.index') }}" class="sl-menu-link {{ request()->is('coupons.index') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon fa fa-clock-o  tx-22"></i>
                <span class="menu-item-label">Coupons</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="#" class="sl-menu-link {{ request()->is('manageorder.index') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Orders</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ url('manageorder.index')}}" class="nav-link">Manage Order</a></li>
        </ul>

        {{--site--}}
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-globe tx-24"></i>
                <span class="menu-item-label">Site Identity</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ url('manageorder.index')}}" class="nav-link">Logo & Footer</a></li>
            <li class="nav-item"><a href="{{ url('manageorder.index')}}" class="nav-link">Social Links</a></li>
        </ul>

        {{--slider--}}
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-sliders tx-24"></i>
                <span class="menu-item-label">Sliders</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('slider.index')}}" class="nav-link">Manage Slider</a></li>
        </ul>

    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->
