<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">To Dashboard</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Internet Marketing
                </div>

                @if (isset($_COOKIE['AUTH_ID']) || !empty($_COOKIE['AUTH_ID']))
                <div class="links">
                    <a href="{{ route('kkic') }}">KKIC</a>
                </div>
                @endif

                @if (Auth::guest())
                    @if (!isset($_COOKIE['AUTH_ID']) || empty($_COOKIE['AUTH_ID']))
                        <div class="links">
                            <a href="{{ route('nopassauth') }}">Affilate Login</a>
                            {{--<a href="{{ route('login') }}">Login</a>--}}
                        </div>

                        <form class="form-inline">
                            <div class="form-group">
                                <label for="exampleInputName2">Name</label>
                                <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                            </div>
                            <button type="submit" class="btn btn-default">Send invitation</button>
                        </form>
                    @endif;
                @endif
            </div>
        </div>
    </body>
</html>
