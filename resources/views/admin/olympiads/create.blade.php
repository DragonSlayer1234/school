@extends('admin.layouts.app')
@include ('admin.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create an olympiad</div>

                <div class="card-body">
                  <form method="post" action="{{route('admin.olympiad.store')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Enter name" name="name" value="{{old('name')}}">
                  @error('name')
                      <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                  </div>
                  
                  <div class="form-group">
                  <label for="exercise">Exercise</label>
                  <input type="file" class="form-control{{ $errors->has('exercise') ? ' is-invalid' : '' }}" id="exercise" placeholder="Enter exercise" name="exercise">
                  @error('exercise')
                      <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                  </div>
                  
                  <div class="form-group">
                  <label for="startDate">Start Date</label>
                  <input type="date" class="form-control{{ $errors->has('startDate') ? ' is-invalid' : '' }}" id="startDate" placeholder="Enter startdate" name="startDate" value="{{old('startDate')}}">
                  
                  @error('startDate')
                      <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                  </div>
                  
                  <div class="form-group">
                  <label for="endDate">End date</label>
                  <input type="date" class="form-control{{ $errors->has('endDate') ? ' is-invalid' : '' }}" id="endDate" placeholder="Enter endDate" name="endDate" value="{{old('endDate')}}">
                  
                  @error('endDate')
                      <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                  </div>
                  
                  <div class="form-group">
                  <label for="cost">Cost</label>
                  <input type="text" class="form-control{{ $errors->has('cost') ? ' is-invalid' : '' }}" id="cost" placeholder="Enter cost" name="cost" value="{{old('cost')}}">
                  
                  @error('cost')
                      <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                  </div>
                  
                  <div class="form-group">
                  <label for="subjectId">Subject</label>
                  <select name="subjectId" id="subjectId" class="form-control{{ $errors->has('subjectId') ? ' is-invalid' : '' }}">
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                  </select>
                  @error('subjectId')
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
