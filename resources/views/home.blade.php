@extends('layouts.app')

@section('modules')

    <paper-menu class="main-menu">
        
        @foreach ($array_modules as $module)
            @include('layouts.menuItem', array('module' => $module))
        @endforeach

    </paper-menu>

@endsection

@section('content')
    <paper-toast id="loginToast" text="You are logged in!"></paper-toast>
    @yield('content')
    <!-- Insert current module page here -->
@endsection
