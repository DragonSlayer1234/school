<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style media="screen">
html, body, #app, .container, .row {
    height: 100% !important;
}
</style>
<body>
    <div id="app">
        <main class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header text-center">Вход в панель администратора</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf

                                <div class="form-group">
                                    <input
                                        id="username"
                                        type="text"
                                        class="form-control @error('username') is-invalid @enderror"
                                        name="username"
                                        value="{{ old('username') }}"
                                        autofocus
                                        placeholder="Имя пользователя"
                                    >
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password"
                                        placeholder="Пароль"
                                    >
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="remember">
                                            {{ __('Запомнить меня') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button type="submit" class="form-control btn btn-primary">
                                        {{ __('Войти') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
