@extends('admin.layouts.app')
@section('content')

    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a student</div>

                <div class="card-body">
                    <form method="post" action="{{route('admin.student.store')}}">
                        @csrf

                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" id="login" placeholder="Enter login" name="login" value="{{old('login')}}">
                            @error('login')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" id="firstname" placeholder="Enter firstname" name="firstname" value="{{old('firstname')}}">
                            @error('firstname')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" id="surname" placeholder="Enter surname" name="surname" value="{{old('surname')}}">
                            @error('surname')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" id="lastname" placeholder="Enter lastname" name="lastname" value="{{old('lastname')}}">
                            @error('lastname')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
