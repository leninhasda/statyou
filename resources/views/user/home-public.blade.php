@extends('layouts.main')

@section('content')

    <section>
        @if ( ! $user->hasStatus())
            <h2 class="grey-text text-center">Looks like user hasn't shared anything yet!</h2>
        @else
            @foreach ($statuses as $status)
                <div class="panel stat-block">
                    <div class="panel-body clearfix">
                            <div class="pull-left">
                                <img src="/images/{{ $user->avatar ?: 'profile-2.jpg' }}" width="28" alt="" class="img-circle">
                            </div>
                            <div class="pull-right content">

                                <p class="clearfix">
                                    <b>{{ $user->fullname() }}</b>
                                    <span class="pull-right">{{ $status->created_at->diffForHumans() }}</span>
                                </p>
                                <p>
                                    {{ $status->content }}
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