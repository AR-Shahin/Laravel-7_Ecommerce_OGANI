@extends('layouts.backmaster')
@section('title', 'Order')
@section('css_files')
<link href="{{ asset('backend') }}/lib/highlightjs/github.css" rel="stylesheet">
<link href="{{ asset('backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">
@endsection
{{--breadcrumb  --}}
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
    <a class="breadcrumb-item">Category</a>
  </nav>
@endsection


{{--main content  --}}
@section('main_content')
<div class="row no-gutters">
  <div class="col-12 col-md-12">
   <div class="card">
     <div class="card-body">
      <h3 class="mb-3">Manage Orders</h3>
      <hr>
      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">SL</th>
              <th class="wd-15p">Customer</th>
              <th class="wd-15p">Product name</th>
              <th class="wd-15p">Qtuantity</th>
              <th class="wd-20p">Price</th>
              <th class="wd-20p">Status</th>
              <th class="wd-15p">Added date</th>
              <th class="wd-10p">Actions</th>
            </tr>
          </thead>
          <tbody>
              @php
                  $i=1;
              @endphp
              @foreach($data['orders'] as $order)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $order->admin->name }}</td>
                <td>{{ $order->product->product_name }}</td>
                <td>{{ $order->qty }}</td>
                <td>{{ $order->product->price  }}</td>
                <td>
                    @if($order->status == 0)
                        <span class="badge badge-warning">New</span>
                    @elseif($order->status == 1)
                        <span class="badge badge-info">Shifted</span>
                        @elseif($order->status == 4)
                        <span class="badge badge-success">Received</span>
                    @endif
                </td>
                <td>{{ $order->created_at->diffForHumans() }}</td>
                <td>
                  @if($order->status == 0)
                  <a href="{{ url('shiftedOrder').'/'.$order->id }}" class="btn btn-info">Shift</a>
                    @elseif($order->status == 1)
                    <a href="{{ url('trashdOrder').'/'.$order->id }}" class="btn btn-danger">Trash</a>

                    @endif

                </td>
            </tr>
              @endforeach

          </tbody>
        </table>

      </div><!-- table-wrapper -->
     </div>
   </div>
  </div>

</div>
@endsection

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

