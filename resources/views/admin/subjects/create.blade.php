@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Новый предмет</div>

                <div class="card-body">
                  <form method="post" action="{{route('admin.subject.store')}}" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group">
                          <input
                              type="text"
                              class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                              id="name"
                              placeholder="Введите название"
                              name="name"
                              value="{{old('name')}}"
                          >
                          @error('name')
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
</div>
@endsection
