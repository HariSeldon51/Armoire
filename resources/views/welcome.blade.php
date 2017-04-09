@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        <paper-card heading="Welcome!">
            
            <div class="card-content">Armoire is the elegant, modular, and customizable web portal.</div>
            
            <div class="card-content">Login for an account, or register for a free one, below:</div>
            
            <div class="card-actions">
                <paper-button onclick="gotoPage(this, '/login')">Login</paper-button>
                <paper-button class="loud" onclick="gotoPage(this, '/register')">Register</paper-button>
            </div>
            
        </paper-card>

    @endif

@endsection
