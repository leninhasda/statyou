@extends('layouts.auth')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <p class="flow-text white-text">Just fill the form to sign up!</p>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="hide panel-heading">Register</div>
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
