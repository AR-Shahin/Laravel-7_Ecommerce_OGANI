@extends('layouts.backorginmaster')
@include('includes.leftsidebar')
@include('includes.adheader')
@include('includes.adrightside')

<div class="sl-mainpanel">
   @yield('breadcrumb')
   @if(session('insert'))
   <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Well done!</strong> {{ session('insert') }}</span>
    </div><!-- d-flex -->
  </div><!-- alert -->
  @endif
  @if(session('error'))
  <div class="alert alert-warning" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
      <i class="icon ion-alert-circled alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
      <span><strong>Warning!</strong> {{ session('error') }}</span>
    </div><!-- d-flex -->
  </div>
 @endif
 @if(session('delete'))
 <div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Well done!</strong> {{ session('delete') }}</span>
  </div><!-- d-flex -->
</div><!-- alert -->
@endif
@if(session('update'))
<div class="alert alert-info" role="alert">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
 <div class="d-flex align-items-center justify-content-start">
   <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
   <span><strong>Well done!</strong> {{ session('update') }}</span>
 </div><!-- d-flex -->
</div><!-- alert -->
@endif
    <div class="sl-pagebody">
        
    @yield('main_content')

    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->