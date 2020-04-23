@extends('layouts.master')

@section('title')
    Design Hub Admin Home
@endsection

@section('content')
<div class="container">
    <div class="col-md-6 mx-auto text-center">
        <div class="header-title">
            <h1 class="wv-heading--title">
                Create shipping label!
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="row">
                <form class="col-md-6 p-xl-5 border m-3">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Package Type</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="package" placeholder="Small Package" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">Dimensions</label>
                        <div class="col-sm-2">
                            <input type="length" class="form-control" id="length" placeholder="length" />
                        </div>
                        <span class="pt-1">X</span>
                        <div class="col-sm-2">
                            <input type="length" class="form-control" id="length" placeholder="height" />
                        </div>
                        <span class="pt-1">X</span>
                        <div class="col-sm-2">
                            <input type="length" class="form-control" id="length" placeholder="width" />
                        </div>
                        <span class="pt-1">inch</span>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Weight</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" id="package" placeholder="Weight" />
                        </div>
                        <span class="pt-1">oz</span>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Shipment Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control datepicker" id="package" placeholder="{{now()}}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Buy Additional Insurance</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control datepicker" id="package" placeholder="$100" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Add signature confirmation
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Residential recipient
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Also create a return label
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Use customs declaration
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <a href="{{url('/generateTracking')}}" type="submit" class="btn btn-primary">Create shipping label</a>
                        </div>
                    </div>
                </form>
                <div class="col-md-4 m-3">
                    <div class="card mb-2">
                        <div class="card-header">
                            Order Id
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">#DH-000{{$order->id}}</h5>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-header">
                            Recipient Address:
                            <button class="btn btn-link pl-xl-5">Edit</button>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <strong>{{$order->customer_name}}</strong><br>
                                {{$order->address_line1}}<br>
                                <abbr title="Phone">P:</abbr> {{$order->phone}}
                            </div>
                        </div>
                    </div>
                    <div class="card mb-1">
                        <div class="card-header">
                            Sender Address:
                            <button class="btn btn-link pl-xl-5">Edit</button>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <strong>DesignHub Inc.</strong><br>
                                1 Pace Plaza<br>
                                New York City, NY 10001<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
