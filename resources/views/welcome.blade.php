@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        <paper-card heading="Welcome to Armoire">
            
            <div class="card-content">Armoire is the elegant, modular, and customizable web portal. Try out this demo of Armoire by loggin-in as an admininstrator. Login details are provided on the login page.</div>
            
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
