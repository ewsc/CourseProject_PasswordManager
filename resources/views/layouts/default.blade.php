<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        @yield('title') — passwordmanager
    </title>
    <link rel="icon" href="{{ URL::asset('res/logo.png') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/default.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.15/dist/css/uikit.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.15/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.15/dist/js/uikit-icons.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('head')
</head>
<body>
<div class="uk-background-secondary uk-light uk-position-fixed uk-background-cover uk-height-1-1 uk-width-1-1">

    <nav class="uk-navbar-container uk-dark uk-navbar-transparent">
        <div class="uk-container">
            <div uk-navbar>
                <div class="uk-navbar-center">
                    <ul class="uk-navbar-nav">
                        <li class="uk-active"><a href="/">Home</a></li>
                        <li>
                            <a href="#">Passwords</a>
                            <div class="uk-navbar-dropdown">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class="uk-active"><a href="#">Add</a></li>
                                    <li><a href="#">View</a></li>
                                    <li><a href="#">Edit</a></li>
                                </ul>
                            </div>
                        </li>
                        @auth
                        <li><a href="#">{{ Auth::user()->name }}</a></li>
                        @endauth
                        @guest
                        <li><a href="/login">Login</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

</div>

</body>
</html>
