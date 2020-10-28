@extends('layouts.backmaster')
@section('title', 'DashBoard')

{{--breadcrumb  --}}
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Pages</a>
    <span class="breadcrumb-item active">Blank Page</span>
  </nav>
@endsection


{{--main content  --}}
@section('main_content')
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-sm-6 col-xl-3">
        <div class="card pd-20 bg-primary">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2"><canvas width="59" height="50" style="display: inline-block; width: 59px; height: 50px; vertical-align: top;"></canvas></span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">$850</h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
              <span class="tx-11 tx-white-6">Gross Sales</span>
              <h6 class="tx-white mg-b-0">$2,210</h6>
            </div>
            <div>
              <span class="tx-11 tx-white-6">Tax Return</span>
              <h6 class="tx-white mg-b-0">$320</h6>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div>
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
        <div class="card pd-20 bg-purple">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month's Sales</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2"><canvas width="59" height="50" style="display: inline-block; width: 59px; height: 50px; vertical-align: top;"></canvas></span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">$11,908</h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
              <span class="tx-11 tx-white-6">Gross Sales</span>
              <h6 class="tx-white mg-b-0">$2,210</h6>
            </div>
            <div>
              <span class="tx-11 tx-white-6">Tax Return</span>
              <h6 class="tx-white mg-b-0">$320</h6>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div>
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
        <div class="card pd-20 bg-sl-primary">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2"><canvas width="59" height="50" style="display: inline-block; width: 59px; height: 50px; vertical-align: top;"></canvas></span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">$91,239</h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
              <span class="tx-11 tx-white-6">Gross Sales</span>
              <h6 class="tx-white mg-b-0">$2,210</h6>
            </div>
            <div>
              <span class="tx-11 tx-white-6">Tax Return</span>
              <h6 class="tx-white mg-b-0">$320</h6>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div>
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
        <div class="card pd-20 bg-info">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Week's Sales</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2"><canvas width="59" height="50" style="display: inline-block; width: 59px; height: 50px; vertical-align: top;"></canvas></span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">$4,625</h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
              <span class="tx-11 tx-white-6">Gross Sales</span>
              <h6 class="tx-white mg-b-0">$2,210</h6>
            </div>
            <div>
              <span class="tx-11 tx-white-6">Tax Return</span>
              <h6 class="tx-white mg-b-0">$320</h6>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div>
    </div>
  </div>
</div>
@endsection


