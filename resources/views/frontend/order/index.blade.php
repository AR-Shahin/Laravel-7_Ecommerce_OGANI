@extends('layouts.frontmaster')
@section('title', 'Order Page')

@section('main_content')

<div class="container">
   <div class="row justify-content-center">
       <div class="col-10 ">
           <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Staus</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($data['orderData'] as $order)
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
                                    @else
                                    <span class="badge badge-link">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger">Delete</a>
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
@endsection