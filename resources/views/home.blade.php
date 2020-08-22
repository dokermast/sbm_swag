@extends('layouts.basic')

@section('content')

    @if(isset($user->name))
        <div class="container">
            <div class="text-center"><h5> You are logged in, {{ $user->name }}!</h5></div>
        </div>
    @endif

@endsection
