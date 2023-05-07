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

    @if ($errors->any())
        <script>
            UIkit.notification({message: '{{ $errors->first() }}', pos: 'bottom-right'});
        </script>
    @endif

    @if(Request::path() == '/')
    <div class="uk-position-relative">
        <img src="{{ URL::asset('res/back.jpg') }}" style="height: 100vh; width: 100vw;" alt="">

        <div class="uk-position-center-left uk-margin-large-bottom uk-overlay uk-margin-left">
            <div class="custom-box">
                <h2 class="uk-text-bold">Keep your passwords in one place.</h2>
                <h4 class="uk-margin-remove-top">Our handy password manager allows you to keep your passwords secure. Access your data anywhere, anytime.</h4>
                <a class="uk-button uk-button-secondary uk-width-1-1" href="/add">Get started!</a>
            </div>
        </div>

        <div class="uk-position-top">
        @endif

            <nav class="uk-navbar-container @if(Request::path() == '/') uk-navbar-transparent @endif" @if(Request::path() != '/') style="background: #222 !important" @endif>
                <div class="uk-container uk-light uk-container-xlarge">
                    <div uk-navbar class="uk-padding-small">
                        <div class="uk-navbar-left">
                            <a href="/"><img src="{{ URL::asset('res/mainlogo.png') }}" alt="" class="uk-margin-left" style="width: 150px"></a>
                        </div>

                        <div class="uk-navbar-right">
                            @auth
                                <a href="/user" class="uk-link-heading"><span uk-icon="user" class="uk-margin-small-right"></span>{{ Auth::user()->name }}</a>
                            @endauth
                            @guest
                                <a href="/login" class="uk-link-heading"><span uk-icon="sign-in" class="uk-margin-small-right"></span>Login</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>
            @if(Request::path() == '/')

        </div>
    </div>
    @endif


    <div class="page-container">
        @yield('content')
    </div>


    <footer class="uk-background-secondary uk-padding uk-text-center uk-margin-top">
        gthanksg, {{ now()->year }}
    </footer>
</body>
</html>
