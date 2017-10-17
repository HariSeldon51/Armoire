@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        <paper-card>

            <div class="logo flex">
                <svg class="logo-large" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 269 422.07"><title>Armoire-Logo</title><path class="cls-1" d="M1068.5,821.5v-264c0-50-27-87-107-87V703H1035a12,12,0,0,1,12,12v28a12,12,0,0,1-12,12H961.5v9H1034a12,12,0,0,1,12,12v28a12,12,0,0,1-12,12H961.5v21.5h74c36,0,21,55,47,55,0,0,14,2,14-15C1096,855.51,1068.5,861.5,1068.5,821.5ZM1036,694H971a5,5,0,0,1-5-5V495.13a5,5,0,0,1,5.21-5c78.61,2.74,75.79,50.73,75.79,79.87V682C1048,688.6,1042.6,694,1036,694Z" transform="translate(-827.5 -470.5)"/><path class="cls-1" d="M891,703h71.5V470.5c-80,0-107,37-107,87v264c0,40-27.46,34-28,56,0,17,14,15,14,15,26,0,11-55,47-55h74V816H890a12,12,0,0,1-12-12V776a12,12,0,0,1,12-12h72.5v-9H891a12,12,0,0,1-12-12V715A12,12,0,0,1,891,703Zm63.73-212.78a5,5,0,0,1,5.27,5V689a5,5,0,0,1-5,5H891a12,12,0,0,1-12-12V571C879,545.95,876.22,494,954.73,490.22Z" transform="translate(-827.5 -470.5)"/><circle class="cls-1" cx="135.5" cy="258.5" r="6"/><circle class="cls-1" cx="135.5" cy="319.5" r="6"/><circle class="cls-1" cx="117.5" cy="122.5" r="6"/><circle class="cls-1" cx="153.5" cy="122.5" r="6"/></svg>

                <h1 class="logo-title">Armoire</h1>
            </div>

            <div class="slogan flex">

                <div class="card-content center">Organize your data.</div>
                <div class="card-content center">Design your workflow.</div>
                <div class="card-content center">Your way.</div>

            </div>

            <div class="card-actions">
                <paper-button class="loud" onclick="gotoPage(this, '/login')">Login</paper-button>
                <paper-button onclick="gotoPage(this, '/register')">Register</paper-button>
            </div>

        </paper-card>

    @endif

@endsection
