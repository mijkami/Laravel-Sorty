<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <script src="https://cdn.tiny.cloud/1/yw2alpvctek8wufoxpxk8yffewrm15kpefdwcxbq1phsmq9a/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
        selector: 'textarea',
        height: 300,
        width: 800,
        menubar: false,
        plugins: ' link ',
        toolbar: 'bold italic underline forecolor  fontsizeselect | alignleft aligncenter alignright | link removeformat |',
        entity_encoding : "raw"
        setup: function (editor) {editor.on('BeforeSetContent', function (contentEvent) {contentEvent.content = contentEvent.content.replace(/\r\n?\r?\n/g, '<br />');})},
        });
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <h3>
                    {{ config('app.name', 'Laravel') }}
                </h3>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                             <a class="nav-link" href="http://www.parapangue.re/">Parapangue</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" href="/">{{ __('Planning') }}</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" href="{{ route('particips.archives') }}">{{ __('Archives') }}</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" href="/sors">{{ __('?Sorties?') }}</a>
                        </li>
                        @if (session('role')=='admin' OR session('role')=='superadmin')
                        <li class="nav-item">
                             <a class="nav-link" href="{{ route('users.index') }}">{{ __('Utilisateurs') }}</a>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connection') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name.' ('.session('role').')' }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('flash-message')
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                        <div class="panel-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
