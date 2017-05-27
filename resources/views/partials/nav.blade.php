<div class="navbar navbar-default navbar-fixed-top blue">
    <div class="container container-size-750">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="white-text navbar-brand" href="#"><b>Stat<strike>us</strike> You</b></a>
        </div>
        @if (! Auth::guest())
            <ul class="nav navbar-nav navbar-right main-menu">
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
                <li class="dropdown hide">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="/images/profile-1.jpg" width="28" alt="" class="img-thumbnail">
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('user.profile', ['username' => $user->username]) }}">Profile</a></li>
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
                </li>
            </ul>
        @endif
    </div>
</div>
