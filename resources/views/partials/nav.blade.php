<div class="navbar navbar-default navbar-fixed-top blue">
    <div class="container container-size-750">
        <div class="navbar-header">
            <a class="white-text navbar-brand" href="{{ url('/') }}"><b>Stat<strike>us</strike> You</b></a>

            @if (! Auth::guest())
                <ul class="nav nav-pills pull-right visible-xs">
                    <li>
                        <a href="{{ route('user.profile') }}">
                            <img src="/images/profile-1.jpg" width="28" alt="" class="img-circle">
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="fa fa-home white-text fa-2x"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form-sm').submit();">
                            <i class="fa fa-sign-out white-text fa-2x"></i>
                        </a>

                        <form id="logout-form-sm" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            @endif
        </div>

        @if (! Auth::guest())
            <ul class="nav navbar-nav navbar-right main-menu hidden-xs">
                <li>
                    <a href="{{ route('user.profile') }}">
                        <img src="/images/profile-1.jpg" width="28" alt="" class="img-circle">
                        &nbsp;{{ ucfirst($user->first_name) }}
                    </a>
                </li>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        @endif
    </div>
</div>
