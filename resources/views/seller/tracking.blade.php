@extends('layouts.master')

@section('title')
    Design Hub Admin Home
@endsection

@section('content')
    <div class="card text-center m-5 p-5" style="width: 350px;">
        <img class="card-img-top" src="https://mailomg.files.wordpress.com/2017/09/usps_eagle-symbol.png?w=620" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Tracking: </h5>
            <h6 class="card-text">{{$tk * 137}} {{$tk * 137}} {{$tk * 137}} {{$tk * 137}}</h6>
        </div>
        <a href="{{url('/email')}}" class="btn btn-primary m-5">Send notification to customer</a>
    </div>

    @endsection
