@extends('layouts.backmaster')
@section('title', 'Product')
@section('css_files')
<link href="{{ asset('backend') }}/lib/highlightjs/github.css" rel="stylesheet">
<link href="{{ asset('backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">
@endsection
{{--breadcrumb  --}}
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
    <a class="breadcrumb-item">Manage Product</a>
  </nav>
@endsection


{{--main content  --}}
@section('main_content')
<div class="row">
  <div class="col-12 col-md-12">
   <div class="card">
     <div class="card-body">
      <h3 class="mb-3" style ="display:inline-block">Manage Product</h3>
       <a href="{{ url('products/create  ')}}" class="btn btn-primary" style="float:right"><i class="fa fa-plus"></i> Add New Product</a>
      <hr>
      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">SL</th>
              <th class="wd-15p">Product name</th>
              <th class="wd-20p">Category</th>
              <th class="wd-15p">Brand</th>
              <th class="wd-10p">Price</th>
              <th class="wd-10p">Quantity</th>
              <th class="wd-10p">Image</th>
              <th class="wd-10p">Views</th>
              <th class="wd-10p">Status</th>
              <th class="wd-10p">Actions</th>
            </tr>
          </thead>
          <tbody>
              @php
              $i=1;
              @endphp
            @foreach($data['products'] as $product)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->category->cat_name }}</</td>
              <td>{{ $product->brand->brand_name }}</</td>
              <td>$ {{ $product->price }}</</td>
              <td>
              @if($product->quantity <5)
               <span class="badge badge-danger">{{ $product->quantity }}</span>
               @else
                {{ $product->quantity }}
              @endif
              </</td>
              <td>
                <img src="{{ asset($product->main_image) }}" alt="" width="60px">
                </td>
                <td>{{ $product->count }}</</td>
              <td>
                     @if($product->status == 1)
                <span class="badge badge-success">Active</span>
                  @else
                  <span class="badge badge-danger">Inactive</span>
                @endif</</td>
              <td>
                @if($product->status == 1)
                <a href="{{ url('statusInActive').'/'.$product->id }}" class="btn btn-warning btn-sm"><i class="icon ion-arrow-down-a"></i></a>
                @elseif($product->status == 0)
                <a href="{{ url('statusActive').'/'.$product->id }}" class="btn btn-success btn-sm"><i class="icon ion-arrow-up-a"></i></a>
                @endif
               
                <a href="{{ url('products').'/'.base64_encode($product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                <a href="{{ url('products.edit').'/'.base64_encode($product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil-square"></i></a>
                  <a href="{{ url('products.delete').'/'.$product->id }}"  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div><!-- table-wrapper -->
     </div>
   </div>
  </div>
@endsection
{{-- Edit modal --}}

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

