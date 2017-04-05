@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        <paper-card heading="Welcome to Armoire">
            
            <div class="card-content">Armoire is the elegant, modular, and customizable web portal. Try out this demo of Armoire by logging-in as an admininstrator. Login details are provided on the login page.</div>
            
            <div class="card-content">The registration page will allow you to register a user, but no registered users are currently allowed to log in except the demo administrator account.</div>
            
            <div class="card-actions">
                <paper-button onclick="gotoPage(this, '/login')">Login</paper-button>
                <paper-button class="loud" onclick="gotoPage(this, '/register')">Register</paper-button>
            </div>
            
        </paper-card>
    
        
    

    @else

    <a href="{{ url('/home') }}" tabindex="-1">
        <paper-button onclick="">Home</paper-button>
    </a>

    @endif

@endsection
