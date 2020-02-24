@extends('layouts.master')

@section('title')
    Design Hub Shopping Cart
@endsection

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('cart'))
        <div class="row">
            <div class="col-md-8" style="margin-left: 50px; padding: 50px">
                <h1 style="margin-left: 20px; padding-bottom: 20px">Shopping Cart</h1>
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <strong>{{ $product['item']['title'] }}</strong>
                            <span class="badge badge-success" style="font-size: 14px; font-weight: bold">  x {{$product['qty']}}   </span>
{{--                            <span class="label label-success">${{$product['price']}}.00</span>--}}
                            <div class="btn-group pull-right">
                                <button class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown">Action
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Reduce by 1</a></li>
                                    <li><a href="#">Reduce All</a></li>
                                </ul>
                            </div>
                        </li>
                        @endforeach
                </ul>
            </div>
        </div>
        <div class="row" style="margin-left: 100px">
            <div class="col-sm-6 col-md-6 ">
                <h4>Total: $ {{$totalPrice}}.00</h4>
            </div>
            <hr>
            <div class="col-sm-6 col-md-6">
                <a href="{{ route('checkout') }}" type="button" class="btn btn-success" style="font-size: 16px">Checkout</a>
            </div>
        </div>
    @else
        <div class="col-sm-6 col-md-6"  style="margin: 30px; padding-left: 50px">
            <h2>No Items in Cart!</h2>
        </div>
    @endif
@endSection
