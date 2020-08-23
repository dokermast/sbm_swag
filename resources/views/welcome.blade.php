@extends('layouts.basic')

@section('content')

    @if ( session('token') )
        <div class="container text-center">
            <a class="btn btn-secondary"  href="{{ route('logout') }}">Logout</a>
        </div>
    @else
        <div class="container text-center">
            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
        </div>
    @endif

@endsection
