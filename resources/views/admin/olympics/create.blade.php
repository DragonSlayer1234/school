@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create an olympic</div>

                <div class="card-body">
                  <form method="post" action="{{route('admin.olympic.store')}}" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                  <label for="exercise">Exercise</label>
                  <input type="file" class="form-control" id="exercise" placeholder="Enter exercise" name="exercise">
                  </div>
                  <div class="form-group">
                  <label for="startDate">Start Date</label>
                  <input type="date" class="form-control" id="startDate" placeholder="Enter startdate" name="startDate" value="{{old('startDate')}}">
                  </div>
                  <div class="form-group">
                  <label for="endDate">End date</label>
                  <input type="date" class="form-control" id="endDate" placeholder="Enter endDate" name="endDate" value="{{old('endDate')}}">
                  </div>
                  <div class="form-group">
                  <label for="cost">Cost</label>
                  <input type="text" class="form-control" id="cost" placeholder="Enter cost" name="cost" value="{{old('cost')}}">
                  </div>
                  <div class="form-group">
                  <label for="subjectId">Subject</label>
                  <select name="subjectId" id="subjectId" class="form-control">
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                  </select>
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
