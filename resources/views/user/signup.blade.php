@extends('layouts.master')

@section('content')
<div class="row mt-5 ml-5 align-content-center">
    <div class="col-md-4 col-md-offset-4">
        <h1>Sign Up</h1>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <form action="{{ route('signup.index') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
        </form>
    </div>
</div>
@endsection
