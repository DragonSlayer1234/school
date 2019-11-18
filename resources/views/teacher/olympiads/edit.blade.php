@extends('teacher.layouts.app')

@section('main-title', 'Edit the olympiad')

@section('main-content')

    <form method="post" action="{{route('teacher.olympiad.update', $olympiad)}}">
    @csrf
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Enter name" name="name" value="{{ $olympiad->name }}">
    @error('name')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
    </div>

    <div class="form-group">
    <label for="subject_id">Subject</label>
    <select name="subject_id" id="subject_id" class="form-control{{ $errors->has('subject_id') ? ' is-invalid' : '' }}">
      @foreach($subjects as $subject)
          <option value="{{$subject->id}}">{{$subject->name}}</option>
      @endforeach
    </select>
    @error('subject_id')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
    </div>

    <div class="form-group">
    <label for="type">Type</label>
    <select name="type" id="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}">
      @foreach($types as $type)
          <option value="{{$type}}">{{ucfirst($type)}}</option>
      @endforeach
    </select>
    @error('type')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
    </div>

    <div class="form-group">
    <label for="start_date">Start date</label>
    <input type="date" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" id="start_date" placeholder="Enter startdate" name="start_date" value="{{ $olympiad->start_date }}">

    @error('start_date')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
    </div>

    <div class="form-group">
    <label for="end_date">End date</label>
    <input type="date" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" id="end_date" placeholder="Enter endDate" name="end_date" value="{{ $olympiad->end_date }}">
    @error('end_date')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
    </div>

    <div class="form-check">
    <input type="checkbox" class="form-check-input" id="paid" name="paid">
    <label for="paid" class="form-check-label">Is paid</label>
    @error('paid')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
    </div>

    <div class="form-group">
    <label for="cost">Cost</label>
    <input type="text" class="form-control{{ $errors->has('cost') ? ' is-invalid' : '' }}" id="cost" placeholder="Enter cost" name="cost" value="{{ $olympiad->cost }}">
    @error('cost')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
    </div>

    <button type="submit" class="btn btn-primary">Next</button>
    </form>

@endsection
