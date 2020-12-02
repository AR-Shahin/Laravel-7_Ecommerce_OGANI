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
        <a class="breadcrumb-item">Order Products</a>
    </nav>
@endsection


{{--main content  --}}
@section('main_content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3 d-inline">Order Products</h3>
                    <a style="float:right;" href="{{route('billing.info')}}" class="btn btn-sm btn-info">Back</a>
                    <hr>

                    <table class="table table-bordered">
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                            <th>Coupon</th>
                            <th>Total</th>
                        </tr>
                        <?php
                        $sum =0;
                        ?>
                        @foreach($items as $item)
                            <tr>
                                <td>{{$item->product->product_name}}</td>
                                <td>{{$item->product->price}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->coupon}}</td>
                                <td>{{$total = $item->qty * $item->product->price}}</td>
                            </tr>
                            <?php
                                $sum+=$total;
                            ?>
                        @endforeach
                        <tr>
                            <td colspan="3"></td>
                            <td>Total : </td>
                            <td>{{$sum}}</td>

                        </tr>
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

