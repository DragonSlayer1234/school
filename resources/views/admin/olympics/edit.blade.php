@extends('layouts.app')
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
                  <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname" value="{{$student->firstname}}">
                  </div>
                  <div class="form-group">
                  <label for="surname">Surname</label>
                  <input type="text" class="form-control" id="surname" placeholder="Enter surname" name="surname" value="{{$student->surname}}">
                  </div>
                  <div class="form-group">
                  <label for="lastname">Lastname</label>
                  <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname" value="{{$student->lastname}}">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
