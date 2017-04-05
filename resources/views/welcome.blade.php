@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        <paper-card heading="Welcome to Armoire">
            
            <div class="card-content">Armoire is the elegant web portal</div>
            
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
