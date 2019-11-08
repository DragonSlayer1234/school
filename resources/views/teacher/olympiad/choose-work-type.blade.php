@extends('teacher.layouts.app')

@section('content')
    @include ('teacher.nav')
    <h4>Choose work type</h4>
    <a class="btn btn-primary" href="{{ route('teacher.file.create', $olympiad) }}">file</a>
    <a class="btn btn-success" href="#">test</a>
@endsection
