@extends('layouts.app')

@section('content')

    @if (Auth::guest())

    
        <paper-button onclick="gotoPage(this, '/login')">Login</paper-button>
    
        <paper-button class="loud" onclick="gotoPage(this, '/register')">Register</paper-button>
    

    @else

    <a href="{{ url('/home') }}" tabindex="-1">
        <paper-button onclick="">Home</paper-button>
    </a>

    @endif

@endsection
