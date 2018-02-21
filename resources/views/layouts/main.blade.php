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
        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
    <body class="main-layout">
        @include('partials.nav')

        <div class="container container-size-750">
            @yield('content')
        </div><!-- /.container -->

        <div class="container container-size-750">
            @include('partials.footer')
        </div>

        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
        @yield('footer-js')
    </body>
</html>
