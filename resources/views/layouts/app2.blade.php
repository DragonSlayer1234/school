<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->



    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">News</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('olympiad.index') }}">Olympiads</a></li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    @include('layouts.auth')
                </ul>
            </div>
        </nav>

    <main class="container mt-5">
        <div class="row justify-content-center">

            <div class="col-11">
                @yield('content')
            </div>

        </div>
    </main>
</div>

<script src="{{ asset('js/app.js') }}" ></script>
@yield('scripts')
</body>
</html>
