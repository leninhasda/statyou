<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stat You</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container container-size-750">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Stat<strike>us</strike> You</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{url('/')}}">Welcome</a></li>
                    <li><a href="{{url('/home')}}">Home</a></li>
                    <li><a href="{{url('/profile')}}">Profile</a></li>
                    <li><a href="#contact">Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="container container-size-750" style="margin-top: 60px;">
            @yield('content')
        </div><!-- /.container -->

        <footer class="blog-footer">
            <div class="container container-size-750">
                <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
        </footer>
    </body>
</html>
