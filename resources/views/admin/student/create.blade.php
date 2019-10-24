@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a student</div>

                <div class="card-body">
                  <form method="post" action="{{route('admin.student.update')}}">
                    @csrf
                  <div class="form-group">
                  <label for="login">Login</label>
                  <input type="text" class="form-control" id="login" placeholder="Enter login" name="login" value="{{old('login')}}">
                  </div>
                  <div class="form-group">
                  <label for="firstname">Firstname</label>
                  <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname" value="{{old('firstname')}}">
                  </div>
                  <div class="form-group">
                  <label for="surname">Surname</label>
                  <input type="text" class="form-control" id="surname" placeholder="Enter surname" name="surname" value="{{old('surname')}}">
                  </div>
                  <div class="form-group">
                  <label for="lastname">Lastname</label>
                  <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname" value="{{old('lastname')}}">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
