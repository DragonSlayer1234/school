@extends('admin.layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="card mt-3">
                <div class="card-header text-center">Update student information</div>

                <div class="card-body">
                    <div class="avatar text-center mb-2">
                        <img src="https://pngimage.net/wp-content/uploads/2018/05/cabello-de-naruto-png-3.png" alt="">
                    </div>

                    <form method="post" action="{{route('admin.teacher.update', $teacher)}}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" id="firstname" placeholder="Enter firstname" name="firstname" value="{{$teacher->firstname}}">
                            @error('firstname')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" id="surname" placeholder="Enter surname" name="surname" value="{{$teacher->surname}}">
                            @error('surname')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" id="lastname" placeholder="Enter lastname" name="lastname" value="{{$teacher->lastname}}">
                            @error('lastname')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
