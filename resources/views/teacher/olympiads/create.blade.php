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

                <div class="form-row">
                    <label for="name" class="col-3 col-form-label">Дата проведения</label>
                    <div class="form-group col-4">
                        <div class="input-group date dates" id="startDate" data-target-input="nearest">
                            <input
                            placeholder="Начало"
                            type="text"
                            class="form-control datetimepicker-input {{ $errors->has('startDate') ? ' is-invalid' : '' }}"
                            data-target="#startDate"
                            name="startDate"
                            />
                            @error('startDate')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-4">
                        <div class="input-group date dates" id="endDate" data-target-input="nearest">
                            <input
                            placeholder="Окончание"
                            type="text"
                            class="form-control datetimepicker-input {{ $errors->has('endDate') ? ' is-invalid' : '' }}"
                            data-target="#endDate"
                            name="endDate"
                            />
                            @error('endDate')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="input-group-append" data-target="#endDate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cost" class="col-3 col-form-label">Цена</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="cost"><i class="fas fa-tenge"></i></span>
                            </div>
                            <input type="number" id="cost" class="form-control {{ $errors->has('cost') ? ' is-invalid' : '' }}" name="cost" value="{{ old('cost') }}">
                            @error('cost')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="duration" class="col-3 col-form-label">Длительность</label>
                    <div class="col-8 input-group date" id="duration" data-target-input="nearest">
                        <input
                        type="text"
                        class="form-control datetimepicker-input {{ $errors->has('duration') ? ' is-invalid' : '' }}"
                        data-target="#duration"
                        name="duration"
                        />
                        @error('duration')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                        <div class="input-group-append" data-target="#duration" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
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
