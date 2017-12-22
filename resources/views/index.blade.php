@extends('layouts.app_without_navbar')

@push('head')
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
@endpush

@section('content')
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

                <br>
                <br>
                <br>

                    <form class="form-inline">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="E-mail">
                        </div>
                        <button type="submit" class="btn btn-success">Subscribe</button>
                    </form>
                @endif;
            @endif
        </div>
    </div>
@endsection