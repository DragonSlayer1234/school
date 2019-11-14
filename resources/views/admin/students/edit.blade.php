@extends('admin.layouts.app')
@include ('admin.nav')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Students</div>

                <div class="card-body">
                  <form method="post" action="{{route('admin.student.update', $student)}}">
                      @csrf
                      @method('PUT')

                      <div class="form-group">
                          <label for="firstname">Firstname</label>
                          <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" id="firstname" placeholder="Enter firstname" name="firstname" value="{{$student->firstname}}">
                          @error('firstname')
                              <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label for="surname">Surname</label>
                          <input type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" id="surname" placeholder="Enter surname" name="surname" value="{{$student->surname}}">
                          @error('surname')
                              <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label for="lastname">Lastname</label>
                          <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" id="lastname" placeholder="Enter lastname" name="lastname" value="{{$student->lastname}}">
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
</div>
@endsection
