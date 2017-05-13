@extends('layout')

@section('content')
    <section>
        <div class="panel profile-edit">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{url('images/profile-1.jpg')}}" alt="" class="img-thumbnail">
                        <form action="#">
                            <label for="" class="btn btn-default btn-avatar">
                                Change Avatar
                                <input type="file" name="avatar" id="" class="hide">
                            </label>
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <form action="">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">First Name</label>
                                        <input type="text" name="first_name" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="">Last Name</label>
                                        <input type="text" name="last_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="text" name="first_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="text" name="first_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Old Password</label>
                                <input type="text" name="first_name" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection