@extends('layouts.app')

@section('content')

            @if (Auth::guest())
            <a href="{{ url('/login') }}" tabindex="-1">
                <paper-button class="teal" onclick="">Login</paper-button>
            </a>
            <a href="{{ url('/register') }}" tabindex="-1">
                <paper-button onclick="">Register</paper-button>
            </a>
            @else
            <a href="{{ url('/home') }}" tabindex="-1">
                <paper-button onclick="">Home</paper-button>
            </a>
            @endif

@endsection
