@extends('layouts.backmaster')
@section('title', 'Category')
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
  <div class="col-12 col-md-8">
   <div class="card">
     <div class="card-body">
      <h3 class="mb-3">Manage Orders</h3>
      <hr>
      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">SL</th>
              <th class="wd-15p">Category name</th>
              <th class="wd-15p">Image</th>
              <th class="wd-20p">Status</th>
              <th class="wd-15p">Added date</th>
              <th class="wd-10p">Actions</th>
            </tr>
          </thead>
        </table>

      </div><!-- table-wrapper -->
     </div>
   </div>
  </div>

</div>
@endsection
{{-- Edit modal --}}
@foreach($categories as $cat)
<div id="editModal_{{ $cat->id }}" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Category</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <form action="{{ url('categories.update/'.$cat->id) }}" method="POST" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden"  value="{{ $cat->cat_img }}" name="old_img">
          <label for="">Category Name : </label>
         <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
           <input type="text" class="form-control @error('cat_name') is-invalid @enderror" value="{{ $cat->cat_name }}" name="cat_name">
         </div>
         @error('cat_name')
         <span class="text-danger">{{ $message  }}</span>
         @enderror
         <label for="">Category Image : </label>
         <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-image tx-16 lh-0 op-6"></i></span>
           <input type="file" class="form-control @error('cat_img') is-invalid @enderror"  value="{{ old('cat_img') }}" name="cat_img">
           <img src="{{ asset($cat->cat_img) }}" alt="" width="60px">
         </div>
         @error('cat_img')
         <span class="text-danger">{{ $message  }}</span>
         @enderror
         <div class="form-group mt-3">
           <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-pencil-square mr-1"></i> Update Category</button>
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

