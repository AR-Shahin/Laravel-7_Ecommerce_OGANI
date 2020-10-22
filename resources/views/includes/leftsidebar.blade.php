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
       <a href="{{ route('dashboard') }}" class="sl-menu-link">
         <div class="sl-menu-item">
           <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
           <span class="menu-item-label">Dashboard</span>
         </div><!-- menu-item -->
       </a><!-- sl-menu-link -->
       <a href="{{ route('home') }}" class="sl-menu-link" target="_blank">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fa fa-share  tx-22"></i>
          <span class="menu-item-label">Visit Site</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
       <a href="{{ route('categories.index') }}" class="sl-menu-link">
         <div class="sl-menu-item">
           <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
           <span class="menu-item-label">Categories</span>
         </div><!-- menu-item -->
       </a><!-- sl-menu-link -->
       <a href="{{ route('brands.index') }}" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
          <span class="menu-item-label">Brands</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
       <a href="#" class="sl-menu-link">
         <div class="sl-menu-item">
           <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
           <span class="menu-item-label">Products</span>
           <i class="menu-item-arrow fa fa-angle-down"></i>
         </div><!-- menu-item -->
       </a><!-- sl-menu-link -->
       <ul class="sl-menu-sub nav flex-column">
         <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link">Manage Products</a></li>
         <li class="nav-item"><a href="chart-flot.html" class="nav-link">Manage Products</a></li>
       </ul>
       <a href="#" class="sl-menu-link">
         <div class="sl-menu-item">
           <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
           <span class="menu-item-label">Forms</span>
           <i class="menu-item-arrow fa fa-angle-down"></i>
         </div><!-- menu-item -->
       </a><!-- sl-menu-link -->
       <ul class="sl-menu-sub nav flex-column">
         <li class="nav-item"><a href="form-elements.html" class="nav-link">Form Elements</a></li>
         <li class="nav-item"><a href="form-layouts.html" class="nav-link">Form Layouts</a></li>
         <li class="nav-item"><a href="form-validation.html" class="nav-link">Form Validation</a></li>
         <li class="nav-item"><a href="form-wizards.html" class="nav-link">Form Wizards</a></li>
         <li class="nav-item"><a href="form-editor-text.html" class="nav-link">Text Editor</a></li>
       </ul>
       <a href="#" class="sl-menu-link">
         <div class="sl-menu-item">
           <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
           <span class="menu-item-label">UI Elements</span>
           <i class="menu-item-arrow fa fa-angle-down"></i>
         </div><!-- menu-item -->
       </a><!-- sl-menu-link -->
       <ul class="sl-menu-sub nav flex-column">
         <li class="nav-item"><a href="accordion.html" class="nav-link">Accordion</a></li>
         <li class="nav-item"><a href="alerts.html" class="nav-link">Alerts</a></li>
         <li class="nav-item"><a href="buttons.html" class="nav-link">Buttons</a></li>
         <li class="nav-item"><a href="cards.html" class="nav-link">Cards</a></li>
         <li class="nav-item"><a href="icons.html" class="nav-link">Icons</a></li>
         <li class="nav-item"><a href="modal.html" class="nav-link">Modal</a></li>
         <li class="nav-item"><a href="navigation.html" class="nav-link">Navigation</a></li>
         <li class="nav-item"><a href="pagination.html" class="nav-link">Pagination</a></li>
         <li class="nav-item"><a href="popups.html" class="nav-link">Tooltip &amp; Popover</a></li>
         <li class="nav-item"><a href="progress.html" class="nav-link">Progress</a></li>
         <li class="nav-item"><a href="spinners.html" class="nav-link">Spinners</a></li>
         <li class="nav-item"><a href="typography.html" class="nav-link">Typography</a></li>
       </ul>
       <a href="#" class="sl-menu-link">
         <div class="sl-menu-item">
           <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
           <span class="menu-item-label">Tables</span>
           <i class="menu-item-arrow fa fa-angle-down"></i>
         </div><!-- menu-item -->
       </a><!-- sl-menu-link -->
       <ul class="sl-menu-sub nav flex-column">
         <li class="nav-item"><a href="table-basic.html" class="nav-link">Basic Table</a></li>
         <li class="nav-item"><a href="table-datatable.html" class="nav-link">Data Table</a></li>
       </ul>
       <a href="#" class="sl-menu-link">
         <div class="sl-menu-item">
           <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
           <span class="menu-item-label">Maps</span>
           <i class="menu-item-arrow fa fa-angle-down"></i>
         </div><!-- menu-item -->
       </a><!-- sl-menu-link -->
       <ul class="sl-menu-sub nav flex-column">
         <li class="nav-item"><a href="map-google.html" class="nav-link">Google Maps</a></li>
         <li class="nav-item"><a href="map-vector.html" class="nav-link">Vector Maps</a></li>
       </ul>
       <a href="mailbox.html" class="sl-menu-link">
         <div class="sl-menu-item">
           <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
           <span class="menu-item-label">Mailbox</span>
         </div><!-- menu-item -->
       </a><!-- sl-menu-link -->
       <a href="#" class="sl-menu-link">
         <div class="sl-menu-item">
           <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
           <span class="menu-item-label">Pages</span>
           <i class="menu-item-arrow fa fa-angle-down"></i>
         </div><!-- menu-item -->
       </a><!-- sl-menu-link -->
       <ul class="sl-menu-sub nav flex-column">
         <li class="nav-item"><a href="blank.html" class="nav-link">Blank Page</a></li>
         <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
         <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
         <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
       </ul>
     </div><!-- sl-sideleft-menu -->

     <br>
   </div><!-- sl-sideleft -->
   <!-- ########## END: LEFT PANEL ########## -->
