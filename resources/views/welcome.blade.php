@extends('layouts.app')

@section('content')

    @if (Auth::guest())
            
    <paper-button onclick="">
        <a href="{{ url('/login') }}" tabindex="0">Login</a>
    </paper-button>
    
    <paper-button class="loud" onclick="">
        <a href="{{ url('/register') }}" tabindex="1">Register</a>
    </paper-button>  
            
    @else

    <paper-button onclick="">
        <a href="{{ url('/home') }}" tabindex="2">Home</a>
    </paper-button>
    
    @endif

@endsection
