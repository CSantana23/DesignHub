@extends('layouts.master')

@section('title')
    Shop
@endsection

@section('content')
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 m-3">
                    <div class="thumbnail border rounded p-4">
                        <img
                            src="{{$product->imagePath}}"
                            alt="image" class="img-fluid rounded">
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            <p class="description">
                                {{$product->description}}
                            </p>
                            <div class="clearfix">
                                <div class="pull-left price">$ {{ $product->price }}</div>
                                <a href="#" class="btn btn-success pull-right" role="button">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection
