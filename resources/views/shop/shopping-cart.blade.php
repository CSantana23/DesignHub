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
                           <span class="price"> {{ $product['item']['title'] }}</span>
                            <div class="btn-group pull-right">
                                <a href="{{ route('addCart', ['id'=>$product['item']->id]) }}">
                                    <i  class="fa fa-plus-circle fa-2x" aria-hidden="true"> </i>
                                </a>
                                <span class="price"> &nbsp;&nbsp;{{$product['qty']}}&nbsp;&nbsp; </span>
                                <a  href="#">
                                    <i  class="fa fa-minus-circle fa-2x" aria-hidden="true"> </i>
                                </a>
                                <span class="price">&nbsp;&nbsp;${{$product['price']}}.00&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <a  href="#">
                                    <i  class="fa fa-times fa-2x" aria-hidden="true" style="color:gray"> </i>
                                </a>
                            </div>
                        </li>
                        @endforeach
                </ul>
            </div>
        </div>
        <div class="row" style="margin-left: 100px">
            <div class="col-sm-8 col-md-6 ">
                <h4>Total: $ {{$totalPrice}}.00</h4>
            </div>
            <hr>
            <div class="col-sm-8 col-md-6 pull-right">
                <a href="{{ url('/') }}" type="button" class="btn btn-success" style="font-size: 16px">Continue Shopping</a>
                <a href="{{ route('checkout.index') }}" type="button" class="btn btn-success" style="font-size: 16px">Checkout</a>
            </div>
        </div>
    @else
        <div class="col-sm-6 col-md-6"  style="margin: 30px; padding-left: 50px">
            <h2>No Items in Cart!</h2>
        </div>
    @endif
@endSection
