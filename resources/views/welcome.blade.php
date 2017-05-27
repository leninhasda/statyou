@extends('layouts.auth')

@section('content')

    <div class="row" style="margin-top: 40px;">
        <div class="col-sm-7">
            <div style="padding: 20px 20px 0 0 ;">
               <p class="flow-text white-text">There is suppose to be an awesome welcome message to hook you up, but you know I am too lazy to write one! <br>Just Sign up will you?!</p>
                <hr>
                <p class="flow-text white-text">Already have an account? <a class="btn btn-success btn-default" href="{{ route('login') }}">Login Here</a></p>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="hide panel login-form">
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="{{ route('password.request')}}">Forgot your access??</a>
                    </form>
                </div>
            </div>

            <div class="panel signup-form">
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('register') }}">

                        {{ csrf_field() }}

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="first_name" class="hide">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-sm-6">
                                <label for="last_name" class="hide">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="hide">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="hide">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="hide">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Sign up for Stat<del>us</del></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection