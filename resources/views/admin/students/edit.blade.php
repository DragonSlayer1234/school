@extends('admin.layouts.app')
@include ('admin.nav')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Students</div>

                <div class="card-body">
                  <form method="post" action="{{route('admin.student.update', ['id'=>$student->id])}}">
                    @csrf
                  <div class="form-group">
                  <label for="firstname">Firstname</label>
                  <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" id="firstname" placeholder="Enter firstname" name="firstname" value="{{$student->firstname}}">
                  @if ($errors->has('firstname'))
                  <span class="invalid-feedback"><strong>{{ $errors->first('firstname') }}</strong></span>
                  @endif
                  </div>
                  <div class="form-group">
                  <label for="surname">Surname</label>
                  <input type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" id="surname" placeholder="Enter surname" name="surname" value="{{$student->surname}}">
                  @if ($errors->has('surname'))
                  <span class="invalid-feedback"><strong>{{ $errors->first('surname') }}</strong></span>
                  @endif
                  </div>
                  <div class="form-group">
                  <label for="lastname">Lastname</label>
                  <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" id="lastname" placeholder="Enter lastname" name="lastname" value="{{$student->lastname}}">
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
