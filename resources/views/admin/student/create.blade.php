@extends('admin.layouts.app')
@include ('admin._nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a student</div>

                <div class="card-body">
                  <form method="post" action="{{route('admin.student.store')}}">
                    @csrf
                  <div class="form-group">
                  <label for="login">Login</label>
                  <input type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" id="login" placeholder="Enter login" name="login" value="{{old('login')}}">
                  @if ($errors->has('login'))
                      <span class="invalid-feedback"><strong>{{ $errors->first('login') }}</strong></span>
                  @endif
                  </div>
                  <div class="form-group">
                  <label for="firstname">Firstname</label>
                  <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" id="firstname" placeholder="Enter firstname" name="firstname" value="{{old('firstname')}}">
                  @if ($errors->has('firstname'))
                      <span class="invalid-feedback"><strong>{{ $errors->first('firstname') }}</strong></span>
                  @endif
                  </div>
                  <div class="form-group">
                  <label for="surname">Surname</label>
                  <input type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" id="surname" placeholder="Enter surname" name="surname" value="{{old('surname')}}">
                  @if ($errors->has('surname'))
                      <span class="invalid-feedback"><strong>{{ $errors->first('surname') }}</strong></span>
                  @endif
                  </div>
                  <div class="form-group">
                  <label for="lastname">Lastname</label>
                  <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" id="lastname" placeholder="Enter lastname" name="lastname" value="{{old('lastname')}}">
                  @if ($errors->has('lastname'))
                      <span class="invalid-feedback"><strong>{{ $errors->first('lastname') }}</strong></span>
                  @endif
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
