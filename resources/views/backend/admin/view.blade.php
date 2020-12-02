@extends('layouts.backmaster')
@section('title', 'Admin')
@section('css_files')
    <link href="{{ asset('backend') }}/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">
@endsection
{{--breadcrumb  --}}
@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item">Admin</a>
    </nav>
@endsection


{{--main content  --}}
@section('main_content')
    <div class="row no-gutters">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3 d-inline">Manage Admins</h3>
                    <a href="{{route('e-registraion')}}" style="float: right;" class="btn btn-info"><i class="fa fa-plus"></i> Add New Admin</a>
                    <hr>
                    <div class="table-wrapper">
                        <table class="table table-bordered" id="dataTable" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Joined</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ucwords($admin->name)}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td><img src="{{asset($admin->image)}}" alt="" width="60px"></td>
                                    <td>{{$admin->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if(Auth::user()->id != $admin->id)
                                            <a href="{{route('admin.delete',$admin->id)}}" class="btn btn-sm btn-danger">Delete</a>
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


