@extends('layouts.backmaster')
@section('title', 'DashBoard')
{{--main content  --}}
@section('main_content')
<div class="card">
  <div class="card-body">
    <div class="row">

      <div class="col-sm-6 col-xl-3">
        <div class="card pd-20 bg-primary">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Category</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2"><canvas width="59" height="50" style="display: inline-block; width: 59px; height: 50px; vertical-align: top;"></canvas></span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$category}}</h3>
          </div><!-- card-body -->
        </div><!-- card -->
      </div>

      <div class="col-sm-6 col-xl-3">
        <div class="card pd-20 bg-warning">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Brand</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2"><canvas width="59" height="50" style="display: inline-block; width: 59px; height: 50px; vertical-align: top;"></canvas></span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$brand}}</h3>
          </div><!-- card-body -->
        </div><!-- card -->
      </div>

      <div class="col-sm-6 col-xl-3">
        <div class="card pd-20 bg-info">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Product</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2"><canvas width="59" height="50" style="display: inline-block; width: 59px; height: 50px; vertical-align: top;"></canvas></span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$product}}</h3>
          </div><!-- card-body -->
        </div><!-- card -->
      </div>

      <div class="col-sm-6 col-xl-3">
        <div class="card pd-20 bg-secondary">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Order</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2"><canvas width="59" height="50" style="display: inline-block; width: 59px; height: 50px; vertical-align: top;"></canvas></span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$order}}</h3>
          </div><!-- card-body -->
        </div><!-- card -->
      </div>

      <div class="col-sm-6 col-xl-3 mt-4">
        <div class="card pd-20 bg-info">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Avilable Product</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2"><canvas width="59" height="50" style="display: inline-block; width: 59px; height: 50px; vertical-align: top;"></canvas></span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$Available_product}}</h3>
          </div><!-- card-body -->
        </div><!-- card -->
      </div>

      <div class="col-sm-6 col-xl-3 mt-4">
        <div class="card pd-20 bg-success">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Coupon</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2"><canvas width="59" height="50" style="display: inline-block; width: 59px; height: 50px; vertical-align: top;"></canvas></span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$coupon}}</h3>
          </div><!-- card-body -->
        </div><!-- card -->
      </div>
    </div>
  </div>
</div>
@endsection


