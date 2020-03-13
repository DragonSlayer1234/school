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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="container-fluid">
            <div class="row">
                <div class="col-2 sidebar sticky-top">
                    <div class="auth">
                        {{ Auth::user()->login }}

                        <form class="d-inline-block float-right" id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-custom p-0"><i class="fas fa-sign-out-alt"></i></button>
                        </form>
                    </div>

                    <hr class="mt-0">

                    <div class="list-group links">
                        <a href="{{ route('student.home') }}" class="list-group-item list-group-item-action main-link">
                            <span class="link-icon"><i class="fas fa-home"></i></span> Main
                        </a>
                    </div>

                    <div class="link-header">
                        <span class="link-icon"><i class="fas fa-users"></i></span> Users
                    </div>

                    <div class="list-group links">
                        <a href="" class="list-group-item list-group-item-action">
                            Students
                        </a>
                        <a href="" class="list-group-item list-group-item-action">
                            Teachers
                        </a>
                    </div>

                    <div class="link-header">
                        <span class="link-icon"><i class="fas fa-trophy"></i></span> Olympiad
                    </div>

                    <div class="list-group links">
                        <a href="" class="list-group-item list-group-item-action">
                            Moderating
                        </a>
                    </div>

                    <div class="list-group links">
                        <a href="" class="list-group-item list-group-item-action main-link">
                            <span class="link-icon"><i class="fas fa-pray"></i></span> Subjects
                        </a>
                    </div>

                    <hr>

                </div>

                <div class="offset-1 col-7">
                    @yield('content')
                </div>


            </div>
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
