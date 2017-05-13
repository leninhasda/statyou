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
    <body class="welcome">
        <div class="container container-size-950">
            <div class="row">
                <h1 class="white"><b>Stat<del>us</del> You</b></h1>
            </div>
            <div class="row">
                <div class="col-sm-5 col-sm-offset-3">
                    <div class="panel login-form">
                        <div class="panel-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="email">New Password</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Confirm New Password</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">Change my password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
