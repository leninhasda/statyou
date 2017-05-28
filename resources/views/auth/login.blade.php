@extends('layouts.auth')

@section('content')
    <div class="row" style="margin-top: 40px;">
        <div class="col-md-6">
            @if (Request::get('action') && 'logout' == Request::get('action'))
                <p class="flow-text white-text">Be sure to check in again. <br>Have a great day!</p>
            @else
                <p class="flow-text white-text">Welcome back! Let's dive in.</p>
            @endif
        </div>
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    @if ($errors->count())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary form-control">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> remember me
                            </label>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
