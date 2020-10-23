@extends('layouts.backmaster')
@section('title', 'Coupon')
@section('css_files')
<link href="{{ asset('backend') }}/lib/highlightjs/github.css" rel="stylesheet">
<link href="{{ asset('backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">
@endsection
{{--breadcrumb  --}}
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
    <a class="breadcrumb-item">Coupon</a>
  </nav>
@endsection


{{--main content  --}}
@section('main_content')
<div class="row no-gutters">
  <div class="col-12 col-md-8">
   <div class="card">
     <div class="card-body">
      <h3 class="mb-3">Manage Coupons</h3>
      <hr>
      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">SL</th>
              <th class="wd-15p">Coupon name</th>
              <th class="wd-15p">Discount</th>
              <th class="wd-20p">Status</th>
              <th class="wd-15p">Added date</th>
              <th class="wd-10p">Actions</th>
            </tr>
          </thead>
       <tbody>
         @php
           $i=1;
         @endphp
         @foreach($coupons as $coupon)
         <tr>
          <td>{{ $i++ }}</td>
          <td>{{$coupon->coupon_name }}</td>
          <td>{{$coupon->discount }}%</td>
          <td>
            @if($coupon->status == 1)
            <span class="badge badge-success">Active</span>
              @else
              <span class="badge badge-danger">Inactive</span>
            @endif
          </td>
          <td>{{ $coupon->created_at->diffForHumans() }}</td>
          <td>
            @if($coupon->status == 1)
            <a href="{{ url('couponstatusInActive').'/'.$coupon->id }}" class="btn btn-warning btn-sm"><i class="icon ion-arrow-down-a"></i></a>
            @elseif($coupon->status == 0)
            <a href="{{ url('couponstatusActive').'/'.$coupon->id }}" class="btn btn-success btn-sm"><i class="icon ion-arrow-up-a"></i></a>
            @endif
            <a href="" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#editModal_{{ $coupon->id }}"><i class="fa fa-pencil-square"></i></a>
            <a href="{{ url('coupons.delete/'.$coupon->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i></a>
          </td>
        </tr>
         @endforeach
       </tbody>
        </table>

      </div><!-- table-wrapper -->
     </div>
   </div>
  </div>
  <div class="col-12 col-md-4">
    <div class="card">
      <div class="card-body">
       <h3 class="mb-3">Add Coupon</h3>
       <hr>
 <form action="{{ route('coupons.store') }}" method="POST">
   @csrf
   <label for="">Coupon Name : </label>
  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
    <input type="text" class="form-control @error('coupon_name') is-invalid @enderror" placeholder="Coupon Name" value="{{ old('coupon_name') }}" name="coupon_name">
  </div>
  @error('coupon_name')
  <span class="text-danger">{{ $message  }}</span>
  @enderror

<br>
  <label for=""> Discount : </label>
  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
    <input type="text" class="form-control @error('discount') is-invalid @enderror" placeholder="Discount" value="{{ old('discount') }}" name="discount">
  </div>
  @error('discount')
  <span class="text-danger">{{ $message  }}</span>
  @enderror
  <div class="form-group mt-3">
    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-plus-square mr-1"></i> Add Coupon</button>
  </div>
 </form>
      </div>
    </div>
  </div>
</div>
@endsection
{{-- Edit modal --}}
@foreach($coupons as $coupon)
<div id="editModal_{{ $coupon->id }}" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Brand</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <form action="{{ url('coupons.update/'.$coupon->id) }}" method="POST">
          @csrf
          <label for="">Brand Name : </label>
         <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
           <input type="text" class="form-control @error('coupon_name') is-invalid @enderror" value="{{ $coupon->coupon_name }}" name="coupon_name">
         </div>
         @error('coupon_name')
         <span class="text-danger">{{ $message  }}</span>
         @enderror
         <label for=""> Discount : </label>
         <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
           <input type="text" class="form-control @error('discount') is-invalid @enderror" value="{{ $coupon->discount }}" name="discount">
         </div>
         @error('discount')
         <span class="text-danger">{{ $message  }}</span>
         @enderror
         <div class="form-group mt-3">
           <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-pencil-square mr-1"></i> Update Coupon</button>
         </div>
        </form>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->
@endforeach
@section('scripts')
<script src="{{ asset('backend') }}/lib/highlightjs/highlight.pack.js"></script>
<script src="{{ asset('backend') }}/lib/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('backend') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="{{ asset('backend') }}/lib/select2/js/select2.min.js"></script>
<script>
  $(function(){
    'use strict';

    $('#datatable1').DataTable({
      responsive: true,
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
      }
    });

    /*$('#datatable2').DataTable({
      bLengthChange: false,
      searching: false,
      responsive: true
    });*/

    // Select2
    $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

  });
</script>
@endsection

