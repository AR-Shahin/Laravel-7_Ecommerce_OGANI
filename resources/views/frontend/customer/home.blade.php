@extends('layouts.frontmaster')
@section('title', 'Customer Dashboard')

@section('main_content')
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Welcome <span class="text-primary">{{Auth::user()->name}}</span></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Oder Items</a>
                                </div>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <table class="table-bordered table">
                                            <tr>
                                                <td colspan="2">My Profile</td>
                                            </tr>
                                            <tr>
                                                <td>Image</td>
                                                <td><img src="{{asset(Auth::user()->image)}}" alt="" class="img-fluid w-25"></td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td>{{Auth::user()->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{Auth::user()->email}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-messages-tab">


                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Total Price</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i=1;
                                            @endphp

                                            @foreach($data['orderItms'] as $order)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $order->product->product_name }}</td>
                                                    <td><img width="60px" src="{{ asset($order->product->main_image) }}" alt=""></td>
                                                    <td>{{ $order->qty }}</td>
                                                    <td>${{ $order->product->price }}</td>
                                                    <td>${{ $order->product->price * $order->qty  }}</td>
                                                    <td>
                                                        @if($order->status == 0)
                                                            <span class="badge badge-info">Pending</span>
                                                        @elseif($order->status == 1)
                                                            <span class="badge badge-warning">Shifting</span>
                                                            <a href="" class="btn btn-danger btn-sm">Received</a>
                                                        @else
                                                            <span class="badge badge-link">N/A</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection