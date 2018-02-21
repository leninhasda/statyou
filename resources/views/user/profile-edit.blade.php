
@extends('layouts.main')

@section('content')
    <section>
        <div class="panel profile-edit">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="/images/{{ $user->avatar ?: 'profile-2.jpg' }}" width="28" alt="" class="img-circle">
                        <form action="#" class="hide">
                            <label for="" class="btn btn-default btn-avatar">
                                Change Avatar
                                <input type="file" name="avatar" id="" class="hide">
                            </label>
                        </form>
                    </div>

                    <div class="col-sm-8 profile-edit">

                        @if (session()->has('msg.level'))
                            <div class="alert alert-{{ session('msg.level') }}">
                                {{ session('msg.content') }}
                            </div>
                        @endif

                        @if ($errors->count())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{ Form::model($user, ['route' => 'user.profile.update', 'method' => 'PUT']) }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        {{ Form::label('first_name', 'First Name') }}
                                        {{ Form::text('first_name', $user->first_name, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="col-xs-6">
                                        {{ Form::label('last_name', 'Last Name') }}
                                        {{ Form::text('last_name', $user->last_name, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::email('email', $user->email, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('password', 'New Password') }}
                                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'keep empty if unchanged']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('password', 'Old Password') }}
                                {{ Form::password('old_password', ['class' => 'form-control', 'placeholder' => 'required when changing password']) }}
                            </div>

                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection