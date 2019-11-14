@extends('admin.layouts.app')
@include ('admin.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a subject</div>

                <div class="card-body">
                  <form method="post" action="{{route('admin.subject.store')}}">
                      @csrf

                      <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Enter name" name="name" value="{{old('name')}}">
                          @error('name')
                              <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                          @enderror
                      </div>

                      <button type="submit" class="btn btn-primary">Add</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
