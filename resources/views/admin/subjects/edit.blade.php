@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="card">
                <div class="card-header">Редактирование предмета</div>

                <div class="card-body">
                  <form method="post" action="{{ route('admin.subject.update', $subject) }}">
                      @csrf
                      @method('PUT')

                      <div class="form-group">
                          <label for="name">Название</label>
                          <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Введите название" name="name" value="{{ $subject->name }}">
                          @error('name')
                              <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                          @enderror
                      </div>

                      <div class="form-group text-center">
                          <button type="submit" class="btn btn-primary">Обновить</button>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
