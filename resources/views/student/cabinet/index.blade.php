@extends('student.layouts.app')

@section('content')
    @include ('student.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $student->getFullname() }}</div>

                <div class="card-body">
                      <p>FirstName: {{$student->firstname}}</p>
                      <p>SurName: {{$student->surname}}</p>
                      <p>LastName: {{$student->lastname}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
