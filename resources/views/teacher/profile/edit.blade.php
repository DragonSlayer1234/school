@extends('layouts.app')

@section('content')

    <main class="container py-5">
      <div class="row justify-content-center">
        <div class="col-10">
            @include('layouts.alert')

            <h5 class="mb-4 text-center">Редактировать профиль</h5>

            <form method="post" action="{{route('teacher.profile.update')}}">
                @csrf
                @method('PUT')

                <div class="form-group row justify-content-center">
                    <label for="firstname" class="col-2 col-form-label">Имя</label>
                    <div class="col-7">
                        <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" id="firstname" placeholder="Enter firstname" name="firstname" value="{{$teacher->firstname}}">
                        @error('firstname')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label for="lastname" class="col-2 col-form-label">Фамилия</label>
                    <div class="col-7">
                        <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" id="lastname" placeholder="Enter lastname" name="lastname" value="{{$teacher->lastname}}">
                        @error('lastname')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label for="surname" class="col-2 col-form-label">Отчество</label>
                    <div class="col-7">
                        <input type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" id="surname" placeholder="Enter surname" name="surname" value="{{$teacher->surname}}">
                        @error('surname')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>



                <div class="form-group text-center">
                    <button type="submit" class="site-btn">отредактировать</button>
                </div>
            </form>
        </div>
      </div>
    </main>



@endsection
