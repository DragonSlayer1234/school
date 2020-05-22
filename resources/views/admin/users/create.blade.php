@extends('admin.layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card mt-4">
                <div class="card-header text-center">{{ $title }}</div>

                <div class="card-body">
                    <form method="post" action="{{route("admin.$active.store")}}">
                        @csrf

                        <div class="form-group">
                            <label for="username">Логин</label>
                            <input
                                type="text"
                                class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                id="username"
                                placeholder="Введите логин"
                                name="username"
                                value="{{old('username')}}"
                            >
                            @error('username')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="firstname">Имя</label>
                            <input
                                type="text"
                                class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                id="firstname"
                                placeholder="Введите имя"
                                name="firstname"
                                value="{{old('firstname')}}"
                            >
                            @error('firstname')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="lastname">Фамилия</label>
                            <input
                                type="text"
                                class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                id="lastname"
                                placeholder="Введите фамилию"
                                name="lastname"
                                value="{{old('lastname')}}"
                            >
                            @error('lastname')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="surname">Отчество</label>
                            <input
                                type="text"
                                class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}"
                                id="surname"
                                placeholder="Введите отчество"
                                name="surname"
                                value="{{old('surname')}}"
                            >
                            @error('surname')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
