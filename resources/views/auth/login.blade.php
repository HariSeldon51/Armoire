@extends('layouts.app')

@section('content')

<paper-card heading="Log In" class="dialog">

    <div class="card-content">Use the login credentials you provided when registering your account, or use the login credentials below if you would like to try out the demo administrator account.</div>
    <div class="card-content">Username: webuser1<br />Password: adminpass</div>

    @if ($errors->has('password') || $errors->has('username'))
        <div class="help-block">
            <strong>{{ $errors->first() }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" id="login">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="username" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <a href="/password/reset">Forgot Password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card-actions">
        <paper-button class="loud"><button type="submit" class="btn btn-primary" form="login">LOGIN</button></paper-button>
        <paper-button onclick="gotoPage(this, '/')">Back</paper-button>
    </div>

</paper-card>
@endsection
