@extends('layouts.basic')

@section('content')

    @if (Route::has('login'))
        <div class="container text-center">
            @auth
                <a class="btn btn-primary" href="{{ url('/home') }}">Home</a>

                <a class="btn btn-secondary"  href="{{ route('logout', app()->getLocale()) }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

    @else
                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

@endsection
