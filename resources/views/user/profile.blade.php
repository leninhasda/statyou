@extends('layouts.main')

@section('content')
    <section>
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4"   >
                        <img src="/images/{{ $user->avatar ?: 'profile-2.jpg' }}" width="28" alt="" class="img-circle">
                    </div>
                    <div class="col-sm-8">
                        <a href="{{url('profile/edit')}}" class="btn btn-primary pull-right">Edit</a>
                        <h3 class="name">{{ $user->fullname() }}</h3>
                        <p class="bio">{{ $user->email }}</p>
                        <p class="email"><i class="fa fa-envelope fa-lg"></i> {{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection