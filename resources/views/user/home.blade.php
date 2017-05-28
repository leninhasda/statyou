@extends('layouts.main')

@section('content')

    <section>
        <div class="panel stat-block">
            <div class="panel-body">
                @if ($errors->count())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ Form::open(['route' => 'status.create']) }}

                    <div class="clearfix form-group">
                        <div class="pull-left">
                            <img src="/images/profile-1.jpg" width="38" alt="" class="img-circle">
                        </div>
                        <div class="pull-right">
                            <input type="text" name="content" placeholder="Well, state yourself..." class="form-control" required>
                        </div>
                    </div>
                    <div class="row post-detail text-right">
                        <div class="col-sm-12">
                            <div class="btn-group" style="border-radius: 50%;">
                                <a class="btn btn-default btn-radio active" data-toggle="type" data-value="1" title="Public"><i class="fa fa-globe"></i></a>
                                <a class="btn btn-default btn-radio notActive" data-toggle="type" data-value="0" title="Private"><i class="fa fa-lock"></i></a>
                                <input type="hidden" name="type" id="type" value="1">
                            </div>
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>
                    </div>
                {{-- </form> --}}
                {{ Form::close() }}
            </div>
        </div>
    </section>

    <section>
        @if ( ! $user->hasStatus())
            <h2 class="grey-text text-center">Looks like you haven't shared anything yet!</h2>
        @else
            @foreach ($statuses as $status)
                <div class="panel stat-block">
                    <div class="panel-body clearfix">
                            <div class="pull-left">
                                <img src="/images/profile-1.jpg" width="32" alt="" class="img-circle">
                            </div>
                            <div class="pull-right content">
                                <p class="clearfix">
                                    {{ $status->content }}
                                    <span class="pull-right">{{ $status->created_at->diffForHumans() }}</span>
                                </p>
                            </div>
                    </div>
                </div><!-- /.stat-block -->
            @endforeach

            {{ $paginator->make() }}

        @endif
    </section><!-- /.row -->

@endsection

@section('footer-js')
<script>
$(document).ready(function(){
    $('.post-detail a.btn-radio').on('click', function(){
        var checkedValue = $(this).data('value');
        var inputId = $(this).data('toggle');
        $('#'+inputId).prop('value', checkedValue);

        $('a[data-toggle="'+inputId+'"]').not('[data-value="'+checkedValue+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+inputId+'"][data-value="'+checkedValue+'"]').removeClass('notActive').addClass('active');
    });
});
</script>
@endsection