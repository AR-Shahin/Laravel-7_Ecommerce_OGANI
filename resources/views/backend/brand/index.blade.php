@extends('layouts.backmaster')
@section('title', 'Brand')
@section('css_files')
    <link href="{{ asset('backend') }}/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">
@endsection
{{--breadcrumb  --}}
@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item">Brand</a>
    </nav>
@endsection


{{--main content  --}}
@section('main_content')
    <div class="row no-gutters">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3">Manage Brands</h3>
                    <hr>
                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                            <tr>
                                <th class="wd-15p">SL</th>
                                <th class="wd-15p">Brand name</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-15p">Added date</th>
                                <th class="wd-10p">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($brands as $brand)
                                @php
                                    $count = 0;
                                     $count =  App\Models\Product::where('brand_id',$brand->id)->count();
                                @endphp
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ ucwords($brand->brand_name) }}</td>
                                    <td>
                                        @if($brand->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $brand->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary"  data-toggle="modal" data-target="#editModal_{{ $brand->id }}"><i class="fa fa-pencil-square"></i></a>
                                        @if($count == 0)
                                            <a href="{{ url('brands.delete/'.$brand->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i></a>
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
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3">Add Brand</h3>
                    <hr>
                    <form action="{{ route('brands.store') }}" method="POST">
                        @csrf
                        <label for="">Brand Name : </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control @error('brand_name') is-invalid @enderror" placeholder="Brand Name" value="{{ old('brand_name') }}" name="brand_name">
                        </div>
                        @error('brand_name')
                        <span class="text-danger">{{ $message  }}</span>
                        @enderror
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-plus-square mr-1"></i> Add Brand</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Edit modal --}}
@foreach($brands as $brand)
    <div id="editModal_{{ $brand->id }}" class="modal fade">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Brand</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <form action="{{ url('brands.update/'.$brand->id) }}" method="POST">
                        @csrf
                        <label for="">Brand Name : </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control @error('brand_name') is-invalid @enderror" value="{{ $brand->brand_name }}" name="brand_name">
                        </div>
                        @error('cat_name')
                        <span class="text-danger">{{ $message  }}</span>
                        @enderror
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-pencil-square mr-1"></i> Update Brand</button>
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

