@extends('layouts.master')

@section('title')
    Design Hub Checkout
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8" style="margin-left: 50px; padding: 50px">
            <h1 style="margin-left: 20px; padding-bottom: 20px">Checkout</h1>
            <h4>Total: ${{ $total }}.00</h4>
            <div id="charge-error" class="alert alert-danger" {{!\Illuminate\Support\Facades\Session::has('error')? 'hidden':''}}>
                {{ \Illuminate\Support\Facades\Session::get('error') }}
            </div>
            <form action="{{route('checkout')}}" method="Post" id="payment-form">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="name" class="price">Name</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="address" class="price">Address</label>
                            <input type="text" id="address" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="card-name" class="price">Card Holder Name</label>
                            <input type="text" id="card-name" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="card-number" class="price">Card Number</label>
                            <input type="text" id="card-number" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="card-expiry-month" class="price">Expiration Moth</label>
                            <input type="text" id="card-expiry-month" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="card-expiry-year" class="price">Expiration Year</label>
                            <input type="text" id="card-expiry-year" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="card-cvc" class="price">CVC</label>
                            <input type="text" id="card-cvc" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success " type="submit">Buy now</button>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="{{ \Illuminate\Support\Facades\URL::to('js/checkout.js') }}"></script>
    @endsection
