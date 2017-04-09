@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        <paper-card heading="Welcome!">
            
            <div class="card-content">Armoire is the elegant, modular, and customizable web portal.</div>
            
            <div class="card-content">NOTE: This is a demo. Please do not submit any confidential or personal information.</div>
            
            <div class="card-content">Log into your demo account, or register for a free one, below:</div>
            
            <div class="card-actions">
                <paper-button onclick="gotoPage(this, '/login')">Login</paper-button>
                <paper-button class="loud" onclick="gotoPage(this, '/register')">Register</paper-button>
            </div>
            
        </paper-card>

    @endif

@endsection
