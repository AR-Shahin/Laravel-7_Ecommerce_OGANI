@extends('layouts.backmaster')
@section('title', 'Billing')
@section('css_files')
    <link href="{{ asset('backend') }}/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">
@endsection
{{--breadcrumb  --}}
@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item">Billing Information</a>
    </nav>
@endsection


{{--main content  --}}
@section('main_content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3">Billing Information</h3>
                    <hr>
                    <table class="table table-border" id="datatable1">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Transaction Id</th>
                            <th>Amount</th>
                            <th>Added date</th>
                            <th>View Order</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach($bliings as $bill)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$bill->name}}</td>
                                <td>{{$bill->email}}</td>
                                <td>{{$bill->phone}}</td>
                                <td>{{$bill->address}}</td>
                                <td>{{$bill->transaction_id}}</td>
                                <td>{{$bill->amount}}</td>
                                <td>{{$bill->created_at->diffForHumans()}}</td>
                                <td class="text-center"><a href="{{route('billing.oder',$bill->transaction_id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
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

