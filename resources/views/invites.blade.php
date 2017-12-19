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
                color: black;
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
                color: black;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            label {
              padding : 20px;
            }

            input {
              margin-bottom : 15px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        <div class="content">
        @if($invites && count($invites) > 0)
            @foreach($invites as $invite)
            <div>
            <h3>Friend name: {{ $invite->first_name }}</h3>

                Friend email: {{ $invite->email }}<br><br>
                <strong>Has ordered: {{ $invite->has_ordered > 0 ? 'yes' : 'no' }}</strong>
            </p>
           </div>
            <hr/>
            @endforeach
        @else
            <h3>You haven't invited friends.</h3>
        @endif
        </div>
        </div>
    </body>
</html>


