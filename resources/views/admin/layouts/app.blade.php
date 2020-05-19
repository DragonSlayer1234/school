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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.home') }}">Панель</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                           <a class="nav-link" href="{{ route('admin.student.index') }}">
                               <span class="mr-1"><i class="fas fa-users"></i></span>
                               Пользователи
                           </a>
                         </li>
                          <li class="nav-item">
                             <a class="nav-link" href="{{ route('admin.olympiad.index') }}">
                                 <span class="mr-1"><i class="fas fa-trophy"></i></span>
                                 Олимпиады
                             </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{ route('admin.subject.index') }}">
                                  <span class="mr-1"><i class="fas fa-book-open"></i></span>
                                  Предметы
                              </a>
                            </li>

                            <li class="nav-item">
                               <a class="nav-link" href="{{ route('admin.news.index') }}">
                                   <span class="mr-1"><i class="fas fa-newspaper"></i></span>
                                   Новости
                               </a>
                             </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="mr-1"><i class="fas fa-user"></i></span>
                                {{ Auth::guard('admin')->user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        <main class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    @yield('content')
                </div>


            </div>
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
