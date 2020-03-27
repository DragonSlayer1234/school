@extends('layouts.app')

@section('content')

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-9">
                @include('layouts.alert')

                <h5 class="mb-4 text-center">Сменить пароль</h5>

                <form method="post" action="{{route('teacher.profile.change-password')}}">
                    @csrf

                    <div class="form-group row justify-content-center">
                        <label for="currentPassword" class="col-3 col-form-label">Текущий пароль</label>
                        <div class="col-7 align-self-center">
                            <input
                            type="password"
                            class="form-control{{ $errors->has('currentPassword') ? ' is-invalid' : '' }}"
                            id="currentPassword"
                            name="currentPassword"
                            >

                            @error('currentPassword')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="password" class="col-3 col-form-label">Новый пароль</label>
                        <div class="col-7 align-self-center">
                            <input
                            type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            id="password"
                            name="password"
                            >

                            @error('password')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="passwordConfirm" class="col-3 col-form-label">Подтверждение нового пароля</label>
                        <div class="col-7 align-self-center">
                            <input
                            type="password"
                            class="form-control{{ $errors->has('passwordConfirm') ? ' is-invalid' : '' }}"
                            id="passwordConfirm"
                            name="passwordConfirm"
                            >

                            @error('passwordConfirm')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="site-btn">Сменить пароль</button>
                    </div>
                </form>
            </div>
        </div>
    </main>



@endsection
