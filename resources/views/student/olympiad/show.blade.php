@extends('teacher.layouts.app')
@include ('teacher.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$olympiad->name}}</div>

                <div class="card-body">
                              <p>Subject: {{$olympiad->subject->name}}</p>
                              <p>Type: {{$olympiad->type}}</p>
                              <p>Cost: {{ $olympiad->paid ? $olympiad->cost : 'Free' }}</p>
                              <p>Starts at: {{$olympiad->start_date}}</p>
                              <p>Ends at: {{$olympiad->end_date}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
