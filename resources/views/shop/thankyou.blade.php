@extends('layouts.master')

@section('title')
    Design Hub Checkout
@endsection
@yield('extra-css')

@section('content')
    <div class="jumbotron text-center">
            <div class="row pl-xl-5">
                <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <address>
                                <strong>Design Hub</strong>
                                <br>
                                2135 Sunset Blvd
                                <br>
                                New York City, NY 10004
                                <br>
                                <abbr title="Phone">P:</abbr> (212) 484-0000
                            </address>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <p>
                                <em>Date: 21st April, 2020</em>
                            </p>
                            <p>
                                <em>Receipt #: 34522677W</em>
                            </p>
                        </div>
                    </div>
                    <div class="row pt-xl-5">
                        <div class="text-center">
                            <h2>Receipt</h2>
                        </div>
                        </span>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>#</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="col-md-9"><em>Expedita accusamus quos placeat quibusdam nam eaque.</em></td>
                                <td class="col-md-1" style="text-align: center">{{$cart->totalQty}}</td>
                                <td class="col-md-1 text-center">$136</td>
                                <td class="col-md-1 text-center">${{$cart->totalPrice}}</td>
                            </tr>

                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td class="text-right">
                                    <p>
                                        <strong>Subtotal: </strong>
                                    </p>
                                    <p>
                                        <strong>Tax: </strong>
                                    </p></td>
                                <td class="text-center">
                                    <p>
                                        <strong>$6.94</strong>
                                    </p>
                                    <p>
                                        <strong>$6.94</strong>
                                    </p></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                <td class="text-center text-danger"><h4><strong>${{$cart->totalPrice}}.00</strong></h4></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <p class="pt-xl-5">
            Having trouble? <a href="">Contact us</a>
        </p>
        <p class="lead">
            <a class="btn btn-success" href="{{url('/')}}" role="button">Back to homepage</a>
        </p>
    </div>
    @endsection
