@extends('layouts.app')

@section('content')

    <div class="row justify-content-center p-5">
        <div class="col-6">
            <h5 class="text-center mb-4">Новая олимпиада</h5>

            <form action="{{ route('teacher.olympiad.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-3 col-form-label">Название</label>
                    <div class="col-8">
                        <input type="text" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-3 col-form-label">Описание</label>
                    <div class="col-8">
                        <textarea type="text" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">
                        </textarea>
                        @error('description')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-3 col-form-label">Предмет</label>
                    <div class="col-8">
                        <select class="browser-default custom-select {{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" id="subject">
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                        @error('subject')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="startDate" class="col-3 col-form-label">Дата проведения</label>
                    <div class="col-4">
                        <input type="text" id="startDate" class="form-control {{ $errors->has('startDate') ? ' is-invalid' : '' }}" name="startDate" value="{{ old('startDate') }}">
                        @error('startDate')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <input type="text" id="endDate" class="form-control {{ $errors->has('endDate') ? ' is-invalid' : '' }}" name="endDate" value="{{ old('endDate') }}">
                        @error('endDate')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cost" class="col-3 col-form-label">Цена</label>
                    <div class="col-8">
                        <input type="number" id="cost" class="form-control {{ $errors->has('cost') ? ' is-invalid' : '' }}" name="cost" value="{{ old('cost') }}">
                        @error('cost')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="duration" class="col-3 col-form-label">Длительность</label>
                    <div class="col-8">
                        <input type="text" id="duration" class="form-control {{ $errors->has('duration') ? ' is-invalid' : '' }}" name="duration" value="{{ old('duration') }}">
                        @error('duration')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-3 col-8">
                        <div class="custom-file">
                            <input
                            type="file"
                            class="custom-file-input {{ $errors->has('work') ? ' is-invalid' : '' }}"
                            id="work"
                            name="work"
                            >
                            @error('work')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                            <label class="custom-file-label text-left" for="work">Выбрать задание</label>
                        </div>
                    </div>
                </div>

                <div class="md-group mt-4 text-center">
                    <button type="submit" class="site-btn">Создать</button>
                </div>

            </form>
        </div>
    </div>

@endsection
