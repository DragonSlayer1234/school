@extends('teacher.layouts.app')

@section('main-title', $olympiad->name)

@section('main-content')

  <p>Subject: {{$olympiad->subject->name}}</p>
  <p>Type: {{$olympiad->type}}</p>
  <p>Cost: {{ $olympiad->paid ? $olympiad->cost : 'Free' }}</p>
  <p>Starts at: {{$olympiad->start_date}}</p>
  <p>Ends at: {{$olympiad->end_date}}</p>
  
@endsection
