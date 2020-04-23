@extends('layouts.master')

@section('title')
    Design Hub Admin Home
@endsection

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Order QTY</th>
            <th scope="col">Unit Price</th>
            <th scope="col">Grand Total</th>
            <th scope="col">Order Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td><img src="{{$order->img_url}}" class="rounded mx-auto d-block" width="100px" alt="image"></td>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->order_qty }}</td>
                <td>${{ $order->unit_price }}</td>
                <td>${{$order->grand_total}}</td>
                <td><button type="button" class="btn btn-warning">{{$order->status === 0 ? "Shipped" : "New"}}</button></td>
                <td><a href="/createshippinglabel" type="button" class="btn btn-success">Create Shipping</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
