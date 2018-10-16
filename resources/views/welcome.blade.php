<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nutella Wedstrijd</title>

        <link rel="stylesheet" type="text/css" href="css/app.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
        </div>

        <div class="container home">
            <div class="row">
                <div class="col">
                    <h1 class="text-center">Nutella's Grote Wedstrijd</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <img src="/images/jar.png" class="img-fluid">
                </div>
                <div class="col">
                    <p>uitleg over de wedstrijd</p>
                    <a href="#" class="btn btn-primary">Show me more!</a>
                </div>
                <div class="col">
                    <h2>Prijzen</h2>
                    <p>prijzen hier</p>

                    <h2>Winnaars</h2>
                    <p>winnaars hier</p>
                </div>
            </div>
        </div>
    </body>
</html>
