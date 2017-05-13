@extends('layout')

@section('content')
    <section>
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="images/profile-1.jpg" alt="" class="img-thumbnail">
                    </div>
                    <div class="col-sm-8">
                        <a href="{{url('profile/edit')}}" class="btn btn-primary pull-right">Edit</a>
                        <h3 class="name">Dr. John Doe</h3>
                        <p class="bio">nerdy, geek, tech shavy</p>
                        <p class="email"><i class="fa fa-github fa-lg"></i> john@doe.com</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection